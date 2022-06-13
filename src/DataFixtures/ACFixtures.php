<?php

namespace App\DataFixtures;

use App\Entity\AC;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ACFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $em): void
    {

        $roles = ["ROLE_USER", "ROLE_RP", "ROLE_AC"];
        $plainPassword = 'passer@123';
        for ($i = 1; $i <= 3; $i++) {
            $user = new AC();
            $user->setNomComplet("user" . $i);
            $user->setEmail("admin".$i."@gmail.com" . $i);
            $user->setRoles(["ROLE_AC"]);
            $encoded = $this->encoder->hashPassword(
                $user,
                $plainPassword
            );
            $user->setPassword($encoded);
            $em->persist($user);
            $this->addReference("User" . $i, $user);
        }

        $em->flush();
    }
}
