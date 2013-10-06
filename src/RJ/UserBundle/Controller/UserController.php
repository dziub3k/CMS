<?php

namespace RJ\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function indexAction()
    {
        return $this->render('RJUserBundle:User:index.html.twig', array('name' => 'UserBundle'));
    }
}
