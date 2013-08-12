<?php

namespace HSYS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Establecimiento
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Establecimiento {

    /**
     * @var integer
     *
     * @ORM\Column(name="idEst", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @var integer
     * 
     * @ORM\Column(name="EstCod", type="integer", nullable=true) 
     */
    private $EstCod;

    /**
     *
     * @var string
     * 
     * @ORM\Column(name="EstDesc", type="string", length=60, nullable=true) 
     */
    private $EstDesc;
    
    /**
     *
     * @var smallint
     * 
     * @ORM\Column(name="EstNivel", type="smallint", nullable=true) 
     */
    private $EstNivel;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set EstCod
     *
     * @param integer $EstCod
     * @return Establecimiento
     */
    public function setEstCod($EstCod) {
        $this->EstCod = $EstCod;

        return $this;
    }

    /**
     * Get EstCod
     *
     * @return integer 
     */
    public function getEstCod() {
        return $this->EstCod;
    }

    /**
     * Set EstDesc
     *
     * @param string $EstDesc
     * @return Establecimiento
     */
    public function setEstDesc($EstDesc) {
        $this->EstDesc = $EstDesc;

        return $this;
    }

    /**
     * Get EstDesc
     *
     * @return string 
     */
    public function getEstDesc() {
        return $this->EstDesc;
    }
    
    /**
     * Set EstNivel{
     *
     * @param smallint $EstNivel
     * @return Establecimiento
     */
    public function setEstNivel($EstNivel) {
        $this->EstNivel = $EstNivel;

        return $this;
    }

    /**
     * Get EstNivel
     *
     * @return integer 
     */
    public function getEstNivel() {
        return $this->EstNivel;
    }

}

?>
