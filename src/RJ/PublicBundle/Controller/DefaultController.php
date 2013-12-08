<?php

namespace RJ\PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {
    public function getTokenAction()
    {
        return new Response($this->container->get('form.csrf_provider')
            ->generateCsrfToken('authenticate'));
    }

    public function indexAction() {
        return $this->render('RJPublicBundle:Default:index.html.twig');
    }

    public function emailAction($name = 'Radek') {
        $message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('info@radoslawjaros.pl')
                ->setTo('jaros_radek@op.pl')
                ->setBody(
                $this->renderView(
                        'RJPublicBundle:Email:email.txt.twig'
                    )
                )
        ;
        
            $this->get('mailer')->send($message);
            $url = $this->container->get('router')->generate('rj_public_homepage');
            $response = new \Symfony\Component\HttpFoundation\RedirectResponse($url);
            return $response;
            //$this->render('RJPublicBundle:ManageShop:index.html.twig');
    }

}
