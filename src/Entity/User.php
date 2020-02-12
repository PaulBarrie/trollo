<?php

namespace App\Entity;


use Symfony\Component\Serializer\Serializer;
use Symfony\Bridge\Doctrine\Validator\Constraints\{UniqueEntity};
use Symfony\Component\Validator\Constraints as Assert;
use \Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 *     fields= {"email", "username"},
 *     message= "Le champ renseigné est déjà utilisé."
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8", minMessage="Votre mots de passe doit contenir au moins 8 signes")
     */
    private $password;

    /**
     * @var string
     * @Assert\EqualTo(propertyPath="password",message="Les mots de passe doivent être identiques")
     */
    private $passwordConf;
    /**
     * @var bool
     */
    private $isActive;


    /**
     * @return string
     */
    public function getPasswordConf()
    {
        return $this->passwordConf;
    }

    /**
     * @param string $passwordConf
     */
    public function setPasswordConf($passwordConf)
    {
        $this->passwordConf = $passwordConf;
    }

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Team", mappedBy="members")
     *
     */
    private $teams;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Task", mappedBy="Task")
     */
    private $tasks;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->teams = new ArrayCollection();
        $this->isActive = true;
        $this->tasks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return (string)$this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): ?string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection|Team[]
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function addTeam(Team $team): self
    {
        if (!$this->teams->contains($team)) {
            $this->teams[] = $team;
            $team->addMember($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): self
    {
        if ($this->teams->contains($team)) {
            $this->teams->removeElement($team);
            $team->removeMember($this);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return Collection|Task[]
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    public function addTask(Task $task): self
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks[] = $task;
            $task->addTask($this);
        }

        return $this;
    }

    public function removeTask(Task $task): self
    {
        if ($this->tasks->contains($task)) {
            $this->tasks->removeElement($task);
            $task->removeTask($this);
        }
        return $this;
    }

}
