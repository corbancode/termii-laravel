<?php

namespace Corbancode\TermiiLaravel\Traits;

use Corbancode\TermiiLaravel\Enums\EndpointsEnum;
use Illuminate\Support\Facades\Http;

trait TokenRequest
{
    /**
     * Trigger one-time-passwords (OTP) across any available messaging channel.
     * @param array $data
     *
     * @return array
     */
    public function sendToken(array $data): ? array
    {
        return Http::termii()
            ->post(EndpointsEnum::SEND_TOKEN, array_merge($data, [
                'api_key' => config('termii.api_key')
            ]))->throw()->json();
    }

    /**
     * Trigger one-time-passwords (OTP) through the voice channel to a phone number.
     * @param array $data
     *
     * @return array
     */
    public function voiceToken(array $data): ? array
    {
        return Http::termii()
            ->post(EndpointsEnum::VOICE_TOKEN, array_merge($data, [
                'api_key' => config('termii.api_key')
            ]))->throw()->json();
    }

    /**
     * Send messages through voice channel to a phone number.
     * @param string $phoneNumber
     * @param string $code
     *
     * @return array
     */
    public function voiceCall(string $phoneNumber, string $code): ? array
    {
        return Http::termii()
            ->post(EndpointsEnum::VOICE_CALL, [
                'api_key' => config('termii.api_key'),
                'phone_number' => $phoneNumber,
                'code' => $code
            ])->throw()->json();
    }

    /**
     * Checks tokens sent to customers and returns a response confirming the status of the token.
     * @param string $pinId
     * @param string $pin
     *
     * @return array
     */
    public function verifyToken(string $pinId, string $pin): ? array
    {
        return Http::termii()
            ->post(EndpointsEnum::VERIFY_TOKEN, [
                'api_key' => config('termii.api_key'),
                'pin_id' => $pinId,
                'pin' => $pin
            ])->throw()->json();
    }

    /**
     * This API returns OTP codes in JSON format which can be used within any web or mobile app.
     * @param array $data
     *
     * @return array
     */
    public function inAppToken(array $data): ? array
    {
        return Http::termii()
            ->post(EndpointsEnum::IN_APP_TOKEN, array_merge($data, [
                'api_key' => config('termii.api_key')
            ]))->throw()->json();
    }
}
