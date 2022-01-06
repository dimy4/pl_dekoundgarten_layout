<?php

namespace Dekoundgarten\Widgets;

use Dekoundgarten\Widgets\Header\NavigationWidget;


class WidgetCollection
{
    const HEADER_WIDGETS = [
        NavigationWidget::class,
    ];

    public static function all()
    {
        return array_merge(
            self::HEADER_WIDGETS
        );
    }

}
