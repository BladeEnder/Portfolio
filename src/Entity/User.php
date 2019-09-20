<?php

namespace App\Entity;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
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
     * @ORM\Column(type="text")
     */
    private $username;

    /**
     * @ORM\Column(type="text")
     */
    private $password;
    
    /**
     * @ORM\Column(type="text")
     */
    private $email;

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setUsername($username)
    {
        $this->username=$username;
    }

    public function setPassword($password)
    {
        $this->password=$password;
    }

    public function setEmail($email)
    {
        $this->email=$email;
    }

    public function getSalt()
    {
        return null;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }
    public function eraseCredentials()
    {
    }
}
