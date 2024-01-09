<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class JobSchedule extends Enum
{
    const FULLTIME = 'full time';
    const PART_TIME = 'part time';
    const CONTRACT = 'contract';
    const INTERNSHIP = 'internship';
    const TEMPORARY = 'temporary';
    const FREELANCE = 'freelance';
}
