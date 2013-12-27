<?php

namespace RJ\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use RJ\AdminBundle\Entity\Settings;
use Symfony\Component\DependencyInjection\ContainerAware;

class LoadConfigData extends ContainerAware implements FixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $setting = new Settings($this->container->get('kernel'));
        $setting->setDomain('cms.radoslawjaros.pl');
        $setting->setVersion('1.0');
        $setting->setLanguage('pl');
        $setting->setSiteName('CMS Radosław Jaros');
        $setting->setSiteDescription('CMS zaprojektowany dla małych firm');
        $setting->setSiteKeyWords('CMS, Radosław Jaros, zarządzanie treścią, strona firmowa');
        $setting->setContactEmail('jaros_radek@op.pl');
        $setting->setRsaPub('rsaPub - test');
        $setting->setRsaPrivate('rsaPrivate - test');
        $setting->setFlEnable(true);
        $setting->saveYaml();
    }
} 