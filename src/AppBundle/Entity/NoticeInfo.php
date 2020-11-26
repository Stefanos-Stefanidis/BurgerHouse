<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany as OneToMany;
use Doctrine\ORM\Mapping\ManyToOne as ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn as JoinColumn;
use \DateTime;

/**
 * NoticeInfo
 *
 * @ORM\Table(name="notice_info")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NoticeInfoRepository")
 */
class NoticeInfo
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
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="notice")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $userId;
    
    /**
     * @var string
     *
     * @ORM\Column(name="notice_id", type="string", length=255, unique=true)
     */
    private $noticeId;

    /**
     * @var int
     *
     * @ORM\Column(name="floor", type="integer")
     */
    private $floor;

    /**
     * @var int
     *
     * @ORM\Column(name="order_sum", type="integer")
     */
    private $orderSum;

    /**
     * @var string
     *
     * @ORM\Column(name="area", type="string", length=255)
     */
    private $area;

    /**
     * @var int
     *
     * @ORM\Column(name="post_code", type="integer")
     */
    private $postCode;

    /**
     * @var string
     *
     * @ORM\Column(name="ring_name", type="string", length=255)
     */
    private $ringName;


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
     * Set orderSum
     *
     * @param string $orderSum
     *
     * @return NoticeInfo
     */
    public function setorderSum($orderSum)
    {
        $this->orderSum = $orderSum;

        return $this;
    }

    /**
     * Get orderSum
     *
     * @return string
     */
    public function getorderSum()
    {
        return $this->orderSum;
    }


    /**
     * Set address
     *
     * @param string $address
     *
     * @return NoticeInfo
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set floor
     *
     * @param integer $floor
     *
     * @return NoticeInfo
     */
    public function setFloor($floor)
    {
        $this->floor = $floor;

        return $this;
    }

    /**
     * Get floor
     *
     * @return int
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * Set area
     *
     * @param string $area
     *
     * @return NoticeInfo
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return string
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set postCode
     *
     * @param integer $postCode
     *
     * @return NoticeInfo
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Get postCode
     *
     * @return int
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Set ringName
     *
     * @param string $ringName
     *
     * @return NoticeInfo
     */
    public function setRingName($ringName)
    {
        $this->ringName = $ringName;

        return $this;
    }

    /**
     * Get ringName
     *
     * @return string
     */
    public function getRingName()
    {
        return $this->ringName;
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

