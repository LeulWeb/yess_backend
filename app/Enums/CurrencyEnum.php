<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CurrencyEnum extends Enum
{


    /** United States Dollar */
    const USD = 'usd';

    /** Euro */
    const EUR = 'eur';

    /** British Pound Sterling */
    const GBP = 'gbp';

    /** Japanese Yen */
    const JPY = 'jpy';

    /** Indian Rupee */
    const INR = 'inr';

    /** Ethiopian Birr */
    const ETB = 'etb';
}
