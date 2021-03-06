<?php

namespace Container7RmQOWM;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_XduXCoHService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.xduXCoH' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.xduXCoH'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'em' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'repo_forma' => ['privates', 'App\\Repository\\FormateurRepository', 'getFormateurRepositoryService', true],
            'repo_promo' => ['privates', 'App\\Repository\\PromoRepository', 'getPromoRepositoryService', true],
        ], [
            'em' => '?',
            'repo_forma' => 'App\\Repository\\FormateurRepository',
            'repo_promo' => 'App\\Repository\\PromoRepository',
        ]);
    }
}
