<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 29/09/16
 * Time: 10:27 PM
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Outcome;
use AppBundle\Entity\RoleType;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadOutcomeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $outcome = new Outcome();
        $outcome->setNameOutcome('(a)');
        $outcome->setEnglishDescriptionOutcome("An ability to apply knowledge of".
            " discrete and continuous mathematics, physics, probability, ".
            "statistics and Systems Engineering concepts and methods in".
            " the design of IT systems and services.");
        $manager->persist($outcome);

        $outcome = new Outcome();
        $outcome->setNameOutcome('(b)');
        $outcome->setEnglishDescriptionOutcome("An ability to design protocols ".
            "to test, evaluate and manage the quality of IT systems and ".
            "services, and an ability to integrate, analyze and interpret data.");
        $manager->persist($outcome);

        $outcome = new Outcome();
        $outcome->setNameOutcome('(c)');
        $outcome->setEnglishDescriptionOutcome("An ability to design IT systems".
            " and services to solve problems and take advantage of opportunities".
            " in several contexts,  to meet desired needs within realistic ".
            "constraints such as economic, environmental, social, political,".
            " ethical, health and safety, manufacturability, and sustainability.");
        $manager->persist($outcome);

        $outcome = new Outcome();
        $outcome->setNameOutcome('(d)');
        $outcome->setEnglishDescriptionOutcome("An ability to function on ".
            "multidisciplinary teams, having effective communication with ".
            "team members, and coordinate and lead those teams.");
        $manager->persist($outcome);

        $outcome = new Outcome();
        $outcome->setNameOutcome('(e)');
        $outcome->setEnglishDescriptionOutcome("An ability to identify systems ".
            "engineering problems and opportunities in several contexts; ".
            "identify solution alternatives; define criteria for selecting ".
            "solutions; and, formulate, plan and execute solutions using ".
            "information technology.");
        $manager->persist($outcome);

        $outcome = new Outcome();
        $outcome->setNameOutcome('(f)');
        $outcome->setEnglishDescriptionOutcome("An understanding of professional".
            " and ethical responsibility,  an attitude of service to society, ".
            "and the willingness to act accordingly.");
        $manager->persist($outcome);

        $outcome = new Outcome();
        $outcome->setNameOutcome('(g)');
        $outcome->setEnglishDescriptionOutcome("An ability to communicate proposed".
            " solutions in an assertive manner in oral and written form, using ".
            "appropriate tools; and, to listen and reflect in order to ensure".
            " effective communication in technical and non-technical environments.");
        $manager->persist($outcome);

        $outcome = new Outcome();
        $outcome->setNameOutcome('(h)');
        $outcome->setEnglishDescriptionOutcome("A knowledge of the local and ".
            "global context, in order to understand the impact of technology ".
            "and IT solutions in a  economic, environmental, and societal context.");
        $manager->persist($outcome);

        $outcome = new Outcome();
        $outcome->setNameOutcome('(i)');
        $outcome->setEnglishDescriptionOutcome(" A recognition of the need for, ".
            "and an ability to engage in, life-long learning of new concepts, ".
            "technologies and tools that promote personal and professional development.");
        $manager->persist($outcome);

        $outcome = new Outcome();
        $outcome->setNameOutcome('(j)');
        $outcome->setEnglishDescriptionOutcome("Stay informed of contemporary ".
            "issues and relate this information to one's profession.");
        $manager->persist($outcome);

        $outcome = new Outcome();
        $outcome->setNameOutcome('(k)');
        $outcome->setEnglishDescriptionOutcome("An ability to select and ".
            "apply the techniques, skills, and Systems Engineering modern ".
            "tools necessary for engineering problem solving.");
        $manager->persist($outcome);

        $manager->flush();

    }

    public function getOrder()
    {
        return 1;
    }
}
?> 