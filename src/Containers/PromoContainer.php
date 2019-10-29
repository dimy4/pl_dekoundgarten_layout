<?php

namespace Dekoundgarten\Containers;

use Plenty\Plugin\Templates\Twig;

class PromoContainer
{
    public function call(Twig $twig):string
    {
        return $twig->render('Dekoundgarten::Containers.PromoContainer');
    }
}