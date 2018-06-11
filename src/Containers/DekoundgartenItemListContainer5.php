<?php

namespace Dekoundgarten\Containers;

use Plenty\Plugin\Templates\Twig;

class DekoundgartenItemListContainer5
{
    public function call(Twig $twig, $arg):string
    {
        return $twig->render('Dekoundgarten::Containers.ItemLists.ItemList5', ["item" => $arg[0]]);
    }
}