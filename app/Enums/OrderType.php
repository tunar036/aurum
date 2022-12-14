<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderType extends Enum
{
    const PENDING = 1;
    const APPROVED = 2;
    const CANCELLED = 3;
    const FAILED  = 4;
}
