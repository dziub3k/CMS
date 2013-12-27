<?php

namespace RJ\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use RJ\AdminBundle\Entity\Settings;

class LoadConfigData implements FixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $setting = new Settings();
        $setting->addParameter('domain', 'cms.radoslawjaros.pl');
        $setting->addParameter('version', '1.0');
        $setting->addParameter('language', 'pl');
        $setting->addParameter('siteName', 'CMS Radosław Jaros');
        $setting->addParameter('siteDescription', null);
        $setting->addParameter('siteKeyWords', null);
        $setting->addParameter('contactEmail', null);
        $setting->addParameter('rsaPub', null);
        $setting->addParameter('rsaPrivate', null);
        $setting->addParameter('flEnable', true);
        $setting->saveYaml();

        /*$setting = new Settings();
        $setting->setName('domain');
        $setting->setValue('cms.radoslawjaros.pl');
        $settings[] = $setting;

        $setting = new Settings();
        $setting->setName('version');
        $setting->setValue('1.0');
        $settings[] = $setting;

        $setting = new Settings();
        $setting->setName('language');
        $setting->setValue('pl');
        $setting->setDefaultValue('pl');
        $settings[] = $setting;

        $setting = new Settings();
        $setting->setName('siteName');
        $setting->setValue('CMS Radosław Jaros');
        $settings[] = $setting;

        $setting = new Settings();
        $setting->setName('siteDescription');
        $setting->setValue(null);
        $settings[] = $setting;

        $setting = new Settings();
        $setting->setName('siteKeyWords');
        $setting->setValue(null);
        $settings[] = $setting;

        $setting = new Settings();
        $setting->setName('contactEmail');
        $setting->setValue(null);
        $settings[] = $setting;

        $setting = new Settings();
        $setting->setName('rsaPub');
        $setting->setValue(null);
        $settings[] = $setting;

        $setting = new Settings();
        $setting->setName('rsaPrivate');
        $setting->setValue(null);
        $settings[] = $setting;

        $setting = new Settings();
        $setting->setName('flEnable');
        $setting->setValue(true);
        $settings[] = $setting;

        foreach ($settings as $setting) {
            $manager->persist($setting);
        }
        $manager->flush();*/
    }
} 