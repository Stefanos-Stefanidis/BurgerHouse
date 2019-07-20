<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use \DateTime;


/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;
    

    /**
    * @ORM\Column(type="string", length=25)
    */

    private $phone;

    /**
    * @ORM\Column(type="string", length=25)
    */

    private $lastname;
    
    /**
    * @ORM\Column(type="string", length=25)
    */

    private $address;
    
    /**
     * @ORM\OneToMany(targetEntity="Notice", mappedBy="user")
     */
    private $notice;

    public function __construct()
    {
        parent::__construct();
        $this->date = new DateTime(); 
        $this->notice = new ArrayCollection();
    }


    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Comments
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

        /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }
    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }


    /**
     * Add notice
     *
     * @param \AppBundle\Entity\Notice $notice
     *
     * @return User
     */
    public function addNotice(\AppBundle\Entity\Notice $notice)
    {
        $this->notice[] = $notice;

        return $this;
    }

    /**
     * Remove notice
     *
     * @param \AppBundle\Entity\Notice $notice
     */
    public function removeNotice(\AppBundle\Entity\Notice $notice)
    {
        $this->notice->removeElement($notice);
    }

    /**
     * Get notice
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotice()
    {
        return $this->notice;
    }

    
    /**
     * Add addToCart
     *
     * @param \AppBundle\Entity\A $cart
     *
     * @return User
     */
    public function addCart(\AppBundle\Entity\AddToCart $cart)
    {
        $this->cart[] = $cart;

        return $this;
    }

    /**
     * Remove cart
     *
     * @param \AppBundle\Entity\AddToCart $cart
     */
    public function removeCart(\AppBundle\Entity\AddToCart $cart)
    {
        $this->cart->removeElement($cart);
    }

    /**
     * Get cart
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCart()
    {
        return $this->cart;
    }
}
