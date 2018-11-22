<?php

namespace Dekoundgarten\Containers;

use Plenty\Plugin\Templates\Twig;

class CheckoutBeforeShippingProfileListContainer
{
    public function call(Twig $twig):string
    {
        return $twig->render('Dekoundgarten::Checkout.CheckoutBeforeShippingProfileList');
    }
}