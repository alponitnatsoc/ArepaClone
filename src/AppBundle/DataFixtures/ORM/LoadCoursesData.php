<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 29/09/16
 * Time: 10:27 PM
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\ClassCourse;
use AppBundle\Entity\Faculty;
use AppBundle\Entity\FacultyHasCourses;
use AppBundle\Entity\FacultyHasTeachers;
use AppBundle\Entity\Person;
use AppBundle\Entity\Teacher;
use AppBundle\Entity\TeacherDictatesClassCourse;
use AppBundle\Entity\TeacherDictatesCourse;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Course;

class LoadCoursesData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * ╔═══════════════════════════════════════════════════════════════╗
     * ║ Function load                                                 ║
     * ║ Creates data in the database entities from excel object.      ║
     * ║ ------------------------------------------------------------- ║
     * ║ Función load                                                  ║
     * ║ Crea los datos en las entidades de la base de datos desde un  ║
     * ║ objeto de excel o csv.                                        ║
     * ║                                                               ║
     * ║ Esta fixture carga la informacion de los cursos y profesores  ║
     * ║ asignandoles la persona y la facultad                         ║
     * ╠═══════════════════════════════════════════════════════════════╣
     * ║  @param ObjectManager $manager                                ║
     * ╚═══════════════════════════════════════════════════════════════╝
     */
    public function load(ObjectManager $manager)
    {
        /**
         * ╔═══════════════════════════════════════════════════════════════╗
         * ║ Reporte generado en el catalogo de consultas SAE              ║
         * ║ Modulo QA Catálogo y Programación                             ║
         * ║ División 2 Programación de Clases                             ║
         * ║ Opcion 4 Listas Asociación Profesores                         ║
         * ║ Parametros de la consulta                                     ║
         * ║ Institucion académica  PUJAV                                  ║
         * ║ Grado Académico        pregreado o postgrado                  ║
         * ║ Org Académica          %                                      ║
         * ║ Ciclo Lectivo:         0910-1420                              ║
         * ║ ------------------------------------------------------------- ║
         * ║ Se debe generar el archivo csv para cada ciclo lectivo        ║
         * ║ Una vez generado el archivo, guardarlo en el directorio:      ║
         * ║ /web/uploads/Files/Courses                                    ║
         * ║ con nombre PUJAV_(POST o PREG)_cicloLectivo.csv               ║
         * ╚═══════════════════════════════════════════════════════════════╝
         */

        $manager->getConnection()->getConfiguration()->setSQLLogger(null);
        echo "\033[0;33m  >\033[0;32m Memory usage before: " . (memory_get_usage()/1048576) . " MB \033[0;00m" . PHP_EOL;
        $dir = "web/uploads/Files/Courses";
        foreach (scandir($dir) as $file) {//42 COL
            if ('.' === $file || '..' === $file || '.DS_Store' === $file) continue;
            $filePath = $dir.'/'.$file;//
            $handle = fopen($filePath,'r');//opening the file in read mode
            $data = array();//initialising array data
            if($handle){//checking handle opens correctly
                echo "\033[0;33m  >\033[0;32m loading [3] ".$file."\033[0;00m".PHP_EOL;
                $count = 0;//course count in 0
                while(($buffer = fgets($handle)) !== false) {//getting the first line
                    $buffer = str_replace("\r\n",'',$buffer);//replacing special chars \r\n
                    $buffer = explode("//b\"", iconv("Windows-1252//IGNORE", "UTF-8", $buffer))[0];//ignoring special chars /b" in file
                    while(count(str_getcsv($buffer))<34){//checking data attributes lenght is 15
                        $str = fgets($handle);//if not getting the next handle
                        $str = str_replace("\r\n",'',$str);//replacing special chars \r\n
                        $str = explode("//b\"", iconv("Windows-1252//IGNORE", "UTF-8", $str))[0];//ignoring special chars /b" in file
                        $buffer.= $str;//adding the next handle to the previous handle
                    }
                    $data[$count]=str_getcsv($buffer);//getting all the course information in data array
                    if($count>0){
                        $facultyCode = $data[$count][10];//getting the faculty code
                        if($facultyCode =='INGEN') $facultyCode='DPT-ISIST';
                        /** @var Faculty $faculty */
                        $faculty = $manager->getRepository("AppBundle:Faculty")->findOneBy(array('facultyCode' =>$facultyCode));
                        if(!$faculty){//if faculty not found creates the new faculty
                            $faculty = new Faculty();
                            $faculty->setFacultyCode($facultyCode);
                            $manager->persist($faculty);
                            //echo '   [--Faculty with code '.$facultyCode.' created.--]'.PHP_EOL;
                        }
                        $documentNumber = $data[$count][15];//getting the document number of the teacher
                        $fullName = $data[$count][16];//getting the person name
                        /** @var Person $person */
                        $person = $manager->getRepository("AppBundle:Person")->findOneBy(array('document' => $documentNumber));
                        if($person == null){//if person not faund creates the new person and teacher
                            $person = new Person();
                            $person->setDocumentType('CC');
                            $person->setDocument($documentNumber);
                            $strex = explode(',', $fullName);
                            $nameex = explode(' ', $strex[1]);
                            $lastex = explode(' ', $strex[0]);
                            $secondName = '';
                            if(count($nameex) == 1){
                                $secondName = '';
                            } elseif (count($nameex) == 2) {
                                $secondName.= $nameex[1];
                            } elseif (count($nameex) > 2){
                                for($i = 1 ; $i<count($nameex);$i++){
                                    $secondName.=($i==1)?$nameex[$i]:' '.$nameex[$i];
                                }
                            }
                            $firstName = $nameex[0];
                            $lastName2 = '';
                            if(count($lastex) == 1){
                                $lastName2 = '';
                            } elseif (count($lastex) == 2) {
                                $lastName2 .= $lastex[1];
                            }elseif(count($lastex) > 2){
                                for($i = 1 ; $i<count($lastex);$i++){
                                    $lastName2.=($i==1)?$lastex[$i]:' '.$lastex[$i];
                                }
                            }
                            $lastName1 = $lastex[0];
                            $person->setFirstName($firstName);
                            $person->setSecondName($secondName);
                            $person->setLastName1($lastName1);
                            $person->setLastName2($lastName2);
                            $manager->persist($person);
                            //echo '   [--Person with document number '.$documentNumber.' created.--]'.PHP_EOL;
                        }
                        $teacherCode = $data[$count][14];//getting teacher code
                        /** @var Teacher $tTeacher */
                        $teacher = $manager->getRepository("AppBundle:Teacher")->findOneBy(array('teacherCode' => $teacherCode));
                        if($teacher == null ){
                            $teacher = new Teacher();
                            $teacher->setTeacherCode($teacherCode);
                            if($person->getTeacher() == null){
                                $teacher->setPersonPerson($person);
                                $person->setTeacher($teacher);
                                $manager->persist($person);
                            }
                            $manager->persist($teacher);
                            //echo '   [--Teacher with code '.$teacherCode.' created.--]'.PHP_EOL;
                        }elseif($teacher->getPersonPerson()== null and $person->getTeacher() == null){
                            $teacher->setPersonPerson($person);
                            $person->setTeacher($teacher);
                            $manager->persist($person);
                            $manager->persist($teacher);
                        }
                        $courseCode = $data[$count][2];//getting the course code
                        /** @var Course $course */
                        $course = $manager->getRepository("AppBundle:Course")->findOneBy(array('courseCode' => $courseCode));
                        if($course){
                            $courseComponent = $data[$count][19];
                            if($course->getComponent()){
                                if($course->getComponent()=='Teorico' and $courseComponent=='Teorico Práctico'){
                                    $course->setComponent($courseComponent);
                                    $manager->persist($course);
                                }
                            }else{
                                $course->setComponent($courseComponent);
                                $manager->persist($course);
                            }
                        }else{
                            echo 'course with code: '.$courseCode. "not found.".PHP_EOL;die;
                        }
                        /** @var FacultyHasCourses $facultyHasCourse */
                        $facultyHasCourse = $manager->getRepository("AppBundle:FacultyHasCourses")->findOneBy(array('facultyFaculty'=>$faculty,'courseCourse'=>$course));
                        if(!$facultyHasCourse){
                            $facultyHasCourse = new FacultyHasCourses();
                            $facultyHasCourse->setCourseCourse($course);
                            $facultyHasCourse->setFacultyFaculty($faculty);
                            $faculty->addFacultyHasCourse($facultyHasCourse);
                            $course->addCourseHasfaculty($facultyHasCourse);
                            $manager->persist($facultyHasCourse);
                        }
                        /** @var FacultyHasTeachers $facultyHasTeacher */
                        $facultyHasTeacher = $manager->getRepository("AppBundle:FacultyHasTeachers")->findOneBy(array('facultyFaculty' => $faculty, 'teacherTeacher' => $teacher));
                        if(!$facultyHasTeacher){
                            $facultyHasTeacher = new FacultyHasTeachers();
                            $facultyHasTeacher->setFacultyFaculty($faculty);
                            $facultyHasTeacher->setTeacherTeacher($teacher);
                            $teacher->addTeacherHasfaculty($facultyHasTeacher);
                            $faculty->addFacultyHasTeacher($facultyHasTeacher);
                            $manager->persist($facultyHasTeacher);
                        }
                        /** @var TeacherDictatesCourse $teacherDictatesCourse */
                        $teacherDictatesCourse = $manager->getRepository("AppBundle:TeacherDictatesCourse")->findOneBy(array('courseCourse' => $course, 'teacherTeacher' => $teacher));
                        if(!$teacherDictatesCourse){
                            $teacherDictatesCourse = new TeacherDictatesCourse();
                            $teacherDictatesCourse->setCourseCourse($course);
                            $teacherDictatesCourse->setTeacherTeacher($teacher);
                            $teacher->addTeacherDictatesCourse($teacherDictatesCourse);
                            $course->addCourseIsDictatedByTeacher($teacherDictatesCourse);
                            $manager->persist($teacherDictatesCourse);
                        }
                        $classCode = $data[$count][4];
                        $activePeriod = $data[$count][9];
                        /** @var ClassCourse $classCourse */
                        $classCourse = $manager->getRepository("AppBundle:ClassCourse")->findOneBy(array('classCode'=> $classCode,'activePeriod' =>$activePeriod));
                        if(!$classCourse){
                            $classCourse = new ClassCourse();
                            $classCourse->setClassCode($classCode);
                            $classCourse->setCourseCourse($course);
                            $classCourse->setActivePeriod($activePeriod);
                            $course->addClass($classCourse);
                            $manager->persist($classCourse);
                        }
                        /** @var TeacherDictatesClassCourse $teacherDictatesClassCourse */
                        $teacherDictatesClassCourse = $manager->getRepository("AppBundle:TeacherDictatesClassCourse")->findOneBy(array('teacherDictatesCourse' => $teacherDictatesCourse, 'classClass' => $classCourse));
                        if(!$teacherDictatesClassCourse){
                            $teacherDictatesClassCourse = new TeacherDictatesClassCourse();
                            $teacherDictatesClassCourse->setClassClass($classCourse);
                            $teacherDictatesClassCourse->setTeacherDictatesCourse($teacherDictatesCourse);
                            $classCourse->addClassHasTeacher($teacherDictatesClassCourse);
                            $teacherDictatesCourse->addClass($teacherDictatesClassCourse);
                            $manager->persist($teacherDictatesClassCourse);
                        }
                        $manager->flush();
                        $manager->clear();
                    }
                    if($count%2000 == 0){
                        echo "\033[0;33m  >\033[0;32m loading [3] Teacher and ClassCourse ".$file.' '.$count."\033[0;00m".PHP_EOL;
                    }
                    $count++;
                }
                fclose($handle);
            }
        }
        echo "\033[0;33m  >\033[0;32m Memory usage after: " . (memory_get_usage()/1048576) ." MB\033[0;00m". PHP_EOL;
    }

    public function getOrder()
    {
        return 3;
    }
}
?> 