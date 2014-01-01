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
                'copyright',
                'text',
                array(
                    'label' => 'adminBundle.siteSettings.copyright',
                    'attr' => array(
                        'class' => 'form-control'
                    ),
                    'label_attr' => array(
                        'class' => 'col-sm-2 control-label'
                    )
                )
            )
            ->add(
                'domain',
                'text',
                array(
                    'label' => 'adminBundle.siteSettings.domain',
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
                    'label' => 'adminBundle.siteSettings.version',
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
                    'label' => 'adminBundle.siteSettings.language',
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
                    'label' => 'adminBundle.siteSettings.siteName',
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
                    'label' => 'adminBundle.siteSettings.siteDescription',
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
                    'label' => 'adminBundle.siteSettings.siteKeyWords',
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
                    'label' => 'adminBundle.siteSettings.contactMail',
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
                'textarea',
                array(
                    'label' => 'adminBundle.siteSettings.rsa.pub',
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
                'textarea',
                array(
                    'label' => 'adminBundle.siteSettings.rsa.priv',
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
                    'label' => 'adminBundle.siteSettings.flEnable',
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