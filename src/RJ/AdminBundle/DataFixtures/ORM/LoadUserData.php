<?php

namespace RJ\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData implements FixtureInterface, ContainerAwareInterface {
    private $container;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->createUser();
        $user->setFirstName('Radosław');
        $user->setLastName('Jaros');
        $user->setBornDate(new \DateTime("10-09-1987"));
        $user->setUsername('dziub3k');
        $user->setPostalCode('00-000');
        $user->setCity('Null');
        $user->setTermsOfService(true);
        $user->setEmail('dziub3k@gmail.com');
        $user->setEnabled(true);
        $user->setPlainPassword('admin');
        $user->setRoles(array('ROLE_ADMIN'));
        $userManager->updateUser($user);
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}