<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserAccessLevel extends Enum
{
    const Owner =   1;
    const Administrator =   2;
    const Subscriber =   3;
}
