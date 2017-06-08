<?php

declare(strict_types=1);

namespace Everlution\SendinBlueSmsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Martin Adamik <martin.adamik@everlution.sk>
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('everlution_sendin_blue_sms');

        $rootNode
            ->children()
                ->scalarNode('api_key')
                    ->isRequired()
                    ->info('SendinBlue API key.')
                ->end()
                ->scalarNode('base_url')
                    ->defaultValue('https://api.sendinblue.com/v2.0')
                    ->info('SendinBlue API base url')
                ->end()
                ->scalarNode('timeout')
                    ->defaultValue('')
                    ->info('SendinBlue API timeout.')
                ->end()
                ->scalarNode('from_name')
                    ->defaultValue('')
                    ->info('The name of the sender. The number of characters is limited to 11 (alphanumeric format)')
                ->end()
                ->scalarNode('web_url')
                    ->defaultValue('')
                    ->info('SendinBlue API timeout.')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
