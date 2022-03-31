<?php

namespace Corbancode\TermiiLaravel\Traits;

use Corbancode\TermiiLaravel\Enums\EndpointsEnum;
use Illuminate\Support\Facades\Http;

trait InsightsRequest
{

    /**
     * Returns your total balance and balance information from your wallet, such as currency.
     *
     * @return array
     */
    public function getBalance(): ? array
    {
        return Http::termii()
            ->get(EndpointsEnum::GET_BALANCE, [
                'api_key' => config('termii.api_key')
            ])->throw()->json();
    }

    /**
     * Verify phone numbers and automatically detect their status as well as current network
     * @param $phoneNumber
     *
     * @return array
     */
    public function search(string $phoneNumber): ? array
    {
        return Http::termii()
            ->get(EndpointsEnum::SEARCH, [
                'api_key' => config('termii.api_key'),
                'phone_number' => $phoneNumber
            ])->json();
    }

    /**
     * Detect if a number is fake or has ported to a new network.
     * @param $countryCode
     * @param $phoneNumber
     *
     * @return array
     */
    public function status(string $countryCode, string $phoneNumber): ? array
    {
        return Http::termii()
            ->get(EndpointsEnum::STATUS, [
                'api_key' => config('termii.api_key'),
                'country_code' => $countryCode,
                'phone_number' => $phoneNumber
            ])->json();
    }

    /**
     * Returns reports for messages sent across the sms, voice & whatsapp channels.
     *
     * @return array
     */
    public function history(): ? array
    {
        return Http::termii()
            ->get(EndpointsEnum::HISTORY, [
                'api_key' => config('termii.api_key')
            ])->throw()->json();
    }
}
