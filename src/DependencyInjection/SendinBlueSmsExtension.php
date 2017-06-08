<?php

declare(strict_types=1);

namespace Everlution\SendinBlueSmsBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * @author Martin Adamik <martin.adamik@everlution.sk>
 */
class SendinBlueSmsExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('everlution.sendin_blue_sms.api_key', $config['api_key']);
        $container->setParameter('everlution.sendin_blue_sms.base_url', $config['base_url']);
        $container->setParameter('everlution.sendin_blue_sms.timeout', $config['timeout']);
        $container->setParameter('everlution.sendin_blue_sms.from_name', $config['from_name']);
        $container->setParameter('everlution.sendin_blue_sms.web_url', $config['web_url']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
