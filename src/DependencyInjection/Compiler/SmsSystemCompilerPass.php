<?php

declare(strict_types=1);

namespace Everlution\SendinBlueSmsBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @author Martin Adamik <martin.adamik@everlution.sk>
 */
class SmsSystemCompilerPass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {
        $this->registerOutboundSmsTransformers($container, $container->getDefinition('everlution.sendin_blue_sms.sms_system'));
    }

    protected function registerOutboundSmsTransformers(ContainerBuilder $container, Definition $mailSystemServiceDefinition)
    {
        $transformerTag = 'everlution.sendin_blue_sms.outbound.sms_transformer';

        foreach ($container->findTaggedServiceIds($transformerTag) as $id => $attributes) {
            $mailSystemServiceDefinition->addMethodCall('addSmsTransformer', array(new Reference($id)));
        }
    }
}
