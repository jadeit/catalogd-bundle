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

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('identifier')
            ->add('description')
            ->add('active')
            ->add('modified')
            ->add('added')
            ->add('category')
            ->add('tags')
        ;
        $options = array(
            array('form_type' => 'form-horizontal'),
        );
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CatalogD\BaseBundle\Entity\Item'
        ));
    }

    public function getName()
    {
        return 'catalogd_basebundle_itemtype';
    }
}
