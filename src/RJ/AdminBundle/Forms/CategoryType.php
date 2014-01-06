<?php

namespace RJ\AdminBundle\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class CategoryType extends AbstractType
{
    private $parameters;

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $parameters = $this->parameters;

        $builder
            ->add(
                'translations',
                'a2lix_translations',
                array(
                    'required' => false,
                    'fields' => array(
                        'name' => array(
                            'required' => true,
                            'field_type' => 'text',
                            'label' => 'adminBundle.manageCategory.form.name',
                            'attr' => array(
                                'class' => 'form-control'
                            )
                        ),
                        'tags' => array(
                            'field_type' => 'text',
                            'label' => 'adminBundle.manageCategory.form.tags',
                            'attr' => array(
                                'class' => 'form-control'
                            )
                        ),
                        'description' => array(
                            'field_type' => 'textarea',
                            'label' => 'adminBundle.manageCategory.form.description',
                            'attr' => array(
                                'class' => 'form-control'
                            )
                        ),
                        'slug' => array(
                            'display' => false
                        )
                    )
                )
            )
            ->add(
                'parent',
                'entity',
                array(
                    'class' => 'RJAdminBundle:Category',
                    'query_builder' => function (EntityRepository $er) use ($parameters) {
                            $qb = $er->createQueryBuilder('c')
                                ->where('c.parent is null');
                            if (isset($parameters['id']) && is_int($parameters['id'])) {
                                $qb->andWhere('c.id != :id')
                                ->setParameter('id', $parameters['id']);
                            }
                            return $qb;
                        },
                    'label' => 'adminBundle.manageCategory.form.parent',
                    'empty_value' => 'adminBundle.manageCategory.form.empty',
                    'required' => false,
                    'attr' => array(
                        'class' => 'selectpicker form-control'
                    )
                )
            )
            ->add(
                'flShow',
                'checkbox',
                array(
                    'required' => false,
                    'label' => 'adminBundle.manageCategory.form.flShow',
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
                    'label' => 'adminBundle.manageCategory.form.flClickable',
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
        return 'form';
    }

}