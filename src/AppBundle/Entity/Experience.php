<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Experience
 *
 * @ORM\Table(name="cv_experience")
 * @ORM\Entity()
 */
class Experience {

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
     * @ORM\Column(name="entreprise", type="string", length=255)
     */
    private $entreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="poste", type="string", length=255)
     */
    private $poste;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     *
     * @var AppBundle\Entity\Personne
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Personne", inversedBy="experiences")
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
     * @return Experience
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
     * @return Experience
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
     * Set entreprise
     *
     * @param string $entreprise
     *
     * @return Experience
     */
    public function setEntreprise($entreprise) {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * Get entreprise
     *
     * @return string
     */
    public function getEntreprise() {
        return $this->entreprise;
    }

    /**
     * Set poste
     *
     * @param string $poste
     *
     * @return Experience
     */
    public function setPoste($poste) {
        $this->poste = $poste;

        return $this;
    }

    /**
     * Get poste
     *
     * @return string
     */
    public function getPoste() {
        return $this->poste;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Experience
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
     * @return Experience
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
     * @return Experience
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
