<?php

declare(strict_types=1);

namespace Everlution\SendinBlueSmsBundle\Outbound\Model;

/**
 * @author Martin Adamik <martin.adamik@everlution.sk>
 */
interface OutboundSmsTransformer
{
    /**
     * @param OutboundSms $sms
     */
    public function transform(OutboundSms $sms);
}
