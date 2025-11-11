<?php

namespace App;

use Carbon\Carbon;

enum PaymentMethodType
{
    case Subscription;
    case Card;
}

class PaymentMethod
{
    public ?PaymentMethodType $type;
    public ?int $sessions_left;
    public Carbon $valid_until;

    public function __construct(?PaymentMethodType $type, ?int $sessions_left, Carbon $valid_until) {
        $this->type = $type;
        $this->sessions_left = $sessions_left;
        $this->valid_until = $valid_until;
    }
}