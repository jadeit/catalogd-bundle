<?php
/**
 * This file is part of the CatalogD package.
 *
 * Copyright (c) Jade IT <jrgns@jadeit.co.za>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace JadeIT\CatalogDBundle\Event;

use Symfony\Component\EventDispatcher\Event;

use JadeIT\CatalogDBundle\Entity\Category;

class CategoryEvent extends Event
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Return the Category associated with the event.
     *
     * @return User
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the Category associated with the event.
     *
     * @param Category $category
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }
}
