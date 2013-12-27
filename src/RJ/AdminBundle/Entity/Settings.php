<?php

namespace RJ\AdminBundle\Entity;

use Symfony\Component\Yaml\Dumper;
use Symfony\Component\Input\ArgvInput;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Yaml\Parser;

/**
 * Settings
 */
class Settings
{
    private $parameters;

    private $domain;

    private $version;

    private $language;

    private $siteName;

    private $siteDescription;

    private $siteKeyWords;

    private $contactEmail;

    private $rsaPub;

    private $rsaPrivate;

    private $flEnable;

    private $kernel;

    private $path;

    public function __construct($kernel)
    {
        $this->path = __DIR__ . '/../Resources/config/parameters.yml';
        $this->kernel = $kernel;
        $this->parameters = array();
        $this->loadFile();
    }

    public function setParameters()
    {
        $this->parameters['domain'] = $this->domain;
        $this->parameters['version'] = $this->version;
        $this->parameters['language'] = $this->language;
        $this->parameters['siteName'] = $this->siteName;
        $this->parameters['siteDescription'] = $this->siteDescription;
        $this->parameters['siteKeyWords'] = $this->siteKeyWords;
        $this->parameters['contactEmail'] = $this->contactEmail;
        $this->parameters['rsaPub'] = $this->rsaPub;
        $this->parameters['rsaPrivate'] = $this->rsaPrivate;
        $this->parameters['flEnable'] = $this->flEnable;
    }

    public function saveYaml()
    {
        $this->setParameters();

        $dumper = new Dumper();
        $yamlDump = array('parameters' => $this->parameters);
        $yamlContent = $dumper->dump($yamlDump, 2);
        file_put_contents($this->path, $yamlContent);

        $this->clearCache();
    }

    /**
     * @param string $contactEmail
     */
    public function setContactEmail($contactEmail)
    {
        $this->contactEmail = $contactEmail;
    }

    /**
     * @return string
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param boolean $flEnable
     */
    public function setFlEnable($flEnable)
    {
        $this->flEnable = $flEnable;
    }

    /**
     * @return boolean
     */
    public function getFlEnable()
    {
        return $this->flEnable;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $rsaPrivate
     */
    public function setRsaPrivate($rsaPrivate)
    {
        $this->rsaPrivate = $rsaPrivate;
    }

    /**
     * @return string
     */
    public function getRsaPrivate()
    {
        return $this->rsaPrivate;
    }

    /**
     * @param string $rsaPub
     */
    public function setRsaPub($rsaPub)
    {
        $this->rsaPub = $rsaPub;
    }

    /**
     * @return string
     */
    public function getRsaPub()
    {
        return $this->rsaPub;
    }

    /**
     * @param string $siteDescription
     */
    public function setSiteDescription($siteDescription)
    {
        $this->siteDescription = $siteDescription;
    }

    /**
     * @return string
     */
    public function getSiteDescription()
    {
        return $this->siteDescription;
    }

    /**
     * @param string $siteKeyWords
     */
    public function setSiteKeyWords($siteKeyWords)
    {
        $this->siteKeyWords = $siteKeyWords;
    }

    /**
     * @return string
     */
    public function getSiteKeyWords()
    {
        return $this->siteKeyWords;
    }

    /**
     * @param string $siteName
     */
    public function setSiteName($siteName)
    {
        $this->siteName = $siteName;
    }

    /**
     * @return string
     */
    public function getSiteName()
    {
        return $this->siteName;
    }

    /**
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    private function clearCache ()
    {
        $input = new ArgvInput(array('console','cache:clear'));
        $application = new Application($this->kernel);
        $application->run($input);
    }

    private function  loadFile()
    {
        $parser = new Parser();
        $yaml = $parser->parse(file_get_contents($this->path));
        $parameters = $yaml['parameters'];
        $this->domain = $parameters['domain'];
        $this->version = $parameters['version'];
        $this->language = $parameters['language'];
        $this->siteName = $parameters['siteName'];
        $this->siteDescription = $parameters['siteDescription'];
        $this->siteKeyWords = $parameters['siteKeyWords'];
        $this->contactEmail = $parameters['contactEmail'];
        $this->rsaPub = $parameters['rsaPub'];
        $this->rsaPrivate = $parameters['rsaPrivate'];
        $this->flEnable = array('flEnable' => $parameters['flEnable']);
        var_dump($this->flEnable);
    }
}
