<?php

namespace RJ\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @UniqueEntity("email")
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
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(
     * 		message="Podaj imię.",
     * 		groups={"Registration"}
     * )
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(
     * 		message="Podaj nazwisko.",
     * 		groups={"Registration"}
     * )
     */
    protected $lastName;

    /**
     * @ORM\Column(type="date")
     * @Assert\Date(
     *		message="Data urodzenia.",
     * 		groups={"Registration"}
     * )
     */
    protected $bornDate;

    /**
     * @ORM\Column(type="string", length=6)
     * @Assert\Regex(
     * 		pattern="/[0-9]{2}\-[0-9]{3}/",
     * 		match=true,
     * 		message="Niepoprawny kod pocztowy.",
     *  	groups={"Registration"}
     * )
     */
    protected $postalCode;

    /**
      * @ORM\Column(type="string", length=100)
     *  @Assert\NotBlank(
     * 		message="Podaj miasto.",
     * 		groups={"Registration"}
     * )
     */
    protected $city;

    /**
     * @ORM\Column(type="boolean")
     * @Assert\True(
     * 		message="Musisz zaakceptować warunki",
     * 		groups={"Registration"}
     * )
     */
    protected $termsOfService;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Set termsOfService
     *
     * @param boolean $termsOfService
     */
    public function setTermsOfService($termsOfService)
    {
        $this->termsOfService = $termsOfService;
    }

    /**
     * Get termsOfService
     *
     * @return boolean $termsOfService
     */
    public function getTermsOfService()
    {
        return $this->termsOfService;
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
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set bornDate
     *
     * @param \DateTime $bornDate
     * @return User
     */
    public function setBornDate($bornDate)
    {
        $this->bornDate = $bornDate;

        return $this;
    }

    /**
     * Get bornDate
     *
     * @return \DateTime
     */
    public function getBornDate()
    {
        return $this->bornDate;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     * @return User
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
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
}