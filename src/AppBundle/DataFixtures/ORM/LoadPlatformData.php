<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 29/09/16
 * Time: 10:27 PM
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Period;
use AppBundle\Entity\Platform;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\DocumentType;

class LoadPlatformData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $platform = new Platform();

        $period = new Period();
        $period->setCode('0910');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('0920');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('0930');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1010');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1020');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1030');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1110');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1120');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1130');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1210');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1220');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1230');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1310');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1320');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1330');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1410');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1420');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1430');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1510');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1520');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1530');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1610');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1620');
        $platform->addPeriod($period);
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1630');
        $platform->addPeriod($period);
        $platform->setActivePeriod($period->getCode());
        $manager->persist($platform);

        $period = new Period();
        $period->setCode('1710');
        $platform->addPeriod($period);
        $platform->setActivePeriod($period->getCode());
        $manager->persist($platform);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
?> 