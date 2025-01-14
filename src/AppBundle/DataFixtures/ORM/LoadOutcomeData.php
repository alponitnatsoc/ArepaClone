<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 29/09/16
 * Time: 10:27 PM
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\BloomLevel;
use AppBundle\Entity\Outcome;
use AppBundle\Entity\PerformanceIndicator;
use AppBundle\Entity\RoleType;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadOutcomeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $outcomea = new Outcome();
        $outcomea->setName('(a)');
        $outcomea->setDescriptionEnglish("An ability to apply knowledge of" .
            " discrete and continuous mathematics, physics, probability, " .
            "statistics and Systems Engineering concepts and methods in" .
            " the design of IT systems and services.");
        $manager->persist($outcomea);

        $outcomeb = new Outcome();
        $outcomeb->setName('(b)');
        $outcomeb->setDescriptionEnglish("An ability to design protocols " .
            "to test, evaluate and manage the quality of IT systems and " .
            "services, and an ability to integrate, analyze and interpret data.");
        $manager->persist($outcomeb);

        $outcomec = new Outcome();
        $outcomec->setName('(c)');
        $outcomec->setDescriptionEnglish("An ability to design IT systems" .
            " and services to solve problems and take advantage of opportunities" .
            " in several contexts,  to meet desired needs within realistic " .
            "constraints such as economic, environmental, social, political," .
            " ethical, health and safety, manufacturability, and sustainability.");
        $manager->persist($outcomec);

        $outcomed = new Outcome();
        $outcomed->setName('(d)');
        $outcomed->setDescriptionEnglish("An ability to function on " .
            "multidisciplinary teams, having effective communication with " .
            "team members, and coordinate and lead those teams.");
        $manager->persist($outcomed);

        $outcomee = new Outcome();
        $outcomee->setName('(e)');
        $outcomee->setDescriptionEnglish("An ability to identify systems " .
            "engineering problems and opportunities in several contexts; " .
            "identify solution alternatives; define criteria for selecting " .
            "solutions; and, formulate, plan and execute solutions using " .
            "information technology.");
        $manager->persist($outcomee);

        $outcomef = new Outcome();
        $outcomef->setName('(f)');
        $outcomef->setDescriptionEnglish("An understanding of professional" .
            " and ethical responsibility,  an attitude of service to society, " .
            "and the willingness to act accordingly.");
        $manager->persist($outcomef);

        $outcomeg = new Outcome();
        $outcomeg->setName('(g)');
        $outcomeg->setDescriptionEnglish("An ability to communicate proposed" .
            " solutions in an assertive manner in oral and written form, using " .
            "appropriate tools; and, to listen and reflect in order to ensure" .
            " effective communication in technical and non-technical environments.");
        $manager->persist($outcomeg);

        $outcomeh = new Outcome();
        $outcomeh->setName('(h)');
        $outcomeh->setDescriptionEnglish("A knowledge of the local and " .
            "global context, in order to understand the impact of technology " .
            "and IT solutions in a  economic, environmental, and societal context.");
        $manager->persist($outcomeh);

        $outcomei = new Outcome();
        $outcomei->setName('(i)');
        $outcomei->setDescriptionEnglish("A recognition of the need for, " .
            "and an ability to engage in, life-long learning of new concepts, " .
            "technologies and tools that promote personal and professional development.");
        $manager->persist($outcomei);

        $outcomej = new Outcome();
        $outcomej->setName('(j)');
        $outcomej->setDescriptionEnglish("Stay informed of contemporary " .
            "issues and relate this information to one's profession.");
        $manager->persist($outcomej);

        $outcomek = new Outcome();
        $outcomek->setName('(k)');
        $outcomek->setDescriptionEnglish("An ability to select and " .
            "apply the techniques, skills, and Systems Engineering modern " .
            "tools necessary for engineering problem solving.");
        $manager->persist($outcomek);

        $manager->flush();

        $bloomLevel1 = new BloomLevel();
        $manager->persist($bloomLevel1);
        $bloomLevel2 = new BloomLevel();
        $manager->persist($bloomLevel2);
        $bloomLevel3 = new BloomLevel();
        $manager->persist($bloomLevel3);

        $manager->flush();

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel1)
            ->setOutcome($outcomea)
            ->setDescriptionEN(trim("Identify principles of discrete and continuous " .
                "mathematics, physics, probability, statistics or systems engineering " .
                "which can be applied to the design of IT systems and services."))
            ->setDescriptionES(trim("Identifica los principios de matemáticas discretas y" .
                " continuas, física, probabilidad , estadística o ingeniería de sistemas " .
                "aplicables al diseño de sistemas o servicios informáticos."))
            ->setExemplaryEN(trim("Identify and understand principles of discrete and " .
                "continuous mathematics, physics, probability, statistics or systems " .
                "engineering which can be applied to the design of IT systems and services."))
            ->setExemplaryES(trim("Identifica y entiende los principios de matemáticas discretas" .
                " y continuas, física, probabilidad , estadística o ingeniería de sistemas" .
                " aplicables al diseño de sistemas o servicios informáticos."))
            ->setCompetentEN(trim("Identify, but not fully understand, principles of discrete and " .
                "continuous mathematics, physics, probability, statistics or systems " .
                "engineering which can be applied to the design of IT systems and services."))
            ->setCompetentES(trim("Identifica de manera suficiente, pero sin comprender en su " .
                "totalidad, los principios de matemáticas, física, probabilidades y estadística" .
                " o ingeniería de sistemas aplicables al diseño de sistemas o servicios."))
            ->setBelowStandardEN(trim("Not able to identify or identify with many deficiencies, " .
                "principles of discrete and continuous mathematics, physics, probability, " .
                "statistics or systems engineering which can be applied to the design of " .
                "IT systems and services."))
            ->setBelowStandardES(trim("No identifica o identifica con muchas deficiencias los " .
                "principios de matemáticas discretas y continuas, física, probabilidad , " .
                "estadística o ingeniería de sistemas  aplicables al diseño de sistemas o " .
                "servicios informáticos."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel2)
            ->setOutcome($outcomea)
            ->setDescriptionEN(trim("Use principles of discrete and continuous mathematics, " .
                "physics, probability, statistics or systems engineering in order to solve" .
                " IT problems."))
            ->setDescriptionES(trim("Usar los principios de matemáticas discretas y continuas, " .
                "física, probabilidades , estadística o ingeniería de sistemas para resolver" .
                " problemas informáticos."))
            ->setExemplaryEN(trim("Solve problems applying correctly principles of discrete and " .
                "continuous mathematics, physics, probability, statistics or systems engineering."))
            ->setExemplaryES(trim("Resuelve los problemas aplicando correctamente los conceptos " .
                "asociados a matemáticas, física, probabilidades, estadística o ingeniería."))
            ->setCompetentEN(trim("The process for solving problems is correct but has minor defficiencies " .
                "either in entry data or in the use of  principles of discrete and continuous " .
                "mathematics, physics, probability, statistics or systems engineering."))
            ->setCompetentES(trim("El proceso  para resolver el problema es correcto pero tiene " .
                "deficiencias menores o bien en los datos de entrada o en el uso de principios " .
                "matemáticos, físicos de probabilidades, estadística o ingeniería."))
            ->setBelowStandardEN(trim("Not able to solve the problems or the solution is incomplete " .
                "for problems involving  principles of discrete and continuous mathematics, " .
                "physics, probability, statistics or systems engineering."))
            ->setBelowStandardES(trim("No resuelve problemas o resuelve de forma incompleta problemas " .
                "usando los principios de matemáticas, física, probabilidades , estadística o " .
                "ingeniería de sistemas."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel3)
            ->setOutcome($outcomea)
            ->setDescriptionEN(trim("Apply mathematical models or Systems Engineering concepts to " .
                "propose IT solutions."))
            ->setDescriptionES(trim("Aplicar los modelos matemáticos o conceptos de ingeniería de " .
                "sistemas para proponer soluciones informáticas"))
            ->setExemplaryEN(trim("Propose IT solutions correctly applying optimal models for the " .
                "problem to be solved."))
            ->setExemplaryES(trim("Propone soluciones informáticas aplicando correctamente los modelos" .
                " óptimos para el problema planteado."))
            ->setCompetentEN(trim("Propose IT solutions, for the problem to be solved, using models " .
                "or principles of discrete and continuous mathematics, physics, probability, " .
                "statistics or systems engineering."))
            ->setCompetentES(trim("Propone soluciones informáticas usando un modelo o principio de " .
                "matémática, física o ingeniería para el problema planteado."))
            ->setBelowStandardEN(trim("Not able to propose IT solutions applying  models or principles" .
                " of discrete and continuous mathematics, physics, probability, statistics or systems " .
                "engineering. Or the proposed solutions are very deficient."))
            ->setBelowStandardES(trim("No propone soluciones informáticas  aplicando  modelos matemáticos" .
                ", físicos  o conceptos de ingeniería de sistemas o las soluciones propuestas son" .
                " muy deficientes."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel1)
            ->setOutcome($outcomeb)
            ->setDescriptionEN(trim("Identify the need to use test cases and identify the different tests that must be performed for a system."))
            ->setDescriptionES(trim("El estudiante Identifica la necesidad de hacer casos de prueba y los diferentes tipos de prueba que deben realizar  para un sistema."))
            ->setExemplaryEN(trim("Identify the need to use test cases and perform all tests that must be performed for a given system."))
            ->setExemplaryES(trim("El estudiante Identifica la necesidad de hacer casos de prueba y todos los diferentes tipos de prueba que deben realizar  para un sistema determinado."))
            ->setCompetentEN(trim("Identify the need to use test cases and performs 80% of the most relevant test cases that must be performed for a given system."))
            ->setCompetentES(trim("El estudiante Identifica la necesidad de hacer casos de prueba y el 80% de los casos de pruebas más relevantes que se deben realizar  para un sistema determinado."))
            ->setBelowStandardEN(trim("Not able to identify the need to use test cases. No able to define the most important test cases for a given system."))
            ->setBelowStandardES(trim("El estudiante no Identifica la necesidad de hacer casos de prueba. No es capaz de definir los casos de prueba más importantes para un sistema determinado."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel1)
            ->setOutcome($outcomeb)
            ->setDescriptionEN(trim("Know the basic elements of a test protocol : functionality to test, input and output."))
            ->setDescriptionES(trim("El estudiante conoce los elementos básicos de un proceso de pruebas: funcionalidad a probar, entradas y salidas."))
            ->setExemplaryEN(trim("Know all the basic elements of a test protocol: description of the functionality to test, inputs and outputs."))
            ->setExemplaryES(trim("El estudiante conoce en su totalidad los elementos básicos de un proceso de pruebas: descripción de la funcionalidad a probar, entradas y salidas."))
            ->setCompetentEN(trim("Know the majority of the basic elements of a test protocol."))
            ->setCompetentES(trim("El estudiante conoce  la mayoría de los elementos básicos de un proceso de pruebas."))
            ->setBelowStandardEN(trim("Not know the basic elements of a test protocol."))
            ->setBelowStandardES(trim("El estudiante no conoce los elementos más básicos de un proceso de pruebas."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel2)
            ->setOutcome($outcomeb)
            ->setDescriptionEN(trim("Apply a functionality unit test protocol  which is predefined for a specific system."))
            ->setDescriptionES(trim("El estudiante aplica exitosamente un plan de pruebas funcionales unitarias prediseñado sobre un sistema determinado."))
            ->setExemplaryEN(trim("The designed test protocol covers more than 90% of the system functionality (completeness). Methods are applied correctly."))
            ->setExemplaryES(trim("El plan de pruebas aplicado cubre más del 90% de las funcionalidades del sistema (completitud).  Los métodos se aplican en forma correcta."))
            ->setCompetentEN(trim("The designed test protocol covers more than 50% of the system functionality. Methods are applied correctly in most cases."))
            ->setCompetentES(trim("El plan de pruebas aplicado cubre más del 50% de las funcionalidades del sistema.  Los métodos de prueba  se aplican en forma correcta en la mayoría de los casos."))
            ->setBelowStandardEN(trim("The designed test protocol coves less than 50% of the system functionality. Methods are not applied correctly in most cases."))
            ->setBelowStandardES(trim("El plan de pruebas cubre menos del 50% de las funcionalidades del sistema.  Los métodos de prueba no se aplican correctamente o se aplican en forma correcta en muy pocos casos."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel3)
            ->setOutcome($outcomeb)
            ->setDescriptionEN(trim("Design and execute a test protocol for functional requirements: by componentes and integrated test for a given system."))
            ->setDescriptionES(trim("El estudiante diseña y  realiza exitosamente un plan de pruebas para requerimientos funcionales:  de componentes e integración sobre un sistema determinado."))
            ->setExemplaryEN(trim("The designed test protocol contains all elements and covers more than 90% of the system functionality (completeness). Methods are applied correctly."))
            ->setExemplaryES(trim("El plan de pruebas contiene todos los elementos y cubre más del 90% de las funcionalidades del sistema (completitud).  Los métodos se aplican en forma correcta."))
            ->setCompetentEN(trim("The test protocol contains all elements.  The designed test protocol covers more than 50% of the system functionality. Methods are applied correctly in most cases."))
            ->setCompetentES(trim("El plan de pruebas contiene todos los elementos. Los casos de prueba cubren más del 50% de las funcionalidades del sistema.  Los métodos de prueba  se aplican en forma correcta en la mayoría de los casos."))
            ->setBelowStandardEN(trim("The test protocol does not contain all needed elements. The designed test protocol coves less than 50% of the system functionality. Methods are not applied correctly in most cases."))
            ->setBelowStandardES(trim("El plan de pruebas no contiene todos los elementos necesarios. Los casos de prueba cubren menos del 50% de las funcionalidades del sistema.  Los métodos de prueba no se aplican correctamente o se aplican en forma correcta en muy pocos casos."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel3)
            ->setOutcome($outcomeb)
            ->setDescriptionEN(trim("Design and execute a test protocol for non-functional requirements: performance test for a given system."))
            ->setDescriptionES(trim("El estudiante diseña y  realiza exitosamente un plan de pruebas para requerimientos no funcionales: pruebas de rendimiento sobre un sistema determinado."))
            ->setExemplaryEN(trim("The designed test protocol contains all elements. Methods are applied correctly. All needed tests for evaluating performance of the given system are executed using specific metrics."))
            ->setExemplaryES(trim("El plan de pruebas contiene todos los elementos. Los métodos se aplican en forma correcta. Se hacen todas las pruebas necesarias para evaluar el rendimiento del sistema utilizando determinadas métricas."))
            ->setCompetentEN(trim("The designed test protocol contains all elements. Methods are applied correctly in most cases. The majority of needed tests for evaluating performance of the given system are executed using specific metrics."))
            ->setCompetentES(trim("El plan de pruebas contiene todos los elementos. Los métodos de prueba  se aplican en forma correcta en la mayoría de los casos.  Se hacen la mayoría  de pruebas necesarias para evaluar el rendimiento del sistema  utilizando determinadas métricas."))
            ->setBelowStandardEN(trim("The designed test protocol does not contain all elements. Tests are insufficient. Methods are not applied correctly in most cases."))
            ->setBelowStandardES(trim("El plan de pruebas no contiene todos los elementos necesarios. Las pruebas son insuficientes. Los métodos de prueba no se aplican correctamente o se aplican en forma correcta en muy pocos casos."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel3)
            ->setOutcome($outcomeb)
            ->setDescriptionEN(trim("Report, analyze and interpret results."))
            ->setDescriptionES(trim("El estudiante reporta, analiza y/o interpreta los resultados."))
            ->setExemplaryEN(trim("Report and analyze all given results and is able to correctly interpret them using theoretical elements."))
            ->setExemplaryES(trim("El estudiante reporta y/o analiza todos los resultados obtenidos y, si es necesario, los interpreta correctamente utilizando elementos teóricos."))
            ->setCompetentEN(trim("Report and analyze most of relevant results and is able to interpret them using theoretical elements, with some minor failures in reasoning."))
            ->setCompetentES(trim("El estudiante reporta y/o analiza la mayoría de los resultados de interés  y, cuando es necesario, trata de interpretarlos  utilizando elementos teóricos, aunque tiene algunas fallas leves en el razonamiento."))
            ->setBelowStandardEN(trim("Do not correctly  report, analyze or interpret given results."))
            ->setBelowStandardES(trim("El estudiante no reporta, analiza y/o interpreta los resultados obtenidos."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel1)
            ->setOutcome($outcomec)
            ->setDescriptionEN(trim("Identify and enumerate the system's requeriments."))
            ->setDescriptionES(trim("Los estudiantes identifican y enumeran adecuadamente los requerimientos de un sistema."))
            ->setExemplaryEN(trim("Interpret clients' needs. Explain the initial objectives considering goals, requirements and performance metrics. Identify the factors tha define the context of requirements."))
            ->setExemplaryES(trim("Interpreta las necesidades del cliente. Explica los objetivos iniciales considerando las metas, requerimientos y métricas de desempeño. Distingue los factores que fijan el contexto de los requerimientos."))
            ->setCompetentEN(trim("Indentify systems' requirements in a controlled context. Enumerate the goals and requirements of a system and formulate the initial objectives based on needs, opportunities and other factors. "))
            ->setCompetentES(trim("Identifica los requermientos de un sistema en un contexto controlado. Nombra las metas y requerimientos del sistema, y formula los objetivos iniciales basándose en necesidades, oportunidades  y otros factores."))
            ->setBelowStandardEN(trim("Do not identify the minimun requirements needed to sedign the system."))
            ->setBelowStandardES(trim("No identifica los requerimientos mínimos necesarios para el diseño del sistema."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel1)
            ->setOutcome($outcomec)
            ->setDescriptionEN(trim("Identify tools and elements needed to express the design of a project."))
            ->setDescriptionES(trim("Los estudiantes identifican las herramientas y elementos que le permiten expresar el diseño de un proyecto."))
            ->setExemplaryEN(trim("Identify the appropriate methodology for the project development and understand the advantages and disadvantages of other metodologies."))
            ->setExemplaryES(trim("Identifica la metodología apropiada para el desarrollo del proyecto y comprende las ventajas y desventajas de otras metodologías."))
            ->setCompetentEN(trim("Outline the activities that must be followed during the design phases of a system. "))
            ->setCompetentES(trim("Enuncia las actividades a realizar en las fases de diseño del sistema"))
            ->setBelowStandardEN(trim("Do not outline the activities nor identify the tools for a project design. "))
            ->setBelowStandardES(trim("No enuncia las actividades o identifica herramientas para el diseño del proyecto."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel2)
            ->setOutcome($outcomec)
            ->setDescriptionEN(trim("Properly Identify and document the requirements accrding to the environment restrictions. "))
            ->setDescriptionES(trim("El estudiante identifica y documenta adecuadamente los requerimientos de acuerdo a las restricciones del entorno."))
            ->setExemplaryEN(trim("Identify the requirements  and correctly relate them according to the restrictions in a real context. Suggest improvements to existing elements in order to integrate them to identified requirements.   "))
            ->setExemplaryES(trim("Logra identificar los requerimientos y los relaciona de forma adecuada de acuerdo a las restricciones de un entorno real y plantea mejoras a los elementos ya existentes para acoplarlos a los requerimientos identificados"))
            ->setCompetentEN(trim("Identify the requirements  and correctly relate them according to the restrictions in a real context and their impact on the project.  "))
            ->setCompetentES(trim("Logra identificar los requerimientos y los relaciona de forma adecuada de acuerdo a las restricciones de un entorno real y al impacto que tendrán en el proyecto"))
            ->setBelowStandardEN(trim("Do not identify requirements nor identify the relations among them, which is needed to design the system.  "))
            ->setBelowStandardES(trim("No identifica los requerimientos ni las relaciones entre ellos necesarios para el diseño del sistema."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel2)
            ->setOutcome($outcomec)
            ->setDescriptionEN(trim("Understand the design methodologies suitable for the specific problem. "))
            ->setDescriptionES(trim("El estudiante entiende las metodologías de diseño adecuadas al problema específico. "))
            ->setExemplaryEN(trim("Correctly understand  design methodologies based on defined requirements and align them with a solution applicable to a real context. "))
            ->setExemplaryES(trim("El estudiante entiende correctamente las metodologías de diseño con base en los requerimientos obtenidos alineandolas correctamente con una solución aplicable a un entorno real"))
            ->setCompetentEN(trim("Understand design methodologies and select them based on defined requirements.  "))
            ->setCompetentES(trim("El estudiante entiende correctamente las metodologías de diseño y las selecciona con base en los requerimientos obtenidos"))
            ->setBelowStandardEN(trim("Partially understand design methodologies and defined requirements are not taken into account. "))
            ->setBelowStandardES(trim("El estudiante entiende parcialmente las metodologías de diseño y no tiene en cuenta los requerimientos obtenidos."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel3)
            ->setOutcome($outcomec)
            ->setDescriptionEN(trim("Design solutions to engineering problems, subject to context restrictions integrating identified requirements. "))
            ->setDescriptionES(trim("Diseñar soluciones a problemas de ingeniería sujetas a las restricciones del entorno integrando los requerimientos identificados."))
            ->setExemplaryEN(trim("Select the best alternative and effectively execute the design according to priority requirements, restrictions and using the standards applied to a project, justifying design decisions. "))
            ->setExemplaryES(trim("Selecciona la mejor alternativa para realizar el diseño y lo ejecuta eficazmente de acuerdo con los requerimientos prioritarios, restricciones y estándares aplicados a un proyecto, justificando todas las decisiones del diseño."))
            ->setCompetentEN(trim("Design the system according to priority requirements, restrictions and using the standards applied to a project. "))
            ->setCompetentES(trim("Diseña el sistema de acuerdo con los requerimientos prioritarios, restricciones y estándares aplicados a un proyecto."))
            ->setBelowStandardEN(trim("Design the system in a basic way without complying with minimun requirements. No justificaction of design decisions.  "))
            ->setBelowStandardES(trim("Diseña el sistema de forma básica sin cumplir con los requerimientos mínimos y sin justificar las decisiones de diseño."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel1)
            ->setOutcome($outcomed)
            ->setDescriptionEN(trim("Identify objectives, roles and responsibilities in a multidisciplinary work team. "))
            ->setDescriptionES(trim("Identificar objetivos, roles y responsabilidades en un equipo de trabajo multidisciplinario."))
            ->setExemplaryEN(trim("Recognize the need and challenges of working in teams. Identify members with their differentiated roles and profiles and the requirements to coordinate and lead a team. "))
            ->setExemplaryES(trim("Reconoce la necesidad y retos de trabajar en equipo, pudiendo identificar actores con sus roles y perfiles diferenciados en detalle y los requerimientos que impone a la coordinación y liderazgo del equipo."))
            ->setCompetentEN(trim("Recognize the need and challenges of working in teams. Identify members involved and value the possibility of ease and coordinate the interaction among them.  "))
            ->setCompetentES(trim("Reconoce la necesidad y retos de trabajar en equipos con múltiples interesados, pudiendo identificar los actores que pueden estar involucrados y el valor de poder facilitar o coordinar su interacción."))
            ->setBelowStandardEN(trim("May recognize the need to work in multidisciplinary teams but is not able to identify either different roles or responsibilities nor the impact in his/her own role. "))
            ->setBelowStandardES(trim("Puede reconocer la necesidad de trabajar en equipos multidisciplinarios, pero no identifica roles o responsabilidades diferenciadas ni el impacto que puede tener en su propio rol."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel2)
            ->setOutcome($outcomed)
            ->setDescriptionEN(trim("Understand implications, strategies and mecanisms that allow the work in multidisciplinary teams for the devlopment and management of IT systems and services, emphasizing  in abilities and techniques to coordinate and lead those teams. "))
            ->setDescriptionES(trim("Entender las implicaciones, estrategias y mecanismos que permiten trabajar en equipos multidisciplinarios de desarrollo y gestión de sistemas y servicios informáticos con un énfasis en las habilidades y técnicas asociadas a la coordinación y liderazgo de los mismos."))
            ->setExemplaryEN(trim("Understand the roles, responsibilities, team organization types and communication mecanisms with technical and non-technical roles. Understand abilities and techniques contributing to an effective team leadership. "))
            ->setExemplaryES(trim(" Entiende los roles, responsabilidades, tipos de organización de equipos y mecanismos de comunicación efectiva tanto a roles técnicos como no técnicos, así como las habilidades y técnicas que contribuyen a un liderazgo efectivo del equipo."))
            ->setCompetentEN(trim("Understand the roles, responsibilities, team organization types and communication mecanisms with technical and non-technical roles. "))
            ->setCompetentES(trim(" Entiende los roles, responsabilidades, tipos de organización de equipos y mecanismos de comunicación efectiva tanto a roles técnicos como no técnicos."))
            ->setBelowStandardEN(trim("Limited understanding of  the technical and non-technical roles that may be associated to a multidisciplinary team. "))
            ->setBelowStandardES(trim("Tiene un entendimiento limitado de los roles tanto técnicos como no técnicos que pueden estar asociados a un equipo multidisciplionario."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel3)
            ->setOutcome($outcomed)
            ->setDescriptionEN(trim("Able to responsibly participate in a multidisciplinary team from the assigned role.  "))
            ->setDescriptionES(trim("Es capaz de participar responsablemente en un equipo multidisciplinario desde el rol que le compete."))
            ->setExemplaryEN(trim("Show a higher commitment than the one related to the role assigned , caring about for a contribution beyond individual responsibility, looking the team benefit. "))
            ->setExemplaryES(trim("Demuestra un compromiso mayor al del rol que le compete, preocupándose por contribuir más allá de su responsabilidad individual en beneficio del equipo."))
            ->setCompetentEN(trim("Accomplish the tasks and responsibilities assigned to the role in a multidisciplinary team, in appropriate interaction with other team members. "))
            ->setCompetentES(trim("Cumple con las tareas y responsabilidades esperadas del rol respectivo que asume en un equipo multidisciplinario de manera articulada al resto de los participantes."))
            ->setBelowStandardEN(trim("Do not totally accomplish tasks or responsibilities assigned in the team  or is not able to appropriately interact with the work of other team members."))
            ->setBelowStandardES(trim("Incumple parcial o totalmente con sus tareas o responsabilidades ante el equipo o es incapaz de articularlas al trabajo de los demás."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel1)
            ->setOutcome($outcomee)
            ->setDescriptionEN(trim("Know strategies to identify, formulate, plan and execute solutions to an IT related engineering problem. "))
            ->setDescriptionES(trim("Conocer las estrategias para identificar, formular, planear y ejecutar un problema de ingeniería relacionado con tecnologías de información"))
            ->setExemplaryEN(trim("Identify needs or problematic situations. Describe problems. Able to identify alternatives to the steps given for the solution of the problem.  "))
            ->setExemplaryES(trim("Identifica necesidades o situaciones problemáticas. Describe problemas. Es capaz de identificar alternativas a los pasos dados para la formulación de la solución. "))
            ->setCompetentEN(trim("Identify needs or problematic situations. Describe the problem. Able to follow the steps needed to formulate the solution. "))
            ->setCompetentES(trim("Identifica necesidades o situaciones problemáticas y describe el problema. Es capaz de seguir los pasos dados para formular la solución."))
            ->setBelowStandardEN(trim("Not able to identify the problematic situation. Not able to follow the steps to formulate the solution of the problem. "))
            ->setBelowStandardES(trim("No logra identificar la problemática o no es capaz de sguir los pasos para formular la solución a un problema"));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel2)
            ->setOutcome($outcomee)
            ->setDescriptionEN(trim("Understand an IT related engineering problem, formulating, planning and executing the solution in a controlled environment. "))
            ->setDescriptionES(trim("Entender un problema de ingeniería relacionado con tecnologías de información, formulando, planeando y ejecutando la solución en un entorno controlado"))
            ->setExemplaryEN(trim("Completely understand the problem and use the best strategies to formulate, and correctly and completely implement a solution. "))
            ->setExemplaryES(trim("Entiende completamente el problema y utiliza las mejores estrategias para formular e implementar de forma correcta y completa una solución."))
            ->setCompetentEN(trim("Understand the problem an use strategies to formulate, and  implement the most relevant aspects of a solution."))
            ->setCompetentES(trim("Entiende el problema y utiliza estrategias para formular e implementar  los aspectos más relevantes de una solución."))
            ->setBelowStandardEN(trim("Do not understand the problem neither use appropriate strategies to solve it. "))
            ->setBelowStandardES(trim("No logra entender el problema ni utilizar estrategias adecuadas para dar solución al mismo"));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel3)
            ->setOutcome($outcomee)
            ->setDescriptionEN(trim("Establish several solution alternatives, evaluate them and  implement strategies to solve a problem. "))
            ->setDescriptionES(trim("Determinar distintas alternativas de solución, las evalúa e implementa estrategias para resolver un problema."))
            ->setExemplaryEN(trim("Select and implement required  strategies to solve an engineering problem, integrating all needed resources and propose improvements to the alternatives given to solve the problem."))
            ->setExemplaryES(trim("Selecciona e implementa las estrategias necesarias para resolver un problema de ingeniería, integrando todos los recursos necesarios e identifica y propone mejoras a las alternativas dadas para resolver los problemas"))
            ->setCompetentEN(trim("Select and implement required  strategies to solve an engineering problem, integrating all needed resources."))
            ->setCompetentES(trim("Selecciona e implementa las estrategias necesarias para resolver un problema de ingeniería, integrando todos los recursos necesarios "))
            ->setBelowStandardEN(trim("Do not establish possible solutions neither study different points of view  in order to propose a solution. "))
            ->setBelowStandardES(trim("No determina posibles soluciones o no contempla diferentes puntos de vista para proponer una solución."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel1)
            ->setOutcome($outcomef)
            ->setDescriptionEN(trim("Know the ethical and professional implications of acting as a Systems Engineer, including local and global codes of ethics. "))
            ->setDescriptionES(trim("Conoce las implicaciones profesionales y éticas del ejercicio de su profesión, incluyendo códigos locales y globales."))
            ->setExemplaryEN(trim("Indentify professional and ethical responsibilities along with the current codes and standards. Can indentify their importance in real cases. "))
            ->setExemplaryES(trim("Identifica sus responsabilidades profesionales y éticas, junto con los códigos o estándares vigentes y puede identificar su importancia en casos reales."))
            ->setCompetentEN(trim("Able to indentify professional and ethical responsibilities of systems engineering along with some of the current codes of ethics.  "))
            ->setCompetentES(trim("Es capaz de identificar las responsabilidades profesionales y éticas típicas de la ingeniería de sistemas y algunos de los códigos de ética nacionales y globales vigentes."))
            ->setBelowStandardEN(trim("Limited identification of future professional and ethical responsibilities and is not aware of the current codes of ethics. "))
            ->setBelowStandardES(trim("Identifica de manera limitada sus futuras responsabilidades profesionales y éticas y desconoce los códigos vigentes al respecto."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel2)
            ->setOutcome($outcomef)
            ->setDescriptionEN(trim("Able to understand professional and ethical implications in real cases in Systems Engineering practice. "))
            ->setDescriptionES(trim("Es capaz de entender las implicaciones éticas y profesionales de casos reales del ejercicio profesional de la ingeniería de sistemas."))
            ->setExemplaryEN(trim("Recognize and explain the ethical and professional implications in documented real cases of Systems Engineering practice and can offer specific recommendations associated to current standards or ethic codes. "))
            ->setExemplaryES(trim("Reconoce y explica las implicaciones profesionales y éticas presentes en casos reales en ingeniería de sistemas documentados y puede hacer recomendaciones específicas asociadas a códigos o estándares vigentes."))
            ->setCompetentEN(trim("Recognize and explain the ethical and professional implications in documented real cases of Systems Engineering practice "))
            ->setCompetentES(trim("Reconoce y explica las implicaciones profesionales y éticas presentes en casos reales en ingeniería de sistemas documentados."))
            ->setBelowStandardEN(trim("Do not fully recognize nor can explain the ethical and professional implications in documented real cases of Systems Engineering practice "))
            ->setBelowStandardES(trim("Reconoce de manera limitada o no es capaz de explicar las implicaciones profesionales y éticas presentes en casos reales en ingeniería de sistemas documentados."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel3)
            ->setOutcome($outcomef)
            ->setDescriptionEN(trim("Embrace the fundamental principles established by the ethics of a systems engineer in a real social context "))
            ->setDescriptionES(trim("Interioriza los principios fundamentales establecidos por la ética de un ingeniero de sistemas en un entorno real (social)"))
            ->setExemplaryEN(trim("Show a compromise with people affected by the work developed as a systems engineer and demonstrate willingness to act exceding minimun responsibility. "))
            ->setExemplaryES(trim("Se compromete con los afectados en el desarrollo de su labor como ingeniero y evidencia preparación para actuar excediendo su responsabilidad mínima"))
            ->setCompetentEN(trim("Recognize people who may be affected by the work developed as system engineer and act based on respect, responsibility and an analysis of the context. "))
            ->setCompetentES(trim("Reconoce quien(es) se ven afectados en el desarrollo de su labor como ingeniero y actua con base en el respeto, la responsabilidad y análisis del contexto de aplicación."))
            ->setBelowStandardEN(trim("Fail to fulfill, either partially or totally, the professional or ethical responsibilities, which are expected in a real context.  "))
            ->setBelowStandardES(trim("Incumple parcial o totalmente sus responsabilidades y actitudes profesionales o éticas esperadas en contextos reales de aplicación."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel1)
            ->setOutcome($outcomeg)
            ->setDescriptionEN(trim("Recognize the importance of oral and written communication in professional development. "))
            ->setDescriptionES(trim("Reconoce la importancia que tiene la comunicación oral y escrita, en el desempeño profesional."))
            ->setExemplaryEN(trim("Identify and clearly explain the implications of a good oral and written communication. "))
            ->setExemplaryES(trim("Identifica y explica  de manera clara las implicaciones de una buena comunicación oral y escrita"))
            ->setCompetentEN(trim("Identify some elements of an effective communication "))
            ->setCompetentES(trim("Identifica solamente algunos elementos de una comunicación efectiva."))
            ->setBelowStandardEN(trim("Do not identify the elements of an effective communication.  "))
            ->setBelowStandardES(trim("No identifica los elementos de una comunicación efectiva."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel2)
            ->setOutcome($outcomeg)
            ->setDescriptionEN(trim("Able to understand the basic established rules in order to communicate a technical work using the appropriate language.  "))
            ->setDescriptionES(trim("Es capaz de comprender las normas báscias establecidas para comunicar un trabajo técnico utilizando el lenguaje apropiado."))
            ->setExemplaryEN(trim("Identify and explain the basic rules for the correct presentation of a technical document and other rules that henlp present it to a non-technical audience. "))
            ->setExemplaryES(trim("Identifica y explica las normas básicas para la presentación correcta de un documento técnico y ótras que contribuyan a presentarlo ante un público no técnico."))
            ->setCompetentEN(trim("Identify and explain the basic correct rules to communicate a technical work. "))
            ->setCompetentES(trim("Identifica y explica las normas básicas correctas para la comunicación de un trabajo técnico."))
            ->setBelowStandardEN(trim("Show misunderstanding of the standards for communicating a technical work. "))
            ->setBelowStandardES(trim("Presenta confusiones en relación con los estándares de comunicación de un trabajo técnico."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel3)
            ->setOutcome($outcomeg)
            ->setDescriptionEN(trim("Able to express their work in a clear, effective and organized way. "))
            ->setDescriptionES(trim("Es capaz de expresar su trabajo de forma clara, eficaz y organizada."))
            ->setExemplaryEN(trim("Able to present the work to an audience in a clear and coherent way. Additionally able to argue decisions to a technical and non-technical audience. "))
            ->setExemplaryES(trim("Es capaz de comunicar su trabajo a una audiencia, presentándolo de forma coherente y clara. Adicionalmente, es capaz argumentar sus decisiones a un público tanto técnico como no técnico."))
            ->setCompetentEN(trim("Able to present the work to an audience in a clear and coherent way. Additionally able to argue decisions."))
            ->setCompetentES(trim("Es capaz de presentar a una audiencia  su trabajo de forma coherente y clara. Adicionalmente, es capaz argumentar sus decisiones."))
            ->setBelowStandardEN(trim("Present the work in an imprecise way. Do not express concepts in a coherent and formal way. "))
            ->setBelowStandardES(trim("Presenta su trabajo de manera imprecisa, no expresa conceptos de forma coherente y formal. "));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel1)
            ->setOutcome($outcomeh)
            ->setDescriptionEN(trim("Identify characteristics of IT systems and solutions with multidisciplinary implications and recognize the importance of defining the economic, environmental and societal context of technology.  "))
            ->setDescriptionES(trim("Identifica características de sistemas y soluciones tecnológicas con implicaciones multidisciplinares y reconoce la importancia de definir el contexto económico, ambiental y social de la tecnología."))
            ->setExemplaryEN(trim("Able to identify the dimensions and disciplines required to determine the impact of technology in local and global contexts and is able to give examples of such impact. "))
            ->setExemplaryES(trim("Puede identificar las dimensiones y disciplinas requeridas para determinar el impacto de la tecnología en contextos locales y gloables y es capaz de dar ejemplos concretos de dichos impactos."))
            ->setCompetentEN(trim("Able to identify the dimensions and disciplines required to determine the impact of technology in local and global contexts."))
            ->setCompetentES(trim("Puede identificar las dimensiones y disciplinas requeridas para determinar el impacto de la tecnología en contextos locales y gloables."))
            ->setBelowStandardEN(trim("Not able to identify the dimensions and disciplines required to determine the impact of technology."))
            ->setBelowStandardES(trim("No es capaz de identificar dimensiones o disciplinas requeridas para determinar el impacto de la tecnología."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel2)
            ->setOutcome($outcomeh)
            ->setDescriptionEN(trim("Uderstand and IT system or solution and the elements composing it as they  relate to the context, establishing possible interactions with the local and global context which may help define concrete impacts.      "))
            ->setDescriptionES(trim("Entiende un sistema o solución tecnológica y los elementos que lo componen en relación con su entorno, determinando posibles interacciones en el contexto local y global que sirvan de insumo para la definición de impactos concretos."))
            ->setExemplaryEN(trim("Understand elements and methods which can be used to analyze the impact of systems in local and global contexts and the way to estimate and quantify them.  "))
            ->setExemplaryES(trim("Entiende los factores y métodos que puede emplear para analizar el impacto de los sistemas en contextos locales y globales y la manera de estimar o cuantificarlos precisamente."))
            ->setCompetentEN(trim("Understand elements and methods which can be used to analyze the impact of systems in local and global contexts  "))
            ->setCompetentES(trim("Entiende los factores y métodos que puede emplear para analizar el impacto de los sistemas en contextos locales y globales."))
            ->setBelowStandardEN(trim("Limited understanding of  elements and methods which can be used to analyze the impact of systems in local and global contexts  "))
            ->setBelowStandardES(trim("Tiene un entendimiento limitado o confuso de los factores o métodos que puede emplear para analizar el impacto de los sistemas en contextos locales y globales."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel3)
            ->setOutcome($outcomeh)
            ->setDescriptionEN(trim("Describe the impact of IT systems and solutions from the local and global perspective and from the economic, environmental and societal dimensions, offering arguments and concrete effects. "))
            ->setDescriptionES(trim("Describe el impacto de los sistemas y soluciones tecnológicas desde la perspectiva local y global y sobre las dimensiones económica, ambiental y social, proveyendo argumentos y efectos concretos."))
            ->setExemplaryEN(trim("Perform a complete description of the impact of the system, taking into account local and global aspects along with the implications in the economic, environmental and societal dimensions. Provide a clear and consistent argumentation.      "))
            ->setExemplaryES(trim("Realiza una descripción completa del impacto del sistema teniendo en cuenta los aspectos locales y globales junto con la implicación en las dimensiones ambiental y social. Además provee una argumentación clara y consistente."))
            ->setCompetentEN(trim("Perform a basic description of the impact taking into account enough perspectives and dimensions. Provide and argumentation of the impact. "))
            ->setCompetentES(trim("Realiza una descripción básica del impacto teniendo en cuenta suficientes perspectivas y dimensiones. Provee una argumentación de los impactos"))
            ->setBelowStandardEN(trim("Description of the impact does not consider enough perspectives and dimensions. Non consistent argumentation of the impact. "))
            ->setBelowStandardES(trim("La descripción del impacto no considera suficientes perspectivas y dimensiones. No es consistente la argumentación de los impactos."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel1)
            ->setOutcome($outcomei)
            ->setDescriptionEN(trim("Identify importance of proactive learning and basic ability of self-learning "))
            ->setDescriptionES(trim("Identificar la importancia de aprender proactivamente, capacidad básica de auto-aprendizaje"))
            ->setExemplaryEN(trim("Identify the importance of proactive learning in order to face immediate problems. Able to learn based on sources provided by a knowledgeable person in a subject matter, with a small support from that person during the learning process.  "))
            ->setExemplaryES(trim("El estudiante identifica la importancia de aprender proactivamente para enfrentar problemas inmediatos. Es capaz de aprender  a partir de fuentes entregadas por una persona con conocimiento profundo de un tema y con un apoyo reducido de dicha persona en el proceso de aprendizaje"))
            ->setCompetentEN(trim("Identify the importance of proactive learning in order to face problems. Able to learn based on sources provided by a knowledgeable person in a subject matter, with a moderate support from that person during the learning process.  "))
            ->setCompetentES(trim("El estudiante identifica la importancia de aprender proactivamente para enfrentar problemas inmediatos. Es capaz de aprender  a partir de fuentes entregadas por una persona con conocimiento profundo de un tema y con un apoyo moderado de dicha persona en el proceso de aprendizaje"))
            ->setBelowStandardEN(trim("Do not identify the importance of proactive learning. Not able to self- learning or  need excessive support from a competent  person during the learning process.  "))
            ->setBelowStandardES(trim("El estudiante no identifica la importancia de aprender proactivamente. No es capaz de aprender por su propia cuenta o necesita excesivo apoyo de una persona competente para lograr el aprendizaje"));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel2)
            ->setOutcome($outcomei)
            ->setDescriptionEN(trim("Motivated with respect to the importance of proactive learning and medium ability of self learning. "))
            ->setDescriptionES(trim("Estar motivado respecto de la importancia de aprender proactivamente, capacidad media de auto-aprendizaje"))
            ->setExemplaryEN(trim("Motivated with respect to the importance of proactive learning to face inmmediate problems. Able to learn, autonomously, knowledge which comes from common discipline sources  or sources provided by a knowledgeable person in a sibject matter. "))
            ->setExemplaryES(trim("El estudiante está motivado respecto de la importancia de aprender proactivamente para enfrentar problemas inmediatos. Es capaz de aprender, en forma autónoma, conocimiento proveniente de fuentes que son de conocimiento común en la disciplina, o que le han sido entregadas por una persona con conocimiento profundo del tema."))
            ->setCompetentEN(trim("Motivated with respect to the importance of proactive learning to face inmmediate problems. Able to learn, semi-autonomously, knowledge which comes from common discipline sources  or sources provided by a knowledgeable person in a sibject matter. "))
            ->setCompetentES(trim("El estudiante está motivado respecto de la importancia de aprender proactivamente para enfrentar problemas inmediatos. Es capaz de aprender, en forma semi-autónoma, conocimiento proveniente de fuentes que son de conocimiento común en la disciplina, o que le han sido entregadas por una persona con conocimiento profundo del tema."))
            ->setBelowStandardEN(trim("Not motivated with respect to the importance of proactive learning.  to face inmmediate problems. Not able to self-learning  or  need support from a competent  person during the learning process. "))
            ->setBelowStandardES(trim("El estudiante no está motivado respecto de la importancia de aprender proactivamente. No es capaz de aprender por su propia cuenta o necesita apoyo de una persona competente para lograr el aprendizaje. "));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel3)
            ->setOutcome($outcomei)
            ->setDescriptionEN(trim("Internalize the importance of life long proactive learning and high ability of self learning.  "))
            ->setDescriptionES(trim("Interiorizarse de la importancia de aprender proactivamente a lo largo de la vida, capacidad alta de auto-aprendizaje"))
            ->setExemplaryEN(trim("Internalize the importance of life long proactive learning .  Able to autonomously look for information sources about a specific topic, selecting the most appropriate sources, obtaining and learning the relevant information contained in those sources."))
            ->setExemplaryES(trim("El estudiante interioriza la importancia de aprender proactivamente en forma continua y permanente. Es capaz, en forma autónoma, de buscar fuentes de información sobre un tema, seleccionar las fuentes más adecuadas, obtener y aprender la información relevante contenida en cada una"))
            ->setCompetentEN(trim("Internalize the importance of life long proactive learning .  Able to semi-autonomously look for information sources about a specific topic, selecting the most appropriate sources, obtaining and learning the relevant information contained in those sources."))
            ->setCompetentES(trim("El estudiante interioriza la importancia de aprender proactivamente en forma continua y permanente. Es capaz, en forma semi-autónoma, de buscar fuentes de información sobre un tema por su propia cuenta, seleccionar las fuentes más adecuadas, obtener y aprender la información relevante contenida en cada una."))
            ->setBelowStandardEN(trim("Do not internalize the importance of life long proactive learning . Not able  to look for information sources about a specific topic, selecting the most appropriate sources, obtaining and learning the relevant information contained in those sources. Or requires exxcesive support to do that. "))
            ->setBelowStandardES(trim("El estudiante no interioriza la importancia de aprender proactivamente en forma continua y permanente. No es capaz, o requiere un apoyo excesivo, para buscar fuentes de información sobre un tema por su propia cuenta, seleccionar las fuentes más adecuadas, obtener ni aprender la información relevante contenida en cada una. "));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel1)
            ->setOutcome($outcomej)
            ->setDescriptionEN(trim("Recognize the global and local context associated to economic, political, environmental and societal aspects, which are present in the development of the profession. "))
            ->setDescriptionES(trim("Reconocer el entorno global y local asociado a aspectos sociales, económicos, políticos y ambientales, en los que se desenvuelve en su ejercicio profesional."))
            ->setExemplaryEN(trim("Recognize the global and local context and able to relate the societal, economic and political aspects to the impact they may generate as opportunities or threats  in the development of the profession. "))
            ->setExemplaryES(trim("Reconoce el entorno global y local  y está en capacidad de vincular los aspectos sociales, económicos y políticos con el impacto que pueden generar, en términos de oportunidad o amenaza  en su ejercicio profesional."))
            ->setCompetentEN(trim("Recognize some aspects of the global and local context and moderately able to relate the societal, economic and political aspects to the impact they may generate as opportunities or threats  in the development of the profession."))
            ->setCompetentES(trim("Reconoce algunos aspectos del entorno global y local  y tiene una capacidad moderada de vincular los aspectos sociales, económicos y políticos con el impacto que pueden generar, en términos de oportunidad o amenaza  en su ejercicio profesional."))
            ->setBelowStandardEN(trim("Recognize few aspects of the global and local context and not able to relate the societal, economic and political aspects to the impact they may generate as opportunities or threats  in the development of the profession."))
            ->setBelowStandardES(trim("Reconoce muy pocos aspectos del entorno global y local  y no está en capacidad de vincular los aspectos sociales, económicos y políticos con el impacto que pueden generar, en términos de oportunidad o amenaza  en su ejercicio profesional."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel2)
            ->setOutcome($outcomej)
            ->setDescriptionEN(trim("Understand the local and global context associated to economic, political, environmental and societal aspects, which are present in the development of the profession. "))
            ->setDescriptionES(trim("Entender el entorno global y local asociado a aspectos económicos, sociales, políticos y ambientales en los que desenvuelve en su ejercicio profesional."))
            ->setExemplaryEN(trim("Understand the global and local context and able to relate the societal, economic and political aspects to the impact they may generate as opportunities or threats  in the development of the profession. "))
            ->setExemplaryES(trim("Entiende el entorno global y local  y está en capacidad de vincular los aspectos sociales, económicos y políticos con el impacto que pueden generar, en términos de oportunidad o amenaza  en su ejercicio profesional"))
            ->setCompetentEN(trim("Understand some aspects of the global and local context and moderately able to relate the societal, economic and political aspects to the impact they may generate as opportunities or threats  in the development of the profession."))
            ->setCompetentES(trim("Entiende algunos aspectos del entorno global y local  y  tiene una capacidad moderada de vincular los aspectos sociales, económicos y políticos con el impacto que pueden generar, en términos de oportunidad o amenaza   en su ejercicio profesional"))
            ->setBelowStandardEN(trim("Understand few aspects of the global and local context and not able to relate the societal, economic and political aspects to the impact they may generate as opportunities or threats  in the development of the profession."))
            ->setBelowStandardES(trim("Entiende muy pocos aspectos del entorno global y local  y no está en capacidad de vincular los aspectos sociales, económicos y políticos con el impacto que pueden generar, en términos de oportunidad o amenaza en su ejercicio profesional"));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel3)
            ->setOutcome($outcomej)
            ->setDescriptionEN(trim("Apply the knowledge of the local and global context associated to economic, political, legal, environmental, technological and societal aspects, which are present in the development of the profession. "))
            ->setDescriptionES(trim("Aplicar el conocimiento del entorno global y local asociado a  aspectos económicos, sociales, político-legales, ambientales, y tecnológicos en los que se desenvuelve en su ejercicio profesional"))
            ->setExemplaryEN(trim("Apply the knoweledge of the global and local context and able to relate the societal, economic,  political, legal and technological aspects to the impact they may generate as opportunities or threats  in the development of the profession. "))
            ->setExemplaryES(trim("Aplica el conocimiento del entorno global y local  y está en capacidad de vincular los aspectos sociales, económicos,  ambientales, político-legales, tecnológicos con el impacto que pueden generar, en términos de oportunidad o amenaza  en su ejercicio profesional"))
            ->setCompetentEN(trim("Apply some aspects of the knoweledge of the global and local context and moderately able to relate the societal, economic,  political, legal and technological aspects to the impact they may generate as opportunities or threats  in the development of the profession. "))
            ->setCompetentES(trim("Aplica algunos aspectos del conocimiento relacionado con entorno global y local  y  tiene una capacidad moderada de vincular los aspectos sociales, económicos y políticos con el impacto que pueden generar, en términos de oportunidad o amenaza   en su ejercicio profesional"))
            ->setBelowStandardEN(trim("Apply few aspects of the knoweledge of the global and local context and not able to relate the societal, economic,  political, legal and technological aspects to the impact they may generate as opportunities or threats  in the development of the profession. "))
            ->setBelowStandardES(trim("Aplica muy pocos aspectos del entorno global y local  y no está en capacidad de vincular los aspectos sociales, económicos y políticos con el impacto que pueden generar, en términos de oportunidad o amenaza en su ejercicio profesional"));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel1)
            ->setOutcome($outcomek)
            ->setDescriptionEN(trim("Identify techniques, skills and tools required to implement IT systems "))
            ->setDescriptionES(trim("El estudiante identifica las técnicas, habilidades y herramientas requeridas para implementar sistemas informáticos."))
            ->setExemplaryEN(trim("Correctly identify optimal techniques, skills and tools required to solve a problem. "))
            ->setExemplaryES(trim("El estudiante identifica correctamente las técnicas, habilidades y herramientas óptimas para resolver el problema. "))
            ->setCompetentEN(trim("Correctly identify appropriate techniques, skills and tools required to solve a problem. "))
            ->setCompetentES(trim("El estudiante identifica correctamente las técnicas, habilidades y herramientas adecuadas para resolver el problema."))
            ->setBelowStandardEN(trim("Not able to identify techniques, skills and tools required to implement IT solutions or systems. "))
            ->setBelowStandardES(trim("El estudiante no logra identificar las técnicas, habilidades y herramientas requeridas para implementar un sistema o solución informática"));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel2)
            ->setOutcome($outcomek)
            ->setDescriptionEN(trim("Show knowledge in the use of  techniques, skills and software and hardware tools required to  build IT systems and services in a controlled environment. "))
            ->setDescriptionES(trim("El estudiante demuestra dominio en el uso de técnicas, habilidades y herramientas de hardware y software necesarias para construir servicios o sistemas informáticos en entornos controlados."))
            ->setExemplaryEN(trim("Properly use optimal techniques, skills and software and hardware tools required to  build IT systems and services in a controlled environment. "))
            ->setExemplaryES(trim("Utiliza adecuadamente técnicas, habilidades y herramientas de hardware y software óptimas para construir servicios o sistemas informáticos en entornos controlados"))
            ->setCompetentEN(trim("Properly use  techniques, skills and software and hardware tools required to  build IT systems and services in a controlled environment. "))
            ->setCompetentES(trim("Utiliza adecuadamente técnicas, habilidades y herramientas de hardware y software suficientes para construir servicios o sistemas informáticos en entornos controlados."))
            ->setBelowStandardEN(trim("Do not use  techniques, skills and software and hardware tools required to  build IT systems and services in a controlled environment."))
            ->setBelowStandardES(trim("No utiliza técnicas, habilidades y herramientas suficientes para construir sistemas informáticos en entornos controlados."));
        $manager->persist($performanceIndicator);

        $performanceIndicator = new PerformanceIndicator();
        $performanceIndicator
            ->setBloomLevel($bloomLevel3)
            ->setOutcome($outcomek)
            ->setDescriptionEN(trim("Select with defined criteria and show knowledge in the use of  techniques, skills and software and hardware tools required to  build IT systems and services in a real environment. "))
            ->setDescriptionES(trim("El estudiante selecciona con criterios definidos y demuestra dominio en el uso de herramientas de hardware y software necesarias para construir servicios o sistemas informáticos en entornos reales."))
            ->setExemplaryEN(trim("Justify selection with enough criteria and properly use optimal techniques, skills and software and hardware tools required to  build IT systems and services in a real environment. "))
            ->setExemplaryES(trim("Lista criterios suficientes justificando la selección y utiliza adecuadamente herramientas de hardware y software óptimas para construir servicios o sistemas informáticos en entornos reales."))
            ->setCompetentEN(trim("Justify selection and properly use  techniques, skills and software and hardware tools required to  build IT systems and services in a real environment. "))
            ->setCompetentES(trim("Lista criterios y utiliza adecuadamente herramientas de hardware y software suficientes para construir servicios o sistemas informáticos en entornos reales."))
            ->setBelowStandardEN(trim("Do not justify the selection or do not use  techniques, skills and software and hardware tools required to  build IT systems and services in a real environment. "))
            ->setBelowStandardES(trim("No justifica la selección o no utiliza herramientas suficientes para construir sistemas informáticos en entornos reales."));
        $manager->persist($performanceIndicator);

        $manager->flush();

    }

    public function getOrder()
    {
        return 1;
    }
}

?> 