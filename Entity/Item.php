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

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Item
 */
abstract class Item extends Base
{
    /**
     * @var Category
     */
    private $category;

    /**
     * @var ArrayCollection
     */
    private $tags;

    /**
     * Set category
     *
     * @param Category $category
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
}
