<?php


namespace App\Controller;

use App\Entity\Team;
use App\Entity\User;

use App\Repository\TeamRepository;
use App\Repository\UserRepository;
use App\Form\{LoginFormAuth, RegistrationType, NewTeamType};
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\{Request,
    Response,
    Session\SessionInterface};
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;



class UserTeamController extends AbstractController
{


    /*
    * @Route("/", name="index")
    * @return Response
    */
    public function index(){
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/register", name="register")
     * @param Request $req
     * @param EntityManagerInterface $manager
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     */
    public function newUser(Request $req, EntityManagerInterface $manager,
                            UserPasswordEncoderInterface $encoder)
    {
        $user= new User();
        $form= $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $hash=$encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('user/register.html.twig', [
            'formUser' => $form->createView()]);
    }

    /**
     * @Route("/teams" , name="team_show")
     * @param Request $req
     * @param TeamRepository $teamRepo
     * @return Response
     */
    public function showTeams(Request $req, TeamRepository $teamRepo){
        $user=$req->getSession()->get('user');
        $teams=$teamRepo->getUserTeams($user->getId());
        $data=[];
        foreach ($teams as $t){
            $users=$t->getMembers();
            $tmp=[];
            foreach($users as $u){
                array_push($tmp,['user'=>$u->getUsername(), 'email'=>$u->getEmail()]);
            }
            array_push($data, ['name'=>$t->getName(), 'user'=>$tmp] );
        }
        return $this->render('/user/teams.html.twig',['data'=>$data, 'user'=>$user->getUsername()]);
    }


    /*
     * @Route("/teams/new", name="new_team)
     */
    public function newTeam(Request $req, EntityManagerInterface $manager){
        $team=new Team();
        $form=$this->createForm(NewTeamType::class, $team);
        $form->handleRequest($form);
        return $this->render('user/new_team.html.twig');

    }

    /**
     * @Route("/login", name="login")
     * @param AuthenticationUtils $auth
     * @param SessionInterface $session
     * @return Response
     */
    public function login(AuthenticationUtils $auth, SessionInterface $session): Response{
        $error = $auth->getLastAuthenticationError();
        $lastUName= $auth->getLastUsername();

        $data= $this->get('security.token_storage')->getToken()->getUser();

        $session->set('user', $data);
        return $this->render('user/login.html.twig',
            ['last_username'=>$lastUName, 'error'=>$error]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout(){}
}
