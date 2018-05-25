<?php

namespace Dekoundgarten\Containers;

use Plenty\Plugin\Templates\Twig;

class DekoundgartenItemListContainer2
{
    public function call(Twig $twig, $arg):string
    {
        return $twig->render('Dekoundgarten::Containers.ItemLists.ItemList2', ["item" => $arg[0]]);
    }
}