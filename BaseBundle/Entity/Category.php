<?php

namespace CatalogD\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 */
class Category extends Item
{
    /**
     * @var ArrayCollection
     */
    private $items;

    /**
     * Add item
     *
     * @param Item $item
     *
     * @return Category
     */
    public function addItem($item)
    {
        $item->setCategory($item);
        if ($this->items->contains($item) === false) {
            $this->items[] = $item;
        }
        return $this;
    }

    /**
     * Remove item
     *
     * @param Item $item
     *
     * @return Category
     */
    public function removeItem($item)
    {
        $this->items->removeElement($item);
        return $this;
    }


    /**
     * Get items
     *
     * @return ArrayCollection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set items
     *
     * @param Iterable $items
     *
     * @return Category
     */
    public function setItems($items)
    {
        $this->items->clear();
        foreach ($items as $item) {
            $this->addItem($item);
        }

        return $this;
    }
}
