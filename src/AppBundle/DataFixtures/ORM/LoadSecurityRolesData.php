<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 29/09/16
 * Time: 10:27 PM
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\RoleType;
use AppBundle\Entity\SecurityRole;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadSecurityRolesData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $roleType = new SecurityRole();
        $roleType->setCode('ROLE_ADMIN');
        $roleType->setName('Administrator');
        $manager->persist($roleType);

        $roleType = new SecurityRole();
        $roleType->setCode('ROLE_USER');
        $roleType->setName('User');
        $manager->persist($roleType);

        $roleType = new SecurityRole();
        $roleType->setCode('ROLE_STUDENT');
        $roleType->setName('Student');
        $manager->persist($roleType);

        $roleType = new SecurityRole();
        $roleType->setCode('ROLE_MONITOR');
        $roleType->setName('Monitor');
        $manager->persist($roleType);

        $roleType = new SecurityRole();
        $roleType->setCode('ROLE_TEACHER');
        $roleType->setName('Teacher');
        $manager->persist($roleType);

        $roleType = new SecurityRole();
        $roleType->setCode('ROLE_COORDINATOR');
        $roleType->setName('Outcome Coordinator');
        $manager->persist($roleType);

        $roleType = new SecurityRole();
        $roleType->setCode('ROLE_SECTION');
        $roleType->setName('Section Master');
        $manager->persist($roleType);

        $roleType = new SecurityRole();
        $roleType->setCode('ROLE_ABET_COORD');
        $roleType->setName('ABET Coordinator');
        $manager->persist($roleType);

        $roleType = new SecurityRole();
        $roleType->setCode('ROLE_DIRECTOR');
        $roleType->setName('Faculty Director');
        $manager->persist($roleType);

        $manager->flush();

    }

    public function getOrder()
    {
        return 1;
    }
}
?> 