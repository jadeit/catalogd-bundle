<?php

namespace CatalogD\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Item
 */
class Item
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $identifier;

    /**
     * @var string
     */
    private $description;

    /**
     * @var Category
     */
    private $category;

    /**
     * @var ArrayCollection
     */
    private $tags;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var \DateTime
     */
    private $modified;

    /**
     * @var \DateTime
     */
    private $added;


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
     * Set identifier
     *
     * @param String $identifier
     */
    public function setIdentifier($identifier)
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Get identifier
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
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
     * Set description
     *
     * @param String $description
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set category
     *
     * @param Category $newcategory
     *
     * @return Item
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     *
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add tag
     *
     * @param Tag $tag
     *
     * @return Category
     */
    public function addTag($tag)
    {
        if ($this->tags->contains($tag) === false) {
            $this->tags[] = $tag;
        }
        return $this;
    }

    /**
     * Remove tag
     *
     * @param Tag $tag
     *
     * @return Category
     */
    public function removeTag($tag)
    {
        $this->tags->removeElement($tag);
        return $this;
    }


    /**
     * Get tags
     *
     * @return ArrayCollection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set tags
     *
     * @param Iterable $tags
     *
     * @return Category
     */
    public function setTags($tags)
    {
        $this->tags->clear();
        foreach ($tags as $tag) {
            $this->addTag($tag);
        }

        return $this;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Item
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     * @return Item
     */
    public function setModified($modified = null)
    {
        $modified = is_string($modified) || $modified === null ? new \DateTime($modified) : $modified;
        $this->modified = $modified;
        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set added
     *
     * @param \DateTime $added
     * @return Item
     */
    public function setAdded($added = null)
    {
        $added = is_string($added) || $added === null ? new \DateTime($added) : $added;
        $this->added = $added;
        return $this;
    }

    /**
     * Get added
     *
     * @return \DateTime
     */
    public function getAdded()
    {
        return $this->added;
    }

    /**
     * Extra validation for the entity.
     *
     * @return object The current object
     * @throws \RuntimeException If the model doesn't pass validation.
     */
    public function validate()
    {
        return $this;
    }

    /**
     * String representation of the item
     */
    public function __toString()
    {
        return $this->getIdentifier();
    }
}
