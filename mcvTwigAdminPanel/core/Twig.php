<?php

namespace Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extra\String\StringExtension;

class Twig {

    private Environment $twig;
    private array $functions = [];

    public function loadTwig() {
        $this->twig = new Environment($this->loadViews(), [
            'debug' => true,
            // 'cache' => '/cache',
            'auto_reload' => true,
        ]);

        return $this->twig;
    }

    private function loadViews() {
        return new FilesystemLoader('../app/views');
    }

    public function loadExtensions() {
        return $this->twig->addExtension(new StringExtension());
    }

    private function functionsToView($name, $callback) {
        if ($callback instanceof \Twig\TwigFunction) {
            $callback = $callback->getCallable();
        }
    
        return new \Twig\TwigFunction($name, $callback);
    }
    
    public function loadFunctions() {
        require '../app/functions/twig.php';

        foreach ($this->functions as $key => $value) {
            $this->functions[$key] = $this->functionsToView($key, $value);
            $this->twig->addFunction($this->functions[$key]);
        }
    }
}

