<?php
/**
 * This file is part of the CatalogD package.
 *
 * Copyright (c) Jade IT <jrgns@jadeit.co.za>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JadeIT\CatalogDBundle\Entity;

/**
 * Base
 */
abstract class Base
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
     * @var boolean
     */
    private $active = true;

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
     * Return canonical identification if no identifier is provided.
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier === null ? $this->getCanonical() : $this->identifier;
    }

    /**
     * Return information that canonically identifies the entity.
     *
     * @return string
     */
    public function getCanonical()
    {
        return null;
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
     * Set active
     *
     * @param  boolean $active
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
     * @param  \DateTime $modified
     * @return Item
     */
    public function setModified($modified = null)
    {
        $modified = is_scalar($modified) || $modified === null ? new \DateTime($modified) : $modified;
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
     * @param  \DateTime $added
     * @return Item
     */
    public function setAdded($added = null)
    {
        $added = is_scalar($added) || $added === null ? new \DateTime($added) : $added;
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
        if (empty($this->added)) {
            $this->setAdded();
        }
        return $this->added;
    }

    /**
     * String representation of the item
     */
    public function __toString()
    {
        return $this->getIdentifier();
    }

    public function prePersist()
    {
        if (empty($this->added)) {
            $this->setAdded();
        }
        $this->setModified();
    }

    public function preUpdate()
    {
        $this->setModified();
    }
}
