<?php

namespace Corbancode\TermiiLaravel\Enums;

class EndpointsEnum
{
    /**
     * SWITCH ENDPOINTS
     */
    const FETCH_SENDER_ID = 'api/sender-id';
    const REQUEST_SENDER_ID = 'api/sender-id/request';
    const SEND_MESSAGE = 'api/sms/send';
    const SEND_BULK_MESSAGE = 'api/sms/send/bulk';
    const SEND_NUMBER_MESSAGE = 'api/sms/number/send';
    const DEVICE_TEMPLATE = 'api/send/template';

    /**
     * TOKEN ENDPOINTS
     */
    const SEND_TOKEN = 'api/sms/otp/send';
    const VOICE_TOKEN = 'api/sms/otp/voice';
    const VOICE_CALL = 'api/sms/otp/call';
    const VERIFY_TOKEN = 'api/sms/otp/verify';
    const IN_APP_TOKEN = 'api/sms/otp/generate';

    /**
     * INSIGHTS ENDPOINTS
     */
    const GET_BALANCE = 'api/get-balance';
    const SEARCH = 'api/check/dnd';
    const STATUS = 'api/insight/number/query';
    const HISTORY = 'api/sms/inbox';
}
