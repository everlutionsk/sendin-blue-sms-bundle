<?php

declare(strict_types=1);

namespace Everlution\SendinBlueSmsBundle;

use Everlution\SendinBlueSmsBundle\DependencyInjection\Compiler\SmsSystemCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @author Martin Adamik <martin.adamik@everlution.sk>
 */
class EverlutionSendinBlueSmsBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new SmsSystemCompilerPass());
    }
}
