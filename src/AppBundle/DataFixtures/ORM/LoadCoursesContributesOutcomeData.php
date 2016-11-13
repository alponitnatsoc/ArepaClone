<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 29/09/16
 * Time: 10:27 PM
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\ContentContributesOutcome;
use AppBundle\Entity\CourseContributesOutcome;
use AppBundle\Entity\Outcome;
use AppBundle\Entity\RoleType;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCoursesContributesOutcomeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $outcomeA = $manager->getRepository("AppBundle:Outcome")->findOneBy(array('nameOutcome'=>'(a)'));
        $outcomeB = $manager->getRepository("AppBundle:Outcome")->findOneBy(array('nameOutcome'=>'(b)'));
        $outcomeC = $manager->getRepository("AppBundle:Outcome")->findOneBy(array('nameOutcome'=>'(c)'));
        $outcomeD = $manager->getRepository("AppBundle:Outcome")->findOneBy(array('nameOutcome'=>'(d)'));
        $outcomeE = $manager->getRepository("AppBundle:Outcome")->findOneBy(array('nameOutcome'=>'(e)'));
        $outcomeF = $manager->getRepository("AppBundle:Outcome")->findOneBy(array('nameOutcome'=>'(f)'));
        $outcomeG = $manager->getRepository("AppBundle:Outcome")->findOneBy(array('nameOutcome'=>'(g)'));
        $outcomeH = $manager->getRepository("AppBundle:Outcome")->findOneBy(array('nameOutcome'=>'(h)'));
        $outcomeI = $manager->getRepository("AppBundle:Outcome")->findOneBy(array('nameOutcome'=>'(i)'));
        $outcomeJ = $manager->getRepository("AppBundle:Outcome")->findOneBy(array('nameOutcome'=>'(j)'));

        $course = $manager->getRepository("AppBundle:Cour")->findOneBy(array('courseCode'=>'004206'));
        $courseContributesOutcome = new CourseContributesOutcome();
        $courseContributesOutcome->setOutcomeOutcome($outcomeA);
        $courseContributesOutcome->setCourseCourse($course);



        $manager->flush();

    }

    public function getOrder()
    {
        return 2;
    }
}
?> 