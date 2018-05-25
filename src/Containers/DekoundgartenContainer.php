<?php

namespace Dekoundgarten\Containers;

use Plenty\Plugin\Templates\Twig;

class DekoundgartenContainer
{
    public function call(Twig $twig):string
    {
        return $twig->render('Dekoundgarten::Stylesheet');
    }
}