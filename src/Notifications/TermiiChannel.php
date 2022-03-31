<?php

namespace Corbancode\TermiiLaravel\Notifications;

use Corbancode\TermiiLaravel\Exceptions\CouldNotSendNotification;
use Corbancode\TermiiLaravel\Facades\Termii;
use Exception;
use Illuminate\Notifications\Notification;

class TermiiChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        if (!$to = $notifiable->routeNotificationFor('termii')) {
            throw CouldNotSendNotification::missingTo();
        }

        $message = $notification->toTermii($notifiable);

        if (is_string($message)) {
            $message = new TermiiMessage($message);
        }

        if (! $from = $message->from ?: config('termii.sms_from')) {
            throw CouldNotSendNotification::missingFrom();
        }

        $channel = ($message->channel ?? config('termii.sms_channel')) ?? "generic";
        try {
            $response = Termii::sendMessage($to, $from, trim($message->content), $channel);

            return $response;
        } catch (Exception $exception) {
            throw CouldNotSendNotification::serviceRespondedWithAnError($exception);
        }
    }
}
