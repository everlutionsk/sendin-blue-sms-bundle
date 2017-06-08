<?php

declare(strict_types=1);

namespace Everlution\SendinBlueSmsBundle\Outbound\SmsSystem;

use Everlution\SendinBlueSmsBundle\Outbound\Model\OutboundSms;
use Everlution\SendinBlueSmsBundle\Outbound\Model\OutboundSmsTransformer;
use Sendinblue\Mailin;

/**
 * @author Martin Adamik <martin.adamik@everlution.sk>
 */
class SmsSystem
{
    /** @var Mailin */
    protected $mailin;

    /** @var SmsConverter */
    protected $smsConverter;

    /** @var OutboundSmsTransformer[] */
    protected $smsTransformers = [];

    /**
     * SmsSystem constructor.
     */
    public function __construct(
        $baseUrl,
        $apiKey,
        $timeout,
        SmsConverter $smsConverter
    ) {
        $this->mailin = new Mailin($baseUrl, $apiKey, $timeout);
        $this->smsConverter = $smsConverter;
    }

    /**
     * @param OutboundSmsTransformer $transformer
     */
    public function addSmsTransformer(OutboundSmsTransformer $transformer)
    {
        $this->smsTransformers[] = $transformer;
    }

    /**
     * @param OutboundSms $sms
     */
    protected function transformRawSms(OutboundSms &$sms)
    {
        foreach ($this->smsTransformers as $transformer) {
            $transformer->transform($sms);
        }
    }

    /**
     * @param OutboundSms $sms
     *
     * @return mixed
     */
    public function sendSms(OutboundSms $sms)
    {
        return $this->sendSmsToSendinBlue($sms);
    }

    /**
     * @param OutboundSms $sms
     *
     * @return mixed
     */
    protected function sendSmsToSendinBlue(OutboundSms $sms)
    {
        $this->transformRawSms($sms);
        $rawSms = $this->smsConverter->convertToRawSms($sms);

        $result = $this->sendRawSms($rawSms);

        return $result;
    }

    /**
     * @param $rawSms
     *
     * @return mixed
     *
     * @throws SmsSystemException
     */
    protected function sendRawSms($rawSms)
    {
        try {
            return $this->mailin->send_sms($rawSms);
        } catch (\Exception $e) {
            throw new SmsSystemException($e->getMessage());
        }
    }
}
