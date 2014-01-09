<?php

namespace RJ\AdminBundle\Forms\EventListener;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Doctrine\ORM\EntityRepository;

class AddParentFieldSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(FormEvents::PRE_SET_DATA => 'preSetData');
    }

    public function preSetData(FormEvent $event)
    {
        $category = $event->getData();
        $form = $event->getForm();

        $form->add(
            'parent',
            'entity',
            array(
                'class' => 'RJAdminBundle:Category',
                'query_builder' => function (EntityRepository $er) use ($category) {
                        $qb = $er->createQueryBuilder('c')
                            ->where('c.parent is null');

                        $categoryId = $category->getId();
                        if (!empty($categoryId) && is_int($categoryId)) {
                            $qb->andWhere('c.id != :id')
                                ->setParameter('id', $categoryId);
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
        );
    }
} 