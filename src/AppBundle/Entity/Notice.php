<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\OneToMany as OneToMany;
use Doctrine\ORM\Mapping\ManyToOne as ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn as JoinColumn;
use \DateTime;


/**
 * Notice
 *
 * @ORM\Table(name="notice")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NoticeRepository")
 */
class Notice
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
     * @ORM\Column(name="notice_id", type="string", length=255)
     */
    private $noticeId;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="notice")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $userId;

    /**
     * @ManyToOne(targetEntity="Product", inversedBy="notices")
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
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255,nullable=true)
    */
    private $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="extra", type="string", length=255,nullable=true)
    */
    private $extra;


    /**
     * @var string
     *
     * @ORM\Column(name="order_status", type="string", length=255)
     */
    private $orderStatus;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_order", type="datetime", nullable=true)
    */
    private $dateOrder;

    public function __construct()
    {
        $this->dateOrder = new DateTime(); 
    }

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
     * Set noticeId
     *
     * @param string $noticeId
     *
     * @return Notice
     */
    public function setNoticeId($noticeId)
    {
        $this->noticeId = $noticeId;

        return $this;
    }

    /**
     * Get noticeId
     *
     * @return string
     */
    public function getNoticeId()
    {
        return $this->noticeId;
    }




    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return Notice
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
     * Set comment
     *
     * @param string $comment
     *
     * @return Notice
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set extra
     *
     * @param string $extra
     *
     * @return Notice
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;

        return $this;
    }

    /**
     * Get extra
     *
     * @return string
     */
    public function getExtra()
    {
        return $this->extra;
    }


    /**
     * Set userId
     *
     * @param \AppBundle\Entity\User $userId
     *
     * @return Notice
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
     * @return Notice
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

    /**
     * Set orderStatus
     *
     * @param string $orderStatus
     *
     * @return Notice
     */
    public function setOrderStatus($orderStatus)
    {
        $this->orderStatus = $orderStatus;

        return $this;
    }

    /**
     * Get orderStatus
     *
     * @return string
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }


    /**
     * Set dateOrder
     *
     * @param \DateTime $dateOrder
     *
     * @return Notice
    */
    public function setDateOrder($dateOrder)
    {
        $this->dateOrder = $dateOrder;

        return $this;
    }

    /**
     * Get dateOrder
     *
     * @return \DateTime
    */
    public function getDateOrder()
    {
        return $this->dateOrder;
    }


}

