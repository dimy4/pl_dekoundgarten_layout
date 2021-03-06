<?php

namespace Dekoundgarten\Containers;

use Plenty\Plugin\Templates\Twig;

class DekoundgartenItemListContainer6
{
    public function call(Twig $twig, $arg):string
    {
        return $twig->render('Dekoundgarten::Containers.ItemLists.ItemList6', ["item" => $arg[0]]);
    }
}