<?php

namespace Corbancode\TermiiLaravel\Traits;

use Corbancode\TermiiLaravel\Enums\EndpointsEnum;
use Illuminate\Support\Facades\Http;

trait SwitchRequest
{
    /**
     * Retrieve the status of all registered sender ID.
     * Please refer to Termii's API documentation to see
     * a sample of the response payload.
     *
     * @return array
     */
    public function fetchSenderId(): ? array
    {
        return Http::termii()
            ->get(EndpointsEnum::FETCH_SENDER_ID, [
                'api_key' => config('termii.api_key')
            ])->throw()->json();
    }

    /**
     * Request registration of Sender ID
     * @param string $senderId
     * @param string $useCase
     * @param string $company
     *
     * @return array
     */
    public function requestSenderId(string $senderId, string $useCase, string $company): ? array
    {
        return Http::termii()
            ->post(EndpointsEnum::REQUEST_SENDER_ID, [
                'api_key' => config('termii.api_key'),
                'sender_id' => $senderId,
                'usecase' => $useCase,
                'company' => $company
            ])->throw()->json();
    }

    /**
     * Send a message
     * @param string $to
     * @param string $from
     * @param string $sms
     * @param string $channel
     * @param string|null $media
     *
     * @return array
     */
    public function sendMessage(string $to, string $from, string $sms, string $channel = "generic", ?array $media = null): ? array
    {
        $data = compact('to', 'from', 'sms', 'channel');
        if ($channel = 'whatsapp') {
            $data['media'] = $media;
        }

        return Http::termii()
            ->post(EndpointsEnum::SEND_MESSAGE, array_merge($data, [
                'api_key' => config('termii.api_key'),
                'type' => 'plain'
            ]))->throw()->json();
    }

    /**
     * Send bulk message
     * @param string $to
     * @param string $from
     * @param string $sms
     * @param string $channel
     *
     * @return array
     */
    public function sendBulkMessage(string $to, string $from, string $sms, string $channel = "generic"): ? array
    {
        $data = compact('to', 'from', 'sms', 'channel');

        return Http::termii()
            ->post(EndpointsEnum::SEND_BULK_MESSAGE, array_merge($data, [
                'api_key' => config('termii.api_key'),
                'type' => 'plain'
            ]))->throw()->json();
    }

    /**
     * Send number message
     * This API allows businesses send messages to customers using
     * Termii's auto-generated messaging numbers that adapt to customers location.
     * @param string $to
     * @param string $sms
     *
     * @return array
     */
    public function sendNumberMessage(string $to, string $sms): ? array
    {

        return Http::termii()
            ->post(EndpointsEnum::SEND_NUMBER_MESSAGE, [
                'api_key' => config('termii.api_key'),
                'to' => $to,
                'sms' => $sms
            ])->throw()->json();
    }

    /**
     * Device Template
     * Templates API helps businesses set a template for the one-time-passwords (pins) sent
     * to their customers via whatsapp or sms.
     * @param string $phoneNumber
     * @param string $deviceId
     * @param string $templateId
     * @param array $data
     *
     * @return array
     */
    public function deviceTemplate(string $phoneNumber, string $deviceId, string $templateId, array $data): ? array
    {

        return Http::termii()
            ->post(EndpointsEnum::DEVICE_TEMPLATE, [
                'api_key' => config('termii.api_key'),
                'phone_number' => $phoneNumber,
                'device_id' => $deviceId,
                'template_id' => $templateId,
                'data' => $data
            ])->throw()->json();
    }

    /**
     * TODO: Campaign API Endpoints
     */
}
