<?php
/**
 * This file is part of the CatalogD package.
 *
 * Copyright (c) Jade IT <jrgns@jadeit.co.za>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CatalogD\BaseBundle\Form;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TagType extends ItemType
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CatalogD\BaseBundle\Entity\Tag'
        ));
    }

    public function getName()
    {
        return 'catalogd_basebundle_tagtype';
    }
}
