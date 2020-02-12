<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Migrations\Version\Factory;
use App\Entity\{Task, Team, User, Project};
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
//require_once 'vendor/autoload.php';
class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        // Create a testing member
        $user_test= new User();
        $user_test->setUsername('johndoe')
            ->setEmail('john@doe.fr')
            //pwd=jesuisjohn
            ->setPassword('$2y$12$6uDWN35o34UjPXdi18e2cew8.kU2SBDHLhG1HjQHGajq5bWA/ZCGG');
        $faker = Faker\Factory::create('FR_fr');
        for ($i = 0; $i < 10; $i++) {
            $team = new Team();
            $team->setName($faker->sentence($nbWords = 2));
            $project = new Project();
            $project->setName($faker->sentence($nbWords = 2))
                    ->setDescription($faker->paragraph())
                    ->addTeam($team);
            $team->addMember($user_test);
            $user_test->addTeam($team);
            for($j=0; $j<10; $j++){
                $user= new User();
                $user->setUsername($faker->name())
                    ->setEmail($faker->freeEmail())
                    ->setPassword($faker->password())
                    ->addTeam($team);
                $team->addMember($user);
                $task= new Task();
                $task->setTitle($faker->sentence($nbWords=3))
                    ->setDescription($faker->paragraph())
                    ->setState('todo')
                    ->setCreatedAt(new \DateTime())
                    ->setLastUpdate(new \DateTime())
                    ->setDeadline($faker->dateTime());
                $user_test->addTask($task);
                $user->addTask($task);
                $project->addTask($task);
                $manager->persist($user);
                $manager->persist($task);
            }
            $manager->persist($team);
            $manager->persist($project);
        }
        $manager->persist($user_test);
        $manager->flush();
    }
}