<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TrainingType extends Enum
{
    const OTHER = 'Other';
    const Impersonalskill= "Impersonal Skill";
    const Scholarship = 'Scholarship';
    const Employability = 'Employability';
    const Technicalskill = 'Technical skill';    
}
