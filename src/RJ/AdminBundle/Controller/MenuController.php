<?php

namespace RJ\AdminBundle\Controller;

use RJ\AdminBundle\Entity\Category;
use RJ\AdminBundle\Entity\CategoryTranslation;
use RJ\AdminBundle\Forms\CategoryType;
use RJ\UtilitiesBundle\Controller\BaseController;

class MenuController extends BaseController {

    public function indexAction()
    {
        /*em = $this->getDoctrine()->getManager();
        $fruits = new Category;
        $fruits->setParent(null);
        $fruits->setName('Fruits');
        $fruits->addTranslation(new CategoryTranslation('lt', 'name', 'Vaisiai'));
        $fruits->addTranslation(new CategoryTranslation('ru', 'name', 'rus trans'));
        $em->persist($fruits);
        $em->flush();*/

        $categoryRepository = $this->getRepository('RJAdminBundle:Category');
        $categories = $categoryRepository->findBy(
            array(
                'parent' => null
            )
        );
        /*foreach ($categories as $category) {
            echo $category->getName() . '<br>';
            if(count($children = $category->getChildren()) > 0)
            {
                foreach ($children as $child) {
                    echo $child->getName();
                }
            }
        }*/
        return $this->render('RJAdminBundle:Menu:contents/index.html.twig');
    }

    public function addAction()
    {
        $request = $this->container->get('request');
        $category = new Category();
        $categoryForm = $this->createForm(new CategoryType(), $category);
        $categoryForm->handleRequest($request);
        if ($categoryForm->isValid()) {
            $this->setFlashMessage('success', 'test');
            $em = $this->getDoctrine()->getManager();
            if ($categoryForm->isSubmitted()){
                $em->persist($category);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('rj_admin_settings_menu'));
        }
        return $this->render(
            'RJAdminBundle:Menu:contents/add.html.twig',
            array(
                'form' => $categoryForm->createView()
            )
        );
    }
}