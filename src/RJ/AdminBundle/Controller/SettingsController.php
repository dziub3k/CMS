<?php

namespace RJ\AdminBundle\Controller;

use RJ\AdminBundle\Entity\Settings;
use RJ\AdminBundle\Forms\SettingsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Bundle\FrameworkBundle\Console\Application;

class SettingsController extends Controller {

    public function indexAction()
    {
        $request = $this->container->get('request');
        $settings = new Settings($this->get('kernel'));
        $siteSettingsForm = $this->createForm(new SettingsType(), $settings);
        $siteSettingsForm->handleRequest($request);
        if ($siteSettingsForm->isValid()) {
            $settings->saveYaml();
        }

        return $this->render(
            'RJAdminBundle:Settings:index.html.twig',
            array(
                'siteSettingsForm' => $siteSettingsForm->createView(),
            )
        );
    }
} 