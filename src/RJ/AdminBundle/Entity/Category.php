<?php

namespace RJ\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Yaml\Parser;

/**
 * @ORM\Entity(repositoryClass="Gedmo\Sortable\Entity\Repository\SortableRepository")
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
    protected $id;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parent")
     */
    protected $children;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    protected $parent;

    /**
     * @var boolean
     *
     * @ORM\Column(name="fl_show", type="boolean", options={"default" = true})
     */
    protected $flShow = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="fl_clickable", type="boolean", options={"default" = true})
     */
    protected $flClickable = true;

    /**
     * @Gedmo\SortablePosition
     * @ORM\Column(name="position", type="integer")
     */
    protected $position;

    protected $translations;

    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->translations = new ArrayCollection();
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

    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    public function getPosition()
    {
        return $this->position;
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

    /* TODO: W przyszłości gdy będzie php5.4 skorzystać z traita
        use \A2lix\I18nDoctrineBundle\Doctrine\ORM\Util\Translatable;
    */
    public function getTranslations()
    {
        return $this->translations = $this->translations ? : new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function setTranslations(\Doctrine\Common\Collections\ArrayCollection $translations)
    {
        $this->translations = $translations;
        return $this;
    }

    public function addTranslation($translation)
    {
        $this->getTranslations()->set($translation->getLocale(), $translation);
        $translation->setTranslatable($this);
        return $this;
    }

    public function removeTranslation($translation)
    {
        $this->getTranslations()->removeElement($translation);
    }

    public static function getTranslationEntityClass()
    {
        return __CLASS__ . 'Translation';
    }

    public function getCurrentTranslation()
    {
        return $this->getTranslations()->first();
    }

    public function __call($method, $args)
    {
        return ($translation = $this->getCurrentTranslation()) ?
            call_user_func(array(
                $translation,
                'get' . ucfirst($method)
            )) : '';
    }

    public function __toString()
    {
        $defaultLanguage = $this->getDefaultLanguage();
        $trans = $this->getTranslations()->get($defaultLanguage);
        if ($trans !== null) {
            $name = $trans->getName();
            if (!empty($name)) {
                return $trans->getName();
            }
        }
        $transIt = $this->getTranslations()->getIterator();
        foreach ($transIt as $trans) {
            if (count($trans) > 0) {
                $name = $trans->getName();
                if (!empty($name)) {
                    return $trans->getName();
                }
            }
        }
        return 'adminBundle.manageCategory.form.emptyTranslation';
    }

    private function getDefaultLanguage()
    {
        $path = __DIR__ . '/../Resources/config/parameters.yml';
        $parser = new Parser();
        if (file_exists($path)) {
            $yaml = $parser->parse(file_get_contents($path));
            return $yaml['parameters']['language'];
        }
    }
}
