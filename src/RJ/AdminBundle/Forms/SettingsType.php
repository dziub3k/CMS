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
                'text',
                array(
                    'attr' => array(
                        'class' => 'form-control'
                    ),
                    'label_attr' => array(
                        'class' => 'col-sm-2 control-label'
                    )
                )
            )
            ->add(
                'version',
                'text',
                array(
                    'attr' => array(
                        'class' => 'form-control'
                    ),
                    'label_attr' => array(
                        'class' => 'col-sm-2 control-label'
                    )
                )
            )
            ->add(
                'language',
                'choice',
                array(
                    'choices' => array('pl' => 'general.language.pl', 'en' => 'general.language.en'),
                    'multiple' => false,
                    'expanded' => false,
                    'attr' => array(
                        'class' => 'selectpicker form-control'
                    ),
                    'label_attr' => array(
                        'class' => 'col-sm-2 control-label'
                    )
                )
            )
            ->add(
                'siteName',
                'text',
                array(
                    'attr' => array(
                        'class' => 'form-control'
                    ),
                    'label_attr' => array(
                        'class' => 'col-sm-2 control-label'
                    )
                )
            )
            ->add(
                'siteDescription',
                'text',
                array(
                    'attr' => array(
                        'class' => 'form-control'
                    ),
                    'label_attr' => array(
                        'class' => 'col-sm-2 control-label'
                    )
                )
            )
            ->add(
                'siteKeyWords',
                'text',
                array(
                    'attr' => array(
                        'class' => 'form-control'
                    ),
                    'label_attr' => array(
                        'class' => 'col-sm-2 control-label'
                    )
                )
            )
            ->add(
                'contactEmail',
                'email',
                array(
                    'attr' => array(
                        'class' => 'form-control'
                    ),
                    'label_attr' => array(
                        'class' => 'col-sm-2 control-label'
                    )
                )
            )
            ->add(
                'rsaPub',
                'text',
                array(
                    'attr' => array(
                        'class' => 'form-control'
                    ),
                    'label_attr' => array(
                        'class' => 'col-sm-2 control-label'
                    )
                )
            )
            ->add(
                'rsaPrivate',
                'text',
                array(
                    'attr' => array(
                        'class' => 'form-control'
                    ),
                    'label_attr' => array(
                        'class' => 'col-sm-2 control-label'
                    )
                )
            )
            ->add(
                'flEnable',
                'checkbox',
                array(
                    'attr' => array(
                        'class' => 'checkbox'
                    ),
                    'label_attr' => array(
                        'class' => 'col-sm-2 control-label'
                    )
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
                'data_class' => 'RJ\AdminBundle\Entity\Settings'
            )
        );
    }

    public function getName()
    {
        return 'form_settings';
    }

} 