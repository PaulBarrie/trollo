<?php

namespace App\Controller;

use App\Form\LoginFormAuth;
use App\Repository\TeamRepository;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Security;
use App\Entity\{Project, TaskSearch, Task, User};
use App\Form\TaskSearchType;
use App\Repository\ProjectRepository;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;

use App\Form\NewTaskType;
use Symfony\Component\HttpFoundation\{Request,
    Response,
    Session\SessionInterface,
    Session\Storage\Handler\NativeFileSessionHandler,
    Session\Storage\NativeSessionStorage};
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends UserTeamController
{

    /**
     * @Route("/home", name="home")
     * @param Request $req
     * @param TaskRepository $taskRepo
     * @return Response
     */
    public function home(Request $req,  TaskRepository $taskRepo): Response
    {
        $user=$req->getSession()->get('user');
        $search= new TaskSearch();
        $form=$this->createForm(TaskSearchType::class, $search);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()) {
            $optns = ['name' => $form->get('name')->getData(),
                'state' => $form->getData()->getState(),
                'emergency_order' => $form->getData()->getPriororder()];
        }
        else{
            $optns=[];
        }
        $tasks=$taskRepo->getUserTasks($user->getId(), $optns);
        $data=[];
        foreach ($tasks as $t) {
            $tmp=['id'=>$t->getId(), 'title'=>$t->getTitle(),
                'description'=>$t->getDescription(), 'state'=>$t->getState(),
                'deadline'=>$t->getDeadline()->format('Y-m-d')];
            if(array_key_exists($t->getProject()->getId(), $data)){
                array_push($data[$t->getProject()->getId()]['task'],$tmp);
            }
            else{
                $data[$t->getProject()->getId()]=['project_name'=>$t->getProject()->getName(),
                                            'task'=>[$tmp]];
            }
        }

        return $this->render('task/home.html.twig',
            ['user'=>$user->getUsername(), 'form'=>$form->createView(),
            'data' => $data]);
    }
    /*
     * @Route("/task/edit/{id}", name="update_task", methods="GET|POST")
     * @param $task_id
     */
    public function updateTask(Request $request,  $task_id){
        $em = $this->getDoctrine()->getManager();
        $task = $em->getRepository('AppTask')->find($task_id);
        if (!$task) {
            throw $this->createNotFoundException('record not found');
        }
        $form=$this->createForm(aNewTaskType::class, $task);
        $form->handleRequest($task);
        if($form->isSubmitted() && $form->isValid()){
            $this->redirectToRoute('home');
        }
        $em->flush();

        return $this->render('/task/new_task.html.twig',['form'=>$form]);
    }

    /*
     * @Route("/task/delete/{id}", name="delete_task", methods="DELETE")
     * @param $task_id
     */
    public function deleteTask($task_id){
        $this->
        $em = $this->getDoctrine()->getManager();
        $task = $em->getRepository('App:Task')->find($task_id);

        if (!$task) {
            return $this->redirectToRoute('list');
        }
        $em->remove($task);
        $em->flush();
        return $this->redirectToRoute('home');
    }


    /**
     * @Route("/task/new", name="newTask")
     * @param Request $req
     * @param EntityManagerInterface $manager
     * @return Response
     * @throws \Exception
     */
    public function newTask(Request $req, EntityManagerInterface $manager)
    {
        $task= new Task();
        $task->setCreatedAt(new \DateTime());
        $task->setLastUpdate(new \DateTime());
        $form= $this->createForm(NewTaskType::class, $task);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($task);
            $manager->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('task/new_task.html.twig', [
            'formTask' => $form->createView(),
        ]);
    }
}
