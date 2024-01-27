<?php

namespace App\EntityListener;

use App\Entity\Users;
use Doctrine\ORM\Events;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsEntityListener(event: Events::prePersist, method: 'prePresist', entity: Users::class)]
#[AsEntityListener(event: Events::preUpdate, method: 'preUpdate', entity: Users::class)]
class UserEntityListener
{
    private $hashPassword;

    public function __construct(UserPasswordHasherInterface $userPasswordHasherInterface)
    {
        $this->hashPassword = $userPasswordHasherInterface;
    }

    public function prePresist(Users $user) 
    {
        $this->encodePassword($user);
    }

    public function preUpdate(Users $user) 
    {
        $this->encodePassword($user);
    } 

    /**
     * Encode password based on plain password
     * @param Users $user
     * return void
     */
    public function encodePassword(Users $user) 
    {
        if($user->getPassword() === null) {
            return;
        }

        $user->setPassword(
            $this->hashPassword->hashPassword(
                $user,
                $user->getPassword()
            )
        );

    }
}