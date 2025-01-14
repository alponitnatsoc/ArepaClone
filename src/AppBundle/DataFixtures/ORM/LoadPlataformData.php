<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 29/09/16
 * Time: 10:27 PM
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Period;
use AppBundle\Entity\Plataform;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\DocumentType;

class LoadPlataformData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $plataform = new Plataform();

        $period = new Period();
        $period->setCode('0910');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('0920');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('0930');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1010');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1020');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1030');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1110');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1120');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1130');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1210');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1220');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1230');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1310');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1320');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1330');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1410');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1420');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1430');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1510');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1520');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1530');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1610');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1620');
        $plataform->addPeriod($period);
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1630');
        $plataform->addPeriod($period);
        $plataform->setActivePeriod($period->getCode());
        $manager->persist($plataform);

        $period = new Period();
        $period->setCode('1710');
        $plataform->addPeriod($period);
        $plataform->setActivePeriod($period->getCode());
        $manager->persist($plataform);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
?> 