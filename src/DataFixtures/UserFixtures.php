<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $contributor = new User();
        $contributor->setFirstName('Kelly');
        $contributor->setLastName('Slater');
        $contributor->setEmail('kelly.slater@gmail.com');
        $contributor->setNickName('boule de billard');
        $contributor->setCity('Cocoa Beach');
        $contributor->setRole(['ROLE_CONTRIBUTOR']);
        $contributor->setPassWord($this->passwordEncoder->encodePassword($contributor, 'kelly'));
        $manager->persist($contributor);
        $this->addReference('user_0', $contributor);

        $contributor = new User();
        $contributor->setFirstName('Mick');
        $contributor->setLastName('Fanning');
        $contributor->setEmail('mick.fanning@gmail.com');
        $contributor->setNickName('el autralien');
        $contributor->setCity('Coolangatta,');
        $contributor->setRole(['ROLE_CONTRIBUTOR']);
        $contributor->setPassWord($this->passwordEncoder->encodePassword($contributor, 'mick'));
        $manager->persist($contributor);
        $this->addReference('user_1', $contributor);

        $admin = new User();
        $admin->setFirstName('Laird');
        $admin->setLastName('Hamilton');
        $admin->setEmail('laird.hamilton@gmail.com');
        $admin->setNickName('le vieux');
        $admin->setCity('San Francisco');
        $admin->setRole(['ROLE_ADMIN']);
        $admin->setPassWord($this->passwordEncoder->encodePassword($admin, 'hamilton'));
        $manager->persist($admin);
        $this->addReference('user_0', $admin);


        $manager->flush();
    }
}
