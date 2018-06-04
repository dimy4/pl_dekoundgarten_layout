<?php

namespace Dekoundgarten\Containers;

use Plenty\Plugin\Templates\Twig;

class DekoundgartenContainerJS
{
    public function call(Twig $twig):string
    {
        return $twig->render('Dekoundgarten::Script');
    }
}