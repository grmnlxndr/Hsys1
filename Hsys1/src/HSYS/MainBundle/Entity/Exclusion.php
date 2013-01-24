<?php

namespace HSYS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exclusion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HSYS\MainBundle\Entity\ExclusionRepository")
 */
class Exclusion {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechini", type="date", nullable=true)
     */
    private $fechini;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="string", length=255, nullable=true)
     */
    private $comentario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechfin", type="date", nullable=true)
     */
    private $fechfin;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set fechini
     *
     * @param \DateTime $fechini
     * @return Exclusion
     */
    public function setFechini($fechini) {
        $this->fechini = $fechini;

        return $this;
    }

    /**
     * Get fechini
     *
     * @return \DateTime 
     */
    public function getFechini() {
        return $this->fechini;
    }

    /**
     * Set comentario
     *
     * @param string $comentario
     * @return Exclusion
     */
    public function setComentario($comentario) {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario() {
        return $this->comentario;
    }

    /**
     * Set fechfin
     *
     * @param \DateTime $fechfin
     * @return Exclusion
     */
    public function setFechfin($fechfin) {
        $this->fechfin = $fechfin;

        return $this;
    }

    /**
     * Get fechfin
     *
     * @return \DateTime 
     */
    public function getFechfin() {
        return $this->fechfin;
    }

    /**
     * @ORM\ManyToOne(targetEntity="TipoExclusion", inversedBy="Exclusion")
     * @ORM\JoinColumn(name="TipoExclusion", referencedColumnName="id")
     * @return integer
     */
    private $TipoExclusion;

    public function setTipoExclusion(\HYSY\MainBundle\Entity\TipoExclusion $TipoExclusion) {
        $this->TipoExclusion = $TipoExclusion;
    }

    public function getTipoExclusion() {
        return $this->TipoExclusion;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Donante", inversedBy="Exclusion")
     * @ORM\JoinColumn(name="Donante", referencedColumnName="id")
     * @return integer
     */
    private $Donante;

    public function setDonante(\HSYS\MainBundle\Entity\Donante $Donante) {
        $this->Donante = $Donante;
    }

    public function getDonante() {
        return $this->Donante;
    }
}
