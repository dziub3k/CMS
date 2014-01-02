<?php

namespace RJ\AdminBundle\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class CategoryType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                'text',
                array(
                    'label' => 'adminBundle.manageMenu.form.name',
                    'attr' => array(
                        'class' => 'form-control'
                    )
                )
            )
            ->add(
                'parent',
                'entity',
                array(
                    'class' => 'RJAdminBundle:Category',
                    'query_builder' => function (EntityRepository $er) use ($options) {
                            $qb = $er->createQueryBuilder('c')
                                ->where('c.parent is null')
                                ->orderBy('c.name', 'ASC');
                            if (isset($options['id']) && is_int($options['id'])) {
                                $qb->andWhere('c.id != :id')
                                ->setParameter('id', $options['id']);
                            }
                            return $qb;
                        },
                    'label' => 'adminBundle.manageMenu.form.parent',
                    'empty_value' => 'adminBundle.manageMenu.form.empty',
                    'attr' => array(
                        'class' => 'selectpicker form-control'
                    )
                )
            )
            ->add(
                'tags',
                'text',
                array(
                    'required' => false,
                    'label' => 'adminBundle.manageMenu.form.tags',
                    'attr' => array(
                        'class' => 'form-control'
                    )
                )
            )
            ->add(
                'description',
                'textarea',
                array(
                    'required' => false,
                    'label' => 'adminBundle.manageMenu.form.description',
                    'attr' => array(
                        'class' => 'form-control'
                    )
                )
            )
            ->add(
                'flShow',
                'checkbox',
                array(
                    'required' => false,
                    'label' => 'adminBundle.manageMenu.form.flShow',
                    'attr' => array(
                        'class' => 'checkbox'
                    )
                )
            )
            ->add(
                'flClickable',
                'checkbox',
                array(
                    'required' => false,
                    'label' => 'adminBundle.manageMenu.form.flClickable',
                    'attr' => array(
                        'class' => 'checkbox'
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
            );
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