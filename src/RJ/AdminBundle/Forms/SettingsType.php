<?php

namespace RJ\AdminBundle\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SettingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'domain',
                'text'
            )
            ->add(
                'version',
                'text'
            )
            ->add(
                'language',
                'choice',
                array(
                    'choices' => array('pl' => 'general.language.pl', 'en' => 'general.language.en'),
                    'multiple' => false,
                    'expanded' => true
                )
            )
            ->add(
                'siteName',
                'text'
            )
            ->add(
                'siteDescription'
            )
            ->add(
                'siteKeyWords',
                'text'
            )
            ->add(
                'contactEmail',
                'email'
            )
            ->add(
                'rsaPub',
                'text'
            )
            ->add(
                'rsaPrivate',
                'text'
            )
            ->add(
                'flEnable',
                'choice',
                array(
                    'choices' => array('flEnable'),
                    'multiple' => true,
                    'expanded' => true
                )
            )
            ->add(
                'save',
                'submit',
                array(
                    'label' => 'general.save'
                )
            )
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'csrf_protection' => false,
                'data_class' => 'RJ\AdminBundle\Entity\Settings'
            )
        );
    }

    public function getName()
    {
        return 'form_settings';
    }

} 