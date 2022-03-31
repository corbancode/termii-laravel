<?php

namespace Corbancode\TermiiLaravel;

use Corbancode\TermiiLaravel\Traits\InsightsRequest;
use Corbancode\TermiiLaravel\Traits\SwitchRequest;
use Corbancode\TermiiLaravel\Traits\TokenRequest;
class TermiiFactory
{
    use SwitchRequest, InsightsRequest, TokenRequest;
}
