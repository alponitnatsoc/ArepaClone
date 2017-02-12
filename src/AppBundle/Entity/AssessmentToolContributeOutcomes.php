<?php
/**
 * Created by PhpStorm.
 * User: erikaxu
 * Date: 24/09/16
 * Time: 08:02 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\UniqueConstraint;

/**
 * Class AssessmentToolContributeOutcomes
 * @package AppBundle\Entity
 *
 * @ORM\Table(name="assessment_tool_contribute_outcomes")
 * @ORM\Entity
 */
class AssessmentToolContributeOutcomes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_assessment_tool_contribute_outcome",type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idAssessmentToolContributeOutcomes;

    /**
     * @var string
     * @ORM\Column(name="below_standard",type="text",nullable=true,length=20000)
     */
    private $belowStandard;

    /**
     * @var string
     * @ORM\Column(name="competent",type="text",nullable=true,length=20000)
     */
    private $competent;

    /**
     * @var string
     * @ORM\Column(name="exemplary",type="text",nullable=true,length=20000)
     */
    private $exemplary;

    /**
     * @var string
     * @ORM\Column(name="english_below_standard",type="text",nullable=true,length=20000)
     */
    private $englishBelowStandard;

    /**
     * @var string
     * @ORM\Column(name="english_competent",type="text",nullable=true,length=20000)
     */
    private $englishCompetent;

    /**
     * @var string
     * @ORM\Column(name="english_exemplary",type="text",nullable=true,length=20000)
     */
    private $englishExemplary;

    /**
     * @var AssessmentTool
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AssessmentTool", inversedBy="assessmentToolContributeOutcomes")
     * @ORM\JoinColumn(name="tool_assessment_id", referencedColumnName="id_assessment_tool")
     */
    private $assessmentTool;

    /**
     * @var Outcome
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Outcome", inversedBy="assessmentToolContributeOutcomes")
     * @ORM\JoinColumn(name="outcome_id", referencedColumnName="id_outcome")
     */
    private $outcomeOutcome;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Period")
     * @ORM\JoinColumn(name="period_id",referencedColumnName="id_period",nullable=true)
     */
    private $period;

    /**
     * Get idAssessmentToolContributeOutcomes
     *
     * @return integer
     */
    public function getIdAssessmentToolContributeOutcomes()
    {
        return $this->idAssessmentToolContributeOutcomes;
    }

    /**
     * Set belowStandard
     *
     * @param string $belowStandard
     *
     * @return AssessmentToolContributeOutcomes
     */
    public function setBelowStandard($belowStandard)
    {
        $this->belowStandard = $belowStandard;

        return $this;
    }

    /**
     * Get belowStandard
     *
     * @return string
     */
    public function getBelowStandard()
    {
        return $this->belowStandard;
    }

    /**
     * Set competent
     *
     * @param string $competent
     *
     * @return AssessmentToolContributeOutcomes
     */
    public function setCompetent($competent)
    {
        $this->competent = $competent;

        return $this;
    }

    /**
     * Get competent
     *
     * @return string
     */
    public function getCompetent()
    {
        return $this->competent;
    }

    /**
     * Set exemplary
     *
     * @param string $exemplary
     *
     * @return AssessmentToolContributeOutcomes
     */
    public function setExemplary($exemplary)
    {
        $this->exemplary = $exemplary;

        return $this;
    }

    /**
     * Get exemplary
     *
     * @return string
     */
    public function getExemplary()
    {
        return $this->exemplary;
    }

    /**
     * Set englishBelowStandard
     *
     * @param string $englishBelowStandard
     *
     * @return AssessmentToolContributeOutcomes
     */
    public function setEnglishBelowStandard($englishBelowStandard)
    {
        $this->englishBelowStandard = $englishBelowStandard;

        return $this;
    }

    /**
     * Get englishBelowStandard
     *
     * @return string
     */
    public function getEnglishBelowStandard()
    {
        return $this->englishBelowStandard;
    }

    /**
     * Set englishCompetent
     *
     * @param string $englishCompetent
     *
     * @return AssessmentToolContributeOutcomes
     */
    public function setEnglishCompetent($englishCompetent)
    {
        $this->englishCompetent = $englishCompetent;

        return $this;
    }

    /**
     * Get englishCompetent
     *
     * @return string
     */
    public function getEnglishCompetent()
    {
        return $this->englishCompetent;
    }

    /**
     * Set englishExemplary
     *
     * @param string $englishExemplary
     *
     * @return AssessmentToolContributeOutcomes
     */
    public function setEnglishExemplary($englishExemplary)
    {
        $this->englishExemplary = $englishExemplary;

        return $this;
    }

    /**
     * Get englishExemplary
     *
     * @return string
     */
    public function getEnglishExemplary()
    {
        return $this->englishExemplary;
    }

    /**
     * Set assessmentTool
     *
     * @param \AppBundle\Entity\AssessmentTool $assessmentTool
     *
     * @return AssessmentToolContributeOutcomes
     */
    public function setAssessmentTool(\AppBundle\Entity\AssessmentTool $assessmentTool = null)
    {
        $this->assessmentTool = $assessmentTool;

        return $this;
    }

    /**
     * Get assessmentTool
     *
     * @return \AppBundle\Entity\AssessmentTool
     */
    public function getAssessmentTool()
    {
        return $this->assessmentTool;
    }

    /**
     * Set outcomeOutcome
     *
     * @param \AppBundle\Entity\Outcome $outcomeOutcome
     *
     * @return AssessmentToolContributeOutcomes
     */
    public function setOutcomeOutcome(\AppBundle\Entity\Outcome $outcomeOutcome = null)
    {
        $this->outcomeOutcome = $outcomeOutcome;

        return $this;
    }

    /**
     * Get outcomeOutcome
     *
     * @return \AppBundle\Entity\Outcome
     */
    public function getOutcomeOutcome()
    {
        return $this->outcomeOutcome;
    }

    /**
     * Set period
     *
     * @param \AppBundle\Entity\Period $period
     *
     * @return AssessmentToolContributeOutcomes
     */
    public function setPeriod(\AppBundle\Entity\Period $period = null)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period
     *
     * @return \AppBundle\Entity\Period
     */
    public function getPeriod()
    {
        return $this->period;
    }
}
