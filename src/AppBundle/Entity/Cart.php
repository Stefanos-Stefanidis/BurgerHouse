<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cart
 *
 * @ORM\Table(name="cart")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CartRepository")
 */
class Cart
{
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
     * @ORM\Column(name="prname", type="string", length=255)
     */
    private $prname;

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=255)
     */
    private $user;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set prname
     *
     * @param string $prname
     *
     * @return Cart
     */
    public function setPrname($prname)
    {
        $this->prname = $prname;

        return $this;
    }

    /**
     * Get prname
     *
     * @return string
     */
    public function getPrname()
    {
        return $this->prname;
    }




    /**
     * Set user
     *
     * @param string $user
     *
     * @return Cart
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get prname
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Cart
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
}

