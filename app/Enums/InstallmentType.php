<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class InstallmentType extends Enum
{
    const BIRKART  = 1;
    const ALBALIKART = 2;
    const TAMKART = 3;
}
