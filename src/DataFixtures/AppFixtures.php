<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\DataFixtures;

use App\Entity\ModuleReference;
use App\Entity\User;
use App\Utils\Slugger;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $this->loadUsers($manager);
        $this->loadModuleTypes($manager);
    }

    private function loadUsers(ObjectManager $manager)
    {
        foreach ($this->getUserData() as [$fullname, $email, $password, $roles]) {
            $user = new User();
            $user->setFullName($fullname);
            $user->setEmail($email);
            $user->setPassword($this->passwordEncoder->encodePassword($user, $password));
            $user->setRoles($roles);

            $manager->persist($user);
        }

        $manager->flush();
    }

    private function loadModuleTypes(ObjectManager $manager)
    {
        foreach ($this->getModuleTypeData() as [$name]) {
            $moduleType = new ModuleReference();
            $moduleType->setName($name);

            $manager->persist($moduleType);
        }

        $manager->flush();
    }

    private function getUserData(): array
    {
        return [
            // $userData = [$fullname, $email, $password, $roles];
            ['John Admin', 'admin@stellar.com', 'admin', ['ROLE_ADMIN']],
            ['John User', 'user@stellar.com', 'user', ['ROLE_USER']],
        ];
    }

    private function getModuleTypeData(): array
    {
        return [
            // $moduleType = [$name];
            ['Super vaisseau 1'],
            ['Super vaisseau 2'],
        ];
    }
}
