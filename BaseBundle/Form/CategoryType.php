<?php

namespace CatalogD\BaseBundle\Form;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoryType extends ItemType
{
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CatalogD\BaseBundle\Entity\Category'
        ));
    }

    public function getName()
    {
        return 'catalogd_basebundle_categorytype';
    }
}
