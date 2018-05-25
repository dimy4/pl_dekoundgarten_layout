<?php

namespace Dekoundgarten\Containers;

use Plenty\Plugin\Templates\Twig;

class DekoundgartenItemListContainer1
{
    public function call(Twig $twig, $arg):string
    {
        return $twig->render('Dekoundgarten::Containers.ItemLists.ItemList1', ["item" => $arg[0]]);
    }
}