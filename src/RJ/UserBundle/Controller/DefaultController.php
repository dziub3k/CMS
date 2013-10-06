<?php

namespace RJ\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RJUserBundle:Default:index.html.twig', array('name' => 'UserBundle'));
    }
}
