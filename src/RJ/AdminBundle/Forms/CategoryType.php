<?php

namespace RJ\AdminBundle\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                'text',
                array(

                )
            )
            ->add(
                'parent',
                'choice',
                array(
                    'required' => false
                )
            )
            ->add(
                'tags',
                'text',
                array(
                    'required' => false
                )
            )
            ->add(
                'description',
                'textarea',
                array(
                    'required' => false
                )
            )
            ->add(
                'fl_show',
                'checkbox',
                array(
                    'required' => false
                )
            )
            ->add(
                'save',
                'submit',
                array(
                    'label' => 'general.save',
                    'attr' => array(
                        'class' => 'btn btn-success'
                    )
                )
            )
            ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'csrf_protection' => false,
                'data_class' => 'RJ\AdminBundle\Entity\Category'
            )
        );
    }


    public function getName()
    {
        // TODO: Implement getName() method.
    }

}