<?php

namespace App\Services\Translation;

use Slim\Container;

class LanguageRecognizer
{
    /**
     * @var array
     */
    protected $avaibleLanguages;

    /**
     * @var string
     */
    protected $defaultLanguage;

    /**
     * @param \Slim\Container $container
     */
    public function __construct(Container $container)
    {
        $config                 = $container->get('config');
        $this->avaibleLanguages = $config['avaibleLanguages'];
        $this->defaultLanguage  = $config['defaultLanguage'];
    }

    /**
     * @return string
     */
    public function recognize(): string
    {
        $browserLanguages = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        $browserLanguage  = substr($browserLanguages[0], 0, 2);

        $lang = $browserLanguage;

        if (isset($_COOKIE['lang'])) {
            $lang = $_COOKIE['lang'];
        }

        if (!in_array($lang, $this->avaibleLanguages)) {
            $lang = $this->defaultLanguage;
        }

        return $lang;
    }
}
