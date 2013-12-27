<?php

namespace RJ\AdminBundle\Controller;

use RJ\AdminBundle\Entity\Settings;
use RJ\AdminBundle\Forms\SettingsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SettingsController extends Controller {

    public function indexAction()
    {
        $settings = new Settings($this->get('kernel'));
        $siteSettingsForm = $this->createForm(new SettingsType(), $settings);

        return $this->render(
            'RJAdminBundle:Settings:index.html.twig',
            array(
                'siteSettingsForm' => $siteSettingsForm->createView(),
            )
        );
    }
} 