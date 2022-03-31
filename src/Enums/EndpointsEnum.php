<?php

namespace Corbancode\TermiiLaravel\Enums;

class EndpointsEnum
{
    const FETCH_SENDER_ID = 'api/sender-id';
    const REQUEST_SENDER_ID = 'api/sender-id/request';
    const SEND_MESSAGE = 'api/sms/send';
    const SEND_BULK_MESSAGE = 'api/sms/send/bulk';
    const SEND_NUMBER_MESSAGE = 'api/sms/number/send';
    const DEVICE_TEMPLATE = 'api/send/template';
}
