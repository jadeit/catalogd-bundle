<?php
/**
 * This file is part of the CatalogD package.
 *
 * Copyright (c) Jade IT <jrgns@jadeit.co.za>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CatalogD\BaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Tag
 */
class Tag extends Item
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
        $item->addTag($this);
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
        $item->removeTag($this);

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
