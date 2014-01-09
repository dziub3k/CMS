<?php

namespace RJ\AdminBundle\Controller;

use RJ\AdminBundle\Entity\Category;
use RJ\AdminBundle\Forms\CategoryType;
use RJ\UtilitiesBundle\Controller\BaseController;
use A2lix\I18nDoctrineBundle\Annotation\I18nDoctrine;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

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
        return $this->render(
            'RJAdminBundle:Category:contents/index.html.twig',
            array(
                'categoryTree' => $categories
            )
        );
    }

    /**
     * @I18nDoctrine
     */
    public function addAction()
    {
        $category = new Category();
        return $this->handleCategoryForm($category, 'add');
    }

    /**
     * @I18nDoctrine
     */
    public function editAction(Category $category)
    {
        return $this->handleCategoryForm($category, 'edit');
    }

    public function removeAction(Category $category)
    {
        $em = $this->getDoctrine()->getManager();
        //TODO: zastanowić się czy usuwać dzieci, czy przenośić do głównego drzewa, czy do nieprzypisane?
        if ($category->getChildren()->count() > 0) {
            $children = $category->getChildren();
            foreach ($children as $child) {
                $child->setParent(null);
                $em->persist($child);
            }
            $em->flush();
        }
        $em->remove($category);
        $em->flush();
    }

    private function handleCategoryForm(Category $category, $type)
    {
        $request = $this->container->get('request');
        $categoryForm = $this->createForm(new CategoryType(), $category);
        $categoryForm->handleRequest($request);
        if ($categoryForm->isValid()) {
            if ($type == 'add') {
                $message = $this->translateMessage('adminBundle.manageCategory.operation.add');
            } elseif ($type == 'edit') {
                $message = $this->translateMessage('adminBundle.manageCategory.operation.edit');
            }
            $this->setFlashMessage('success', $message);

            $em = $this->getDoctrine()->getManager();
            if ($categoryForm->isSubmitted()){
                $em->persist($category);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('rj_admin_settings_category'));
        }
        return $this->render(
            'RJAdminBundle:Category:contents/form.html.twig',
            array(
                'form' => $categoryForm->createView()
            )
        );
    }
}