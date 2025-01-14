<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 29/09/16
 * Time: 10:27 PM
 */

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\DocumentType;

class LoadDocumentTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $documentType = new DocumentType();
        $documentType->setCode('CC');
        $documentType->setName('Cédula');
        $documentType->setTemplate(null);
        $manager->persist($documentType);

        $documentType = new DocumentType();
        $documentType->setCode('TI');
        $documentType->setName('Tarjeta de Identidad');
        $documentType->setTemplate(null);
        $manager->persist($documentType);

        $documentType = new DocumentType();
        $documentType->setCode('CE');
        $documentType->setName('Cédula Extranjeria');
        $documentType->setTemplate(null);
        $manager->persist($documentType);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
?> 