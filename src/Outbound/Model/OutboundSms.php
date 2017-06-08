<?php

declare(strict_types=1);

namespace Everlution\SendinBlueSmsBundle\Outbound\Model;

/**
 * @author Martin Adamik <martin.adamik@everlution.sk>
 */
class OutboundSms
{
    /**
     * The mobile number to send SMS to with country code [Mandatory].
     *
     * @var string
     */
    protected $to;

    /**
     * The name of the sender. The number of characters is limited to 11 ( alphanumeric format ) [Mandatory].
     *
     * @var string
     */
    protected $from;

    /**
     * The text of the message. The maximum characters used per SMS is 160, if used more than that, it will be counted as more than one SMS [Mandatory].
     *
     * @var string
     */
    protected $text;

    /**
     * The web URL that can be called once the message is successfully delivered [Optional].
     In web_url, we are sending the content using POST method, example: {“status”:”OK”,”number_sent”:1,”to”:”00331234567890″,”sms_count”:1,”credits_used”:1,”remaining_credit”:55,”reference”:{“1″:”a1bcdefghij0klmnopq”}}
     *
     * @var string
     */
    protected $webUrl;

    /**
     * The tag that you can associate with the message [Optional].
     *
     * @var string
     */
    protected $tag;

    /**
     * Type of message. Possible values – marketing (default) & transactional [Optional].
     It is recommended to use ‘transactional’ type for sending transactional SMS and ‘marketing’ type for sending marketing SMS.
     *
     * @var string
     */
    protected $type;

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param string $to
     *
     * @return OutboundSms
     */
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $from
     *
     * @return OutboundSms
     */
    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return OutboundSms
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string
     */
    public function getWebUrl()
    {
        return $this->webUrl;
    }

    /**
     * @param string $webUrl
     *
     * @return OutboundSms
     */
    public function setWebUrl($webUrl)
    {
        $this->webUrl = $webUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param string $tag
     *
     * @return OutboundSms
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return OutboundSms
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}
