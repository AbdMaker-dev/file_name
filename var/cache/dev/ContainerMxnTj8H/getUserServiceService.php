<?php

namespace ContainerMxnTj8H;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUserServiceService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Services\UserService' shared autowired service.
     *
     * @return \App\Services\UserService
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Services/UserService.php';

        return $container->privates['App\\Services\\UserService'] = new \App\Services\UserService(($container->privates['App\\Repository\\ProfileRepository'] ?? $container->load('getProfileRepositoryService')), ($container->privates['App\\Repository\\UserRepository'] ?? $container->load('getUserRepositoryService')), ($container->services['serializer'] ?? $container->getSerializerService()), ($container->services['validator'] ?? $container->getValidatorService()), ($container->services['security.password_encoder'] ?? $container->load('getSecurity_PasswordEncoderService')));
    }
}