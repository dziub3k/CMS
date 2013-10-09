<?php

namespace RJ\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\True;

class RegistrationFormType extends BaseType {

    /**
     * @SuppressWarnings("unused")
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('username', 'text')
                ->add('firstName', 'text')
                ->add('lastName', 'text')
                ->add(
                        'email', 'email', array(
                    'label' => 'form.email',
                    'translation_domain' => 'FOSUserBundle'
                        )
                )
                ->add(
                        'plainPassword', 'repeated', array(
                    'type' => 'password',
                    'options' => array('translation_domain' => 'FOSUserBundle'),
                    'first_options' => array('label' => 'form.password'),
                    'second_options' => array('label' => 'form.password_confirmation'),
                    'invalid_message' => 'fos_user.password.mismatch',
                        )
                )
                ->add(
                        'bornDate', 'date', array(
                    
                        )
                )
                ->add(
                        'postalCode', 'text', array(
                    'max_length' => 6,
                    'label' => '',
                    'attr' => array(
                        'placeholder' => 'Kod pocztowy',
                    ),
                        )
                )
                ->add(
                        'city', 'text', array(
                    'label' => '',
                    'attr' => array(
                        'placeholder' => 'Miasto',
                    ),
                        )
                )
                ->add("termsOfService", "checkbox");
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(
                array(
                    'data_class' => 'RJ\UserBundle\Entity\User',
                    'intention' => 'registration',
                    'csrf_protection' => false
                )
        );
    }

    public function getName() {
        return 'rj_user_registration';
    }

}