<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;

/**
 * Comments
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentsRepository")
*/
class Comments
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
     * @ORM\Column(name="name", type="string", length=255)
    */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255,nullable=true)
    */
    private $comment;

    
    
    /**
     * @var float
     *
     * @ORM\Column(name="rate", type="float", length=55,nullable=true)
    */

    private $rate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
    */
    private $date;

    public function __construct()
    {
        $this->date = new DateTime(); 
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
     * Set name
     *
     * @param string $name
     *
     * @return Comments
    */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
    */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Comments
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
     * Set rate
     *
     * @param int $rate
     *
     * @return Comments
    */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return \rateTime
    */
    public function getRate()
    {
        return $this->rate;
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
}

