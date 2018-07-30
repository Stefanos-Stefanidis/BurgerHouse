<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\OneToMany as OneToMany;
use Doctrine\ORM\Mapping\ManyToOne as ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn as JoinColumn;


/**
 * Order
 *
 * @ORM\Table(name="order")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrderRepository")
 */
class Order
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
     * @var int
     *
     * @ORM\Column(name="order_id", type="integer")
     */
    private $orderId;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="order")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $userId;

    /**
     * @ManyToOne(targetEntity="Product", inversedBy="orders")
     * @JoinColumn(name="product_id", referencedColumnName="id")
     */
    private $productId;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;


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
     * Set orderId
     *
     * @param integer $orderId
     *
     * @return Order
     */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * Get orderId
     *
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }




    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Order
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set userId
     *
     * @param \AppBundle\Entity\User $userId
     *
     * @return Order
     */
    public function setUserId(\AppBundle\Entity\User $userId = null)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return \AppBundle\Entity\User
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set productId
     *
     * @param \AppBundle\Entity\Product $productId
     *
     * @return Order
     */
    public function setProductId(\AppBundle\Entity\Product $productId = null)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return \AppBundle\Entity\Product
     */
    public function getProductId()
    {
        return $this->productId;
    }

}

