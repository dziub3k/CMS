<?php

namespace RJ\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ManageShopController extends Controller
{
    public function indexAction()
    {
        return $this->render('RJShopBundle:ManageShop:index.html.twig');
    }
}
