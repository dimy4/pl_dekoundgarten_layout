<?php

namespace Dekoundgarten\Containers;

use Plenty\Plugin\Templates\Twig;

class DekoundgartenItemListContainer4
{
    public function call(Twig $twig, $arg):string
    {
        return $twig->render('Dekoundgarten::Containers.ItemLists.ItemList3', ["item" => $arg[0]]);
    }
}