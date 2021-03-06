<?php

namespace Dekoundgarten\Providers;

use Ceres\Caching\NavigationCacheSettings;
use Ceres\Caching\SideNavigationCacheSettings;
use IO\Services\ContentCaching\Services\Container;
use IO\Services\ItemSearch\Helper\ResultFieldTemplate;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Events\Dispatcher;
use Plenty\Plugin\Templates\Twig;
use IO\Helper\TemplateContainer;
use IO\Extensions\Functions\Partial;
use Plenty\Plugin\ConfigRepository;


/**
 * Class DekoundgartenServiceProvider
 * @package Dekoundgarten\Providers
 */
class DekoundgartenServiceProvider extends ServiceProvider
{
    const PRIORITY = 0;

    public function register()
    {

    }

    public function boot(Twig $twig, Dispatcher $dispatcher, ConfigRepository $config)
    {
        $dispatcher->listen('IO.init.templates', function (Partial $partial)
        {
            pluginApp(Container::class)->register('Dekoundgarten::PageDesign.Partials.Header.NavigationList.twig', NavigationCacheSettings::class);
            pluginApp(Container::class)->register('Dekoundgarten::PageDesign.Partials.Header.SideNavigation.twig', SideNavigationCacheSettings::class);

            $partial->set('head', 'Ceres::PageDesign.Partials.Head');
            $partial->set('header', 'Ceres::PageDesign.Partials.Header.Header');
            $partial->set('page-design', 'Ceres::PageDesign.PageDesign');
            $partial->set('footer', 'Ceres::PageDesign.Partials.Footer');

            $partial->set('header', 'Dekoundgarten::PageDesign.Partials.Header.Header');
            $partial->set('page-design', 'Dekoundgarten::PageDesign.PageDesign');
            $partial->set('footer', 'Dekoundgarten::PageDesign.Partials.Footer');

            return false;
        }, self::PRIORITY);

        $dispatcher->listen('IO.tpl.home', function (TemplateContainer $container)
        {
            $container->setTemplate('Dekoundgarten::Homepage.Homepage');
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
            $container->setTemplate('Dekoundgarten::ItemList.ItemListView');
            return false;
        }, self::PRIORITY);

        $dispatcher->listen('IO.ResultFields.*', function(ResultFieldTemplate $templateContainer) {
            $templateContainer->setTemplates([
                ResultFieldTemplate::TEMPLATE_LIST_ITEM => 'Dekoundgarten::ResultFields.ListItem',
                ResultFieldTemplate::TEMPLATE_SINGLE_ITEM   => 'Dekoundgarten::ResultFields.SingleItem',
            ]);
        }, self::PRIORITY);
    }
}

