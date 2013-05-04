<?php

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
