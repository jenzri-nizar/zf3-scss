<?php
/**
 * Created by PhpStorm.
 * User: web
 * Date: 12/08/2016
 * Time: 16:32
 */

namespace Zf3\Scss;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\ModuleRouteListener;
class Module
{



    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $e->getApplication()->getServiceManager()->get('ViewHelperManager')->setAlias('headlink',\Zf3\Scss\View\Helper\headLink::class);
        $e->getApplication()->getServiceManager()->get('ViewHelperManager')->setAlias('headLink',\Zf3\Scss\View\Helper\headLink::class);
        $e->getApplication()->getServiceManager()->get('ViewHelperManager')->setAlias('HeadLink',\Zf3\Scss\View\Helper\headLink::class);

        $e->getApplication()->getServiceManager()->get('ViewHelperManager')->setFactory(\Scss\View\Helper\headLink::class, function ($sm) {
            $helper=new \Zf3\Scss\View\Helper\headLink();
            $basePath=$sm->get('ViewHelperManager')->get("BasePath");
            $helper->setBaseUrl($basePath());
            return $helper;
        });

       // echo get_class($e->getApplication()->getServiceManager()->get('ViewHelperManager')->get('HeadLink1'));

    }

    /*public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }*/
}