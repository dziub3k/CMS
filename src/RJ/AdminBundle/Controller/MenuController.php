<?php

namespace RJ\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller {

    public function indexAction()
    {
        return $this->render('RJAdminBundle:Settings:index.html.twig');
    }
}