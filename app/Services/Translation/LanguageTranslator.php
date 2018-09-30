<?php

namespace App\Services\Translation;

use DElfimov\Translate\Loader\PhpFilesLoader;
use DElfimov\Translate\Translate;
use Slim\Container;

class LanguageTranslator
{
    /**
     * @var \DElfimov\Translate\Translate
     */
    protected $translator;

    /**
     * @var array $avaibleLanguages
     */
    protected $avaibleLanguages;

    /**
     * @param \Slim\Container $container
     */
    public function __construct(Container $container)
    {
        $this->avaibleLanguages = $container->get('config')['avaibleLanguages'];
    }

    /**
     * @param string $lang
     * @return void
     */
    public function boot(string $lang)
    {
        $this->translator = new Translate(
            new PhpFilesLoader(ROOT_FILE . "/resources/langs"),
            [
                "default"   => $lang,
                "available" => $this->avaibleLanguages,
            ]
        );

        $this->translator->setLanguage($lang);
    }

    /**
     * @param string $key
     * @param array|string|integer $args
     * @param integer $num
     * @return string
     */
    public function translate(string $key, $args = [], int $num = 0): string
    {
        if (!is_array($args)) {
            $args = [$args];
        }

        if ($args) {
            return $this->translator->plural($key, $num, $args);
        }

        return $this->translator->t($key);
    }
}
