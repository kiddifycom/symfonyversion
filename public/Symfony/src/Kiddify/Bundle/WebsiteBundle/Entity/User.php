<?php

namespace Kiddify\Bundle\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
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
     * @ORM\Column(name="username", type="string", length=255, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar_url", type="string", length=255, nullable=true)
     */
    private $avatarUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="schoolname", type="string", length=255, nullable=true)
     */
    private $schoolname;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="parent_email", type="string", length=255, nullable=true)
     */
    private $parentEmail;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tc_agree", type="boolean", nullable=true)
     */
    private $tcAgree;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="date", nullable=true)
     */
    private $birthdate;

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
     * @ORM\ManyToMany(targetEntity="Contest", mappedBy="users")
     */
    private $contests;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Follow", mappedBy="user")
     *
     */
    private $followers;


    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Follow", mappedBy="user")
     */
    private $followeds;

    /**
     * @var \Country
     *
     * @ORM\ManyToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * })
     */
    private $country;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contests = new \Doctrine\Common\Collections\ArrayCollection();
        $this->followers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->followeds = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set avatarUrl
     *
     * @param string $avatarUrl
     * @return User
     */
    public function setAvatarUrl($avatarUrl)
    {
        $this->avatarUrl = $avatarUrl;
    
        return $this;
    }

    /**
     * Get avatarUrl
     *
     * @return string 
     */
    public function getAvatarUrl()
    {
        return $this->avatarUrl;
    }

    /**
     * Set schoolname
     *
     * @param string $schoolname
     * @return User
     */
    public function setSchoolname($schoolname)
    {
        $this->schoolname = $schoolname;
    
        return $this;
    }

    /**
     * Get schoolname
     *
     * @return string 
     */
    public function getSchoolname()
    {
        return $this->schoolname;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set parentEmail
     *
     * @param string $parentEmail
     * @return User
     */
    public function setParentEmail($parentEmail)
    {
        $this->parentEmail = $parentEmail;
    
        return $this;
    }

    /**
     * Get parentEmail
     *
     * @return string 
     */
    public function getParentEmail()
    {
        return $this->parentEmail;
    }

    /**
     * Set tcAgree
     *
     * @param boolean $tcAgree
     * @return User
     */
    public function setTcAgree($tcAgree)
    {
        $this->tcAgree = $tcAgree;
    
        return $this;
    }

    /**
     * Get tcAgree
     *
     * @return boolean 
     */
    public function getTcAgree()
    {
        return $this->tcAgree;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return User
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    
        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return User
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
     * @return User
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
     * Add contests
     *
     * @param \Kiddify\Bundle\WebsiteBundle\Entity\Contest $contests
     * @return User
     */
    public function addContest(\Kiddify\Bundle\WebsiteBundle\Entity\Contest $contests)
    {
        $this->contests[] = $contests;
    
        return $this;
    }

    /**
     * Remove contests
     *
     * @param \Kiddify\Bundle\WebsiteBundle\Entity\Contest $contests
     */
    public function removeContest(\Kiddify\Bundle\WebsiteBundle\Entity\Contest $contests)
    {
        $this->contests->removeElement($contests);
    }

    /**
     * Get contests
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContests()
    {
        return $this->contests;
    }


    /**
     * Set country
     *
     * @param \Kiddify\Bundle\WebsiteBundle\Entity\Country $country
     * @return User
     */
    public function setCountry(\Kiddify\Bundle\WebsiteBundle\Entity\Country $country = null)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return \Kiddify\Bundle\WebsiteBundle\Entity\Country 
     */
    public function getCountry()
    {
        return $this->country;
    }
}