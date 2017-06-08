<?php

declare(strict_types=1);

namespace Everlution\SendinBlueSmsBundle\Outbound\SmsSystem;

use Everlution\SendinBlueSmsBundle\Outbound\Model\OutboundSms;

/**
 * @author Martin Adamik <martin.adamik@everlution.sk>
 */
class SmsConverter
{
    /**
     * @param OutboundSms $sms
     *
     * @return array
     */
    public function convertToRawSms(OutboundSms $sms)
    {
        return [
            'to' => $sms->getTo(),
            'from' => $sms->getFrom(),
            'text' => $sms->getText(),
            'web_url' => $sms->getWebUrl(),
            'tag' => $sms->getTag(),
            'type' => $sms->getType(),
        ];
    }
}
