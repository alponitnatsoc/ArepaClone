<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AssessmentTool;
use AppBundle\Entity\AssessmentToolContributeOutcomes;
use AppBundle\Entity\AssessmentToolType;
use AppBundle\Entity\ClassCourse;
use AppBundle\Entity\Content;
use AppBundle\Entity\ContentContributesOutcome;
use AppBundle\Entity\Course;
use AppBundle\Entity\Outcome;
use AppBundle\Entity\Rubric;
use AppBundle\Entity\RubricHasAssessmentTool;
use AppBundle\Entity\Teacher;
use AppBundle\Entity\TeacherDictatesClassCourse;
use AppBundle\Entity\TeacherDictatesCourse;
use AppBundle\Entity\User;
use AppBundle\Form\NewRubric;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class CourseController extends Controller
{
    public function showCourseInfoAction($courseCode,Request $request)
    {
        if($this->isGranted('ROLE_ADMIN')){

        }
        if($this->isGranted('ROLE_TEACHER')){
            $em = $this->getDoctrine()->getManager();
            /** @var Course $course */
            $course = $em->getRepository("AppBundle:Course")->findOneBy(array('courseCode'=>$courseCode));
            if(!$course){
                $this->createNotFoundException();
            }
            if(count($course->getActiveCourseContributesOutcomes($this->getActivePeriod()))>0){
                $course->setContributeOutcome(true);
                $em->persist($course);
                $em->flush();
            }else{
                $course->setContributeOutcome(false);
                $em->persist($course);
                $em->flush();
            }
            /** @var User $user */
            $user = $this->getUser();
            /** @var Teacher $teacher */
            $teacher = $user->getPersonPerson()->getTeacher();
            /** @var TeacherDictatesCourse $tdc */
            $tdc = $teacher->getTeacherDictatesCourseByCourse($course)->first();
            $otherRubrics = $course->getRubricsNotMatchingTeacherDictatesCourse($tdc);
            $tdcls = $tdc->getClasses();
            $activeClasses = array();
            /** @var TeacherDictatesClassCourse $tdcl */
            foreach ($tdcls as $tdcl) {
                if($tdcl->getClassClass()->getActivePeriod()==$this->getActivePeriod()->getCode()){
                    $activeClasses[]=$tdcl->getClassClass();
                }
            }

            $period = $this->getActivePeriod();

            $formRubric = $this->createForm(NewRubric::class,null,array(
                'course'=>$course,
                'period'=>$period,
            ))->add('submit',SubmitType::class);

            $formRubric->handleRequest($request);
            if($formRubric->isSubmitted() and $formRubric->isValid()){
                $rubric = new Rubric();
                $rubric->setPeriod($this->getActivePeriod());
                $rubric->setCourseCourse($course);
                $rubric->setName($formRubric->get('name')->getData());
                $rubric->setTeacherDictatesCourse($tdc);
                foreach ($formRubric->get('assessmentTool')->getData() as $assTool) {
                    /** @var \AppBundle\Entity\AssessmentToolType $att */
                    $assessmentToolType = $em->getRepository("AppBundle:AssessmentToolType")->findOneBy(array(
                        'name'=>$assTool['type'],
                    ));
                    if(!$assessmentToolType){
                        $assessmentToolType = new AssessmentToolType();
                        $assessmentToolType->setName($assTool['type']);
                        $em->persist($assessmentToolType);
                    }
                    $assessmentTool = new AssessmentTool();
                    $assessmentTool->setPercentageGrade($assTool['percentage']);
                    $assessmentTool->setType($assessmentToolType);
                    $assessmentToolType->addAssessmentTool($assessmentTool);
                    $rubricHasAssessmentTool = new RubricHasAssessmentTool();
                    $rubricHasAssessmentTool->setAssessmentTool($assessmentTool);
                    $rubricHasAssessmentTool->setRubricRubric($rubric);
                    $rubric->addRubricHasAssessmentTool($rubricHasAssessmentTool);
                    $assessmentTool->addRubricHasAssessmentTool($rubricHasAssessmentTool);
                    if($assTool['content']){
                        $contents = $assTool['content'];
                        $outcomes = $assTool['outcomes'];
                        if($outcomes){
                            /** @var Outcome $outcome */
                            foreach ($outcomes as $outcome){
                                $finded = false;
                                foreach ($contents as $content){
                                    $contentContent = new Content();
                                    $contentContent->setName($content['name']);
                                    $contentContent->setInfo($content['info']);
                                    $contentContent->setPercentageAssessmentTool($content['percentageContent']);
                                    $contentContent->setPercentageGrade($content['percentageContent']*$assTool['percentage']);
                                    $contentContent->setRubricHasAssessmentTool($rubricHasAssessmentTool);
                                    $rubricHasAssessmentTool->addContent($contentContent);
                                    if($content['contributes']){
                                        $finded= true;
                                        $contentContent->setContributeOutcome(true);
                                        $contentContributesOutcome = new ContentContributesOutcome();
                                        $contentContributesOutcome->setOutcomeOutcome($outcome);
                                        $contentContributesOutcome->setPeriod($this->getActivePeriod());
                                        $contentContributesOutcome->setContentContent($contentContent);
                                        $contentContent->addContentContributesOutcome($contentContributesOutcome);
                                        $outcome->addContentContributesOutcome($contentContributesOutcome);
                                        $em->persist($contentContributesOutcome);
                                        $em->persist($outcome);
                                    }
                                    $em->persist($contentContent);
                                }
                                if(!$finded){
                                    $assessmentToolContributesOutcome  = new AssessmentToolContributeOutcomes();
                                    $assessmentToolContributesOutcome->setOutcomeOutcome($outcome);
                                    $assessmentToolContributesOutcome->setAssessmentTool($assessmentTool);
                                    $assessmentToolContributesOutcome->setPeriod($this->getActivePeriod());
                                    $outcome->addAssessmentToolContributeOutcome($assessmentToolContributesOutcome);
                                    $assessmentTool->addAssessmentToolContributeOutcome($assessmentToolContributesOutcome);
                                    $em->persist($assessmentToolContributesOutcome);
                                    $em->persist($outcome);
                                }
                            }
                        }else{
                            foreach ($contents as $content){
                                $contentContent = new Content();
                                $contentContent->setName($content['name']);
                                $contentContent->setInfo($content['info']);
                                $contentContent->setPercentageAssessmentTool($content['percentageContent']);
                                $contentContent->setPercentageGrade($content['percentageContent']*$assTool['percentage']);
                                $contentContent->setRubricHasAssessmentTool($rubricHasAssessmentTool);
                                $rubricHasAssessmentTool->addContent($contentContent);
                                $em->persist($contentContent);
                                $em->persist($rubricHasAssessmentTool);
                            }
                        }
                    }else{
                        $outcomes = $assTool['outcomes'];
                        if($outcomes){
                            foreach ($outcomes as $outcome) {
                                $assessmentToolContributesOutcome  = new AssessmentToolContributeOutcomes();
                                $assessmentToolContributesOutcome->setOutcomeOutcome($outcome);
                                $assessmentToolContributesOutcome->setAssessmentTool($assessmentTool);
                                $assessmentToolContributesOutcome->setPeriod($this->getActivePeriod());
                                $outcome->addAssessmentToolContributeOutcome($assessmentToolContributesOutcome);
                                $assessmentTool->addAssessmentToolContributeOutcome($assessmentToolContributesOutcome);
                                $em->persist($assessmentToolContributesOutcome);
                            }
                        }
                    }
                    $em->persist($assessmentTool);
                }
                $em->persist($rubric);
                $em->flush();
                $this->addFlash(
                    'message_title',
                    'app.success_rubric_create'
                );
                $this->addFlash(
                    'message_body',
                    'app.success_rubric_create_content'
                );
            }

            $myRubrics = $course->getRubricsByTeacherDictatesCourse($tdc);

            return $this->render('@App/Teacher/teacher_course.html.twig',array(
                'courseContributesOutcomes'=>$course->getActiveCourseContributesOutcomes($this->getActivePeriod()),
                'course'=>$course,
                'activeClasses'=>$activeClasses,
                'teacherDictatesCourse'=>$tdc,
                'myRubrics'=>$myRubrics,
                'otherRubrics'=>$otherRubrics,
                'formRubric'=>$formRubric->createView(),
//                'editRubric'=>$editRubric,
            ));


        }else{
            $this->createAccessDeniedException();
        }
        $this->redirectToRoute('dashboard',array(),307);
    }

    public function showClassCourseInfoAction($idClass, Request $request){
        if($this->isGranted('ROLE_ADMIN')){


        }
        if($this->isGranted('ROLE_TEACHER')){
            $em = $this->getDoctrine()->getManager();
            /** @var User $user */
            $user = $this->getUser();
            /** @var ClassCourse $classCourse */
            $classCourse = $em->getRepository('AppBundle:ClassCourse')->find($idClass);
            /** @var Teacher $teacher */

            $teacher = $user->getPersonPerson()->getTeacher();
            $classCourse->getClassHasTeacher();
            $find = false;
            /** @var TeacherDictatesClassCourse $tdcc */
            foreach ($classCourse->getClassHasTeacher() as $tdcc) {
                if($tdcc->getTeacherDictatesCourse()->getTeacherTeacher()==$teacher){
                    $find=true;
                }
            }
            if($find){/** @var TeacherDictatesCourse $tdc */
                $tdc = $teacher->getTeacherDictatesCourseByCourse($classCourse->getCourseCourse());
            }else{
                $this->createAccessDeniedException();
            }

            $formRubric = $this->createForm(NewRubric::class,null,array(
                'course'=>$classCourse->getCourseCourse(),
                'period'=>$this->getActivePeriod(),
            ))->add('submit',SubmitType::class);
            $formRubricView = $formRubric->createView();

            $formRubric->handleRequest($request);

            if($formRubric->isSubmitted() and $formRubric->isValid()){
                /** @var Rubric $rubric */
                $rubric = new Rubric();
                $rubric->setPeriod($this->getActivePeriod());
                $rubric->setCourseCourse($classCourse->getCourseCourse());
                $rubric->setName($formRubric->get('name')->getData());
                $rubric->setTeacherDictatesCourse($tdc);
                foreach ($formRubric->get('assessmentTool')->getData() as $assTool) {
                    /** @var \AppBundle\Entity\AssessmentToolType $att */
                    $assessmentToolType = $em->getRepository("AppBundle:AssessmentToolType")->findOneBy(array(
                        'name'=>$assTool['type'],
                    ));
                    if(!$assessmentToolType){
                        $assessmentToolType = new AssessmentToolType();
                        $assessmentToolType->setName($assTool['type']);
                        $em->persist($assessmentToolType);
                    }
                    $assessmentTool = new AssessmentTool();
                    $assessmentTool->setPercentageGrade($assTool['percentage']);
                    $assessmentTool->setType($assessmentToolType);
                    $assessmentToolType->addAssessmentTool($assessmentTool);
                    $rubricHasAssessmentTool = new RubricHasAssessmentTool();
                    $rubricHasAssessmentTool->setAssessmentTool($assessmentTool);
                    $rubricHasAssessmentTool->setRubricRubric($rubric);
                    $rubric->addRubricHasAssessmentTool($rubricHasAssessmentTool);
                    $assessmentTool->addRubricHasAssessmentTool($rubricHasAssessmentTool);
                    if($assTool['content']){
                        $contents = $assTool['content'];
                        $outcomes = $assTool['outcomes'];
                        if($outcomes){
                            /** @var Outcome $outcome */
                            foreach ($outcomes as $outcome){
                                $finded = false;
                                foreach ($contents as $content){
                                    $contentContent = new Content();
                                    $contentContent->setName($content['name']);
                                    $contentContent->setInfo($content['info']);
                                    $contentContent->setPercentageAssessmentTool($content['percentageContent']);
                                    $contentContent->setPercentageGrade($content['percentageContent']*$assTool['percentage']);
                                    $contentContent->setRubricHasAssessmentTool($rubricHasAssessmentTool);
                                    $rubricHasAssessmentTool->addContent($contentContent);
                                    if($content['contributes']){
                                        $finded= true;
                                        $contentContent->setContributeOutcome(true);
                                        $contentContributesOutcome = new ContentContributesOutcome();
                                        $contentContributesOutcome->setOutcomeOutcome($outcome);
                                        $contentContributesOutcome->setPeriod($this->getActivePeriod());
                                        $contentContributesOutcome->setContentContent($contentContent);
                                        $contentContent->addContentContributesOutcome($contentContributesOutcome);
                                        $outcome->addContentContributesOutcome($contentContributesOutcome);
                                        $em->persist($contentContributesOutcome);
                                        $em->persist($outcome);
                                    }
                                    $em->persist($contentContent);
                                }
                                if(!$finded){
                                    $assessmentToolContributesOutcome  = new AssessmentToolContributeOutcomes();
                                    $assessmentToolContributesOutcome->setOutcomeOutcome($outcome);
                                    $assessmentToolContributesOutcome->setAssessmentTool($assessmentTool);
                                    $assessmentToolContributesOutcome->setPeriod($this->getActivePeriod());
                                    $outcome->addAssessmentToolContributeOutcome($assessmentToolContributesOutcome);
                                    $assessmentTool->addAssessmentToolContributeOutcome($assessmentToolContributesOutcome);
                                    $em->persist($assessmentToolContributesOutcome);
                                    $em->persist($outcome);
                                }
                            }
                        }else{
                            foreach ($contents as $content){
                                $contentContent = new Content();
                                $contentContent->setName($content['name']);
                                $contentContent->setInfo($content['info']);
                                $contentContent->setPercentageAssessmentTool($content['percentageContent']);
                                $contentContent->setPercentageGrade($content['percentageContent']*$assTool['percentage']);
                                $contentContent->setRubricHasAssessmentTool($rubricHasAssessmentTool);
                                $rubricHasAssessmentTool->addContent($contentContent);
                                $em->persist($contentContent);
                                $em->persist($rubricHasAssessmentTool);
                            }
                        }
                    }else{
                        $outcomes = $assTool['outcomes'];
                        if($outcomes){
                            /** @var Outcome $outcome */
                            foreach ($outcomes as $outcome) {
                                $assessmentToolContributesOutcome  = new AssessmentToolContributeOutcomes();
                                $assessmentToolContributesOutcome->setOutcomeOutcome($outcome);
                                $assessmentToolContributesOutcome->setAssessmentTool($assessmentTool);
                                $assessmentToolContributesOutcome->setPeriod($this->getActivePeriod());
                                $outcome->addAssessmentToolContributeOutcome($assessmentToolContributesOutcome);
                                $assessmentTool->addAssessmentToolContributeOutcome($assessmentToolContributesOutcome);
                                $em->persist($assessmentToolContributesOutcome);
                            }
                        }
                    }
                    $em->persist($assessmentTool);
                }
                $em->persist($rubric);
                $em->flush();
                $this->addFlash(
                    'message_title',
                    'app.success_rubric_create'
                );
                $this->addFlash(
                    'message_body',
                    'app.success_rubric_create_content'
                );
            }

            $formSelectRubric=$this->get('form.factory')->createNamedBuilder('form_select_rubric')
                ->add('rubric',EntityType::class,array(
                    'class'=>'AppBundle\Entity\Rubric',
                    'choices'=>$classCourse->getCourseCourse()->getRubrics(),
                    'property_path'=>'name',
                    'required'=>true,
                    'multiple'=>false,
                    'expanded'=>false,
                ))
                ->add('submit',SubmitType::class)
                ->getForm();
            $formSelectRubricView = $formSelectRubric->createView();
            $formSelectRubric->handleRequest($request);
            if($formSelectRubric->isSubmitted() and $formSelectRubric->isValid()){
                if($classCourse->getRubrics().count()==0){
                    $classCourse->addRubric($formSelectRubricView->get('rubric')->getData());
                    $rubric->setClassCourseClassCourse($classCourse);
                }else{
                    $classCourse->removeRubric($classCourse->getRubrics()->first());
                    $classCourse->addRubric($formSelectRubricView->get('rubric')->getData());
                    $rubric->setClassCourseClassCourse($classCourse);
                }
                $em->persist($classCourse);
                $em->persist($rubric);
                $em->flush();
                $this->addFlash(
                    'message_title',
                    'app.success_rubric_change'
                );

            }

            return $this->render('@App/Teacher/class_course.html.twig',array(
                'classCourse'=>$classCourse,
                'teacherDictatesCourse'=>$tdc,
                'course'=>$classCourse->getCourseCourse(),
                'courseContributesOutcomes'=>$classCourse->getCourseCourse()->getActiveCourseContributesOutcomes($this->getActivePeriod()),
                'rubrics'=>$classCourse->getCourseCourse()->getRubrics(),
                'formRubric'=>$formRubricView,
                'formSelectRubric'=>$formSelectRubricView,
            ));


        }else{
            $this->createAccessDeniedException();
        }
        $this->redirectToRoute('dashboard',array(),307);
    }

    protected Function getActivePeriod(){
        return $this->getDoctrine()->getRepository('AppBundle:Period')->findOneBy(array(
            'code'=>$this->getDoctrine()->getRepository('AppBundle:Plataform')->find(1)->getActivePeriod(),
        ));
    }

}
