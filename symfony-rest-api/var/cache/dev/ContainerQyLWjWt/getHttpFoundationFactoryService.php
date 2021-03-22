<?php

namespace ContainerQyLWjWt;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getHttpFoundationFactoryService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory' shared autowired service.
     *
     * @return \Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/psr-http-message-bridge/HttpFoundationFactoryInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/psr-http-message-bridge/Factory/HttpFoundationFactory.php';

        return $container->privates['Symfony\\Bridge\\PsrHttpMessage\\Factory\\HttpFoundationFactory'] = new \Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory();
    }
}
