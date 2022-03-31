<?php

namespace Corbancode\TermiiLaravel\Exceptions;
use Exception;

class CouldNotSendNotification extends Exception
{
    public static function serviceRespondedWithAnError(Exception $exception)
    {
        return new static(
            "Service responded with an error '{$exception->getCode()}: {$exception->getMessage()}'");
    }

    /**
     * @return static
     */
    public static function missingFrom()
    {
        return new static('Notification was not sent. Missing `from` sender ID.');
    }

    /**
     * @return static
     */
    public static function missingTo()
    {
        return new static('Notification was not sent. Missing `to` number.');
    }
}
