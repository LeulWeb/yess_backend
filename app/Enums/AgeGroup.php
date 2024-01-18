<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class AgeGroup extends Enum
{
    const Child = 'Child'; // 0-12 years old
    const Teenager = 'Teenager'; // 13-19 years old
    const Adult = 'Adult'; // 20-59 years old
    const Elder = 'Elder'; // 60+
    const NOT_FOR_PEOPLES = 'Not for peoples';
}
