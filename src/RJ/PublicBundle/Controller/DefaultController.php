<?php

namespace RJ\PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render(
            'RJPublicBundle:Default:index.html.twig',
            array('name' => 'CMS')
        );
    }
}
