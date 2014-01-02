<?php

namespace RJ\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parent")
     */
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="tags", type="string", length=255, nullable=true)
     */
    private $tags;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="fl_show", type="boolean", options={"default" = true})
     */
    private $flShow = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="fl_clickable", type="boolean", options={"default" = true})
     */
    private $flClickable = true;

    public function __construct()
    {
        $this->children = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Category
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
     * Set tags
     *
     * @param string $tags
     * @return Category
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set flShow
     *
     * @param boolean $flShow
     * @return Category
     */
    public function setFlShow($flShow)
    {
        $this->flShow = $flShow;

        return $this;
    }

    /**
     * Get flShow
     *
     * @return boolean 
     */
    public function getFlShow()
    {
        return $this->flShow;
    }

    /**
     * Set flClickable
     *
     * @param boolean $flClickable
     * @return Category
     */
    public function setFlClickable($flClickable)
    {
        $this->flClickable = $flClickable;

        return $this;
    }

    /**
     * Get flClickable
     *
     * @return boolean
     */
    public function getFlClickable()
    {
        return $this->flClickable;
    }

    /**
     * Add children
     *
     * @param \RJ\AdminBundle\Entity\Category $children
     * @return Category
     */
    public function addChild(Category $children)
    {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \RJ\AdminBundle\Entity\Category $children
     */
    public function removeChild(Category $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param \RJ\AdminBundle\Entity\Category $parent
     * @return Category
     */
    public function setParent(Category $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \RJ\AdminBundle\Entity\Category 
     */
    public function getParent()
    {
        return $this->parent;
    }

    public function __toString()
    {
        return $this->name;
    }
}
