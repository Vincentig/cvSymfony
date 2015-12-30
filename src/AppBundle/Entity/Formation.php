<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="cv_formation")
 * @ORM\Entity()
 */
class Formation {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDepart", type="datetime", nullable=true)
     */
    private $dateDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="datetime")
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="ecole", type="string", length=255)
     */
    private $ecole;

    /**
     * @var string
     *
     * @ORM\Column(name="diplome", type="string", length=255)
     */
    private $diplome;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text", nullable=true)
     */
    private $contenu;

    /**
     *
     * @var AppBundle\Entity\Personne
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Personne", inversedBy="formations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $personne;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Skill",  cascade={"persist"})
     */
    private $skills;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set dateDepart
     *
     * @param \DateTime $dateDepart
     *
     * @return Formation
     */
    public function setDateDepart($dateDepart) {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get dateDepart
     *
     * @return \DateTime
     */
    public function getDateDepart() {
        return $this->dateDepart;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Formation
     */
    public function setDateFin($dateFin) {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin() {
        return $this->dateFin;
    }

    /**
     * Set ecole
     *
     * @param string $ecole
     *
     * @return Formation
     */
    public function setEcole($ecole) {
        $this->ecole = $ecole;

        return $this;
    }

    /**
     * Get ecole
     *
     * @return string
     */
    public function getEcole() {
        return $this->ecole;
    }

    /**
     * Set diplome
     *
     * @param string $diplome
     *
     * @return Formation
     */
    public function setDiplome($diplome) {
        $this->diplome = $diplome;

        return $this;
    }

    /**
     * Get diplome
     *
     * @return string
     */
    public function getDiplome() {
        return $this->diplome;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Formation
     */
    public function setContenu($contenu) {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu() {
        return $this->contenu;
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->skills = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set personne
     *
     * @param \AppBundle\Entity\Personne $personne
     *
     * @return Formation
     */
    public function setPersonne(\AppBundle\Entity\Personne $personne) {
        $this->personne = $personne;

        return $this;
    }

    /**
     * Get personne
     *
     * @return \AppBundle\Entity\Personne
     */
    public function getPersonne() {
        return $this->personne;
    }

    /**
     * Add skill
     *
     * @param \AppBundle\Entity\Skill $skill
     *
     * @return Formation
     */
    public function addSkill(\AppBundle\Entity\Skill $skill) {
        $this->skills[] = $skill;

        return $this;
    }

    /**
     * Remove skill
     *
     * @param \AppBundle\Entity\Skill $skill
     */
    public function removeSkill(\AppBundle\Entity\Skill $skill) {
        $this->skills->removeElement($skill);
    }

    /**
     * Get skills
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSkills() {
        return $this->skills;
    }

}
