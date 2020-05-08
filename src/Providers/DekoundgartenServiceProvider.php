<?php

namespace Dekoundgarten\Providers;

use Plenty\Modules\Webshop\ItemSearch\Helpers\ResultFieldTemplate;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\Templates\Twig;
use IO\Helper\TemplateContainer;
use IO\Helper\ResourceContainer;
use IO\Extensions\Functions\Partial;
use Plenty\Plugin\ConfigRepository;

class DekoundgartenServiceProvider extends ServiceProvider
{
    const PRIORITY = 0;

    public function register()
    {

    }

    public function boot(Twig $twig, Dispatcher $dispatcher, ConfigRepository $config)
    {
        $dispatcher->listen('IO.Resources.Import', function (ResourceContainer $container) {
            $container->addStyleTemplate('Dekoundgarten::Stylesheet');
            $container->addScriptTemplate('Dekoundgarten::Script');
        }, self::PRIORITY);

        $dispatcher->listen('IO.init.templates', function (Partial $partial)
        {
            $partial->set('head', 'Ceres::PageDesign.Partials.Head');
            $partial->set('header', 'Dekoundgarten::PageDesign.Partials.Header.Header');
            $partial->set('page-design', 'Ceres::PageDesign.PageDesign');
            $partial->set('footer', 'Dekoundgarten::PageDesign.Partials.Footer');
            $partial->set('page-metadata', 'Ceres::PageDesign.Partials.PageMetadata');

            return false;
        }, self::PRIORITY);

        $dispatcher->listen('IO.tpl.item', function (TemplateContainer $container)
        {
            $container->setTemplate('Dekoundgarten::Item.SingleItemWrapper');
            return false;
        }, self::PRIORITY);

        $dispatcher->listen('IO.tpl.category.item', function (TemplateContainer $container)
        {
            $container->setTemplate('Dekoundgarten::Category.Item.CategoryItem');
            return false;
        }, self::PRIORITY);
        $dispatcher->listen('IO.tpl.search', function (TemplateContainer $container)
        {
            $container->setTemplate('Dekoundgarten::Category.Item.CategoryItem');
            return false;
        }, self::PRIORITY);
        $dispatcher->listen('IO.tpl.tags', function (TemplateContainer $container)
        {
            $container->setTemplate('Dekoundgarten::Category.Item.CategoryItem');
        }, self::PRIORITY);

        $resultFieldTemplate = pluginApp(ResultFieldTemplate::class);
        $resultFieldTemplate->setTemplate(ResultFieldTemplate::TEMPLATE_LIST_ITEM , 'Dekoundgarten::ResultFields.ListItem');
        $resultFieldTemplate->setTemplate(ResultFieldTemplate::TEMPLATE_SINGLE_ITEM , 'Dekoundgarten::ResultFields.SingleItem');
    }
}

