<?php

namespace RJ\AdminBundle\Controller;

use RJ\AdminBundle\Entity\Category;
use RJ\AdminBundle\Forms\CategoryType;
use RJ\UtilitiesBundle\Controller\BaseController;
use A2lix\I18nDoctrineBundle\Annotation\I18nDoctrine;

class CategoryController extends BaseController {

    public function indexAction()
    {
        $categoryRepository = $this->getRepository('RJAdminBundle:Category');
        $categories = $categoryRepository->findBy(
            array(
                'parent' => null
            )
        );
        /*foreach ($categories as $category) {
            echo $category->getCurrentTranslation() . '<br>';
            if(count($children = $category->getChildren()) > 0)
            {
                foreach ($children as $child) {
                    echo $child->getCurrentTranslation();
                }
            }
        }*/
        return $this->render('RJAdminBundle:Category:contents/index.html.twig');
    }

    /**
     * @I18nDoctrine
     */
    public function addAction()
    {
        $request = $this->container->get('request');
        $category = new Category();
        $categoryParameters = array(
            'default_locale' => $this->container->getParameter('language')
        );
        $categoryForm = $this->createForm(new CategoryType($categoryParameters), $category);
        $categoryForm->handleRequest($request);
        if ($categoryForm->isValid()) {
            $this->setFlashMessage('success', 'test');
            $em = $this->getDoctrine()->getManager();
            if ($categoryForm->isSubmitted()){
                $em->persist($category);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('rj_admin_settings_category'));
        }
        return $this->render(
            'RJAdminBundle:Category:contents/add.html.twig',
            array(
                'form' => $categoryForm->createView()
            )
        );
    }
}