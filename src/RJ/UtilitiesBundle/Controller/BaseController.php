<?php

namespace RJ\UtilitiesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
    /**
     * Ustawia Flash message
     * @param string $type success/error/warning
     * @param string $message wiadomość zapisana
     */
    public function setFlashMessage($type, $message)
    {
        $session = $this->container->get('session');
        $session->getFlashBag()->add($type, $message);
    }
}
