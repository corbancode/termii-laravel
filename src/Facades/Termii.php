<?php

namespace Corbancode\TermiiLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Corbancode\TermiiLaravel\TermiiFactory sendMessage(string $to, string $from, string $sms, string $channel = "generic", ?array $media = null)
 * @method static \Corbancode\TermiiLaravel\TermiiFactory fetchSenderId()
 * @method static \Corbancode\TermiiLaravel\TermiiFactory requestSenderId(string $senderId, string $useCase, string $company)
 * @method static \Corbancode\TermiiLaravel\TermiiFactory sendBulkMessage(string $to, string $from, string $sms, string $channel = "generic")
 * @method static \Corbancode\TermiiLaravel\TermiiFactory sendNumberMessage(string $to, string $sms)
 * @method static \Corbancode\TermiiLaravel\TermiiFactory deviceTemplate(string $phoneNumber, string $deviceId, string $templateId, array $data)
 */
class Termii extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'termii';
    }
}
