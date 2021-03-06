<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Skill
 *
 * @ORM\Table(name="cv_skill")
 * @ORM\Entity(repositoryClass="Gedmo\Sortable\Entity\Repository\SortableRepository")
 */
class Skill {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="niveauPersonne", type="integer")
     */
    private $niveauPersonne;

    /**
     * @var int
     * @ORM\Column(name="ordre", type="integer", nullable=false)
     * @Gedmo\SortablePosition
     */
    private $ordre;

    /**
     *
     * @var AppBundle\Entity\Personne
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Personne", inversedBy="skills")
     */
    private $personne;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Skill
     */
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Set niveauPersonne
     *
     * @param integer $niveauPersonne
     *
     * @return Skill
     */
    public function setNiveauPersonne($niveauPersonne) {
        $this->niveauPersonne = $niveauPersonne;

        return $this;
    }

    /**
     * Get niveauPersonne
     *
     * @return integer
     */
    public function getNiveauPersonne() {
        return $this->niveauPersonne;
    }

    /**
     * Set personne
     *
     * @param \AppBundle\Entity\Personne $personne
     *
     * @return Skill
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
     * Set ordre
     *
     * @param integer $ordre
     *
     * @return Skill
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return integer
     */
    public function getOrdre()
    {
        return $this->ordre;
    }
}
