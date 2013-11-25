<?php

namespace Kiddify\Bundle\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contest
 *
 * @ORM\Table(name="contest")
 * @ORM\Entity
 */
class Contest
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="logo_url", type="string", length=255, nullable=true)
     */
    private $logoUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="banner_url", type="string", length=255, nullable=true)
     */
    private $bannerUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description_short", type="text", nullable=true)
     */
    private $descriptionShort;

    /**
     * @var string
     *
     * @ORM\Column(name="description_long", type="text", nullable=true)
     */
    private $descriptionLong;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_start", type="datetime", nullable=true)
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_end", type="datetime", nullable=true)
     */
    private $dateEnd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", inversedBy="contests")
     * @ORM\JoinTable(name="contest_user",
     *   joinColumns={
     *     @ORM\JoinColumn(name="contests_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="users_id", referencedColumnName="id")
     *   }
     * )
     */
    private $users;

    /**
     * @var \Badge
     *
     * @ORM\ManyToOne(targetEntity="Badge")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="badge_id", referencedColumnName="id")
     * })
     */
    private $badge;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set logoUrl
     *
     * @param string $logoUrl
     * @return Contest
     */
    public function setLogoUrl($logoUrl)
    {
        $this->logoUrl = $logoUrl;
    
        return $this;
    }

    /**
     * Get logoUrl
     *
     * @return string 
     */
    public function getLogoUrl()
    {
        return $this->logoUrl;
    }

    /**
     * Set bannerUrl
     *
     * @param string $bannerUrl
     * @return Contest
     */
    public function setBannerUrl($bannerUrl)
    {
        $this->bannerUrl = $bannerUrl;
    
        return $this;
    }

    /**
     * Get bannerUrl
     *
     * @return string 
     */
    public function getBannerUrl()
    {
        return $this->bannerUrl;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Contest
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set descriptionShort
     *
     * @param string $descriptionShort
     * @return Contest
     */
    public function setDescriptionShort($descriptionShort)
    {
        $this->descriptionShort = $descriptionShort;
    
        return $this;
    }

    /**
     * Get descriptionShort
     *
     * @return string 
     */
    public function getDescriptionShort()
    {
        return $this->descriptionShort;
    }

    /**
     * Set descriptionLong
     *
     * @param string $descriptionLong
     * @return Contest
     */
    public function setDescriptionLong($descriptionLong)
    {
        $this->descriptionLong = $descriptionLong;
    
        return $this;
    }

    /**
     * Get descriptionLong
     *
     * @return string 
     */
    public function getDescriptionLong()
    {
        return $this->descriptionLong;
    }

    /**
     * Set dateStart
     *
     * @param \DateTime $dateStart
     * @return Contest
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;
    
        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime 
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     * @return Contest
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;
    
        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime 
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Contest
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Contest
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Add users
     *
     * @param \Kiddify\Bundle\WebsiteBundle\Entity\User $users
     * @return Contest
     */
    public function addUser(\Kiddify\Bundle\WebsiteBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \Kiddify\Bundle\WebsiteBundle\Entity\User $users
     */
    public function removeUser(\Kiddify\Bundle\WebsiteBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set badge
     *
     * @param \Kiddify\Bundle\WebsiteBundle\Entity\Badge $badge
     * @return Contest
     */
    public function setBadge(\Kiddify\Bundle\WebsiteBundle\Entity\Badge $badge = null)
    {
        $this->badge = $badge;
    
        return $this;
    }

    /**
     * Get badge
     *
     * @return \Kiddify\Bundle\WebsiteBundle\Entity\Badge 
     */
    public function getBadge()
    {
        return $this->badge;
    }
    public function __toString()
    {
        return ($this->title );
    }
}