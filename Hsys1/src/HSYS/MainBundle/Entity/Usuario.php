<?php

namespace HSYS\MainBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 *  @ORM\Entity
 *  @ORM\Table(name ="admin_user")
 */
class Usuario implements UserInterface, \Serializable {

    /**
     *
     * @var integer $id
     *
     * @ORM\Column(name="id", type ="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy = "AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=255, unique=true)
     */
    protected $username;

    /**
     *
     * @ORM\Column(name="password",type="string",length=255)
     */
    protected $password;

    /**
     *
     * @ORM\Column(name="salt",type="string", length=255)
     */
    protected $salt;

    /**
     * @ORM\ManytoMany(targetEntity="Role")
     * @ORM\JoinTable(name="user_role",
     *      joinColumns={@ORM\JoinColumn(name="user_id",referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="role_id",referencedColumnName="id")}
     * )
     */
    protected $user_roles;

    public function __construct() {
        $this->user_roles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     * 
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set username
     * 
     * @param string $username
     */
    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     * Get username
     * 
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set password
     * 
     * @param string $password
     */
    public function setPassword($password) {
        $this->password = $password;
    }

    /**
     * Get password
     * 
     * @return password
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set salt
     * 
     * @param string $salt
     */
    public function setSalt($salt) {
        $this->salt = $salt;
    }

    /**
     * Get salt
     * 
     * @return salt
     */
    public function getSalt() {
        return $this->salt;
    }

    /**
     * Add user_roles
     * 
     * @param HSYS\MainBundle\Entity\Role $userRoles 
     */
    public function addRole(HSYS\MainBundle\Entity\Role $userRoles) {
        $this->user_role[] = $userRoles;
    }

    public function setUserRoles($roles) {
        $this->user_roles = $roles;
    }

    /**
     * Get user_roles
     * 
     * @return Doctrine\Common\Collections\Collection
     */
    public function getUserRoles() {
        return $this->user_roles;
    }

    /**
     * Get roles
     * 
     * @return Doctrine\Common\Collections\Collection
     */
    public function getRoles() {
        return $this->user_roles->toArray();
    }

    /**
     * compares this user to another to determine if they are the same.
     * 
     * @param UserInterface $user The user
     * @return boolean True if equal, false otherwise.
     */
    public function equals(userInterface $user) {
        return md5($this->getUsername()) == md5($user->getUsername());
    }

    /**
     * Erases the user credentials.
     */
    public function eraseCredentials() {
        
    }

    /*
     *
     * To change this template, choose Tools | Templates
     * and open the template in the editor.
     */

    /**
     * Add user_role
     *
     * @param \HSYS\MainBundle\Entity\Role $userRole
     * @return Usuario
     */
    public function addUserRole(\HSYS\MainBundle\Entity\Role $userRole) {
        $this->user_role[] = $userRole;

        return $this;
    }

    /**
     * Remove user_role
     *
     * @param \HSYS\MainBundle\Entity\Role $userRole
     */
    public function removeUserRole(\HSYS\MainBundle\Entity\Role $userRole) {
        $this->user_role->removeElement($userRole);
    }

    /**
     * Get user_role
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserRole() {
        return $this->user_role;
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize() {
        return \serialize(array
            ($this->id,
            $this->username,
            $this->salt,
            $this->password));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized) {
        list (
                $this->id,
                $this->username,
                $this->salt,
                $this->password,
                ) = \unserialize($serialized);
    }

    public function __toString() {
        return $this->getUsername();
    }

}