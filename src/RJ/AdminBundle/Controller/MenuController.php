<?php

namespace RJ\AdminBundle\Controller;

use RJ\AdminBundle\Forms\CategoryType;
use RJ\UtilitiesBundle\Controller\BaseController;

class MenuController extends BaseController {

    public function indexAction()
    {
        return $this->render('RJAdminBundle:Menu:contents/index.html.twig');
    }

    public function addAction()
    {
        $request = $this->container->get('request');
        $categoryForm = $this->createForm(new CategoryType());
        $categoryForm->handleRequest($request);
        if ($categoryForm->isValid()) {
            $this->setFlashMessage('success', 'test');
            $this->redirect($this->generateUrl('rj_admin_settings_menu'));
        }
        return $this->render(
            'RJAdminBundle:Menu:contents/add.html.twig',
            array(
                'form' => $categoryForm->createView()
            )
        );
    }
}