<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 29/09/16
 * Time: 10:27 PM
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\RoleType;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadRoleTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $roleType = new RoleType();
        $roleType->setRoleCode('ROLE_ADMIN');
        $roleType->setRoleName('Administrator');
        $manager->persist($roleType);

        $roleType = new RoleType();
        $roleType->setRoleCode('ROLE_USER');
        $roleType->setRoleName('User');
        $manager->persist($roleType);

        $roleType = new RoleType();
        $roleType->setRoleCode('ROLE_STUDENT');
        $roleType->setRoleName('Student');
        $manager->persist($roleType);

        $roleType = new RoleType();
        $roleType->setRoleCode('ROLE_MONITOR');
        $roleType->setRoleName('Monitor');
        $manager->persist($roleType);

        $roleType = new RoleType();
        $roleType->setRoleCode('ROLE_TEACHER');
        $roleType->setRoleName('Teacher');
        $manager->persist($roleType);

        $roleType = new RoleType();
        $roleType->setRoleCode('ROLE_COORDINATOR');
        $roleType->setRoleName('Outcome Coordinator');
        $manager->persist($roleType);

        $roleType = new RoleType();
        $roleType->setRoleCode('ROLE_SECTION');
        $roleType->setRoleName('Section Master');
        $manager->persist($roleType);

        $roleType = new RoleType();
        $roleType->setRoleCode('ROLE_ABET_COORD');
        $roleType->setRoleName('ABET Coordinator');
        $manager->persist($roleType);

        $roleType = new RoleType();
        $roleType->setRoleCode('ROLE_DIRECTOR');
        $roleType->setRoleName('Faculty Director');
        $manager->persist($roleType);

        $manager->flush();

    }

    public function getOrder()
    {
        return 1;
    }
}
?> 