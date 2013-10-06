<?php

namespace RJ\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RJAdminBundle:Default:index.html.twig');
    }
}
