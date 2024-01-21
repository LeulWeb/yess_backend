<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class EducationLevel extends Enum
{
    const PRIMARY_SCHOOL = 'primary school';
    const HIGHSCHOOL = 'high school';
    const   TVET  = 'TVET & Vocational Training';
    const ASSOCIATE_DEGREE = 'Associate Degree'; 
    const BACHELOR_DEGREE = 'Bachelor Degree';
    const MASTER_DEGREE = 'Master Degree';
    const OTHER = 'Other';

}
