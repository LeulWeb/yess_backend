<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Organizations extends Enum
{
    const OTHER = 'Other';
    const EducationalInstitutions= "Educational Institutions";
    const GovernmentOrganizations = 'Government Organizations';
    const NonprofitOrganizations = 'NonprofitOr ganizations';
    const HealthCareOrganizations = 'HealthCare Organizations';
    const ResearchInstitutions = 'Research Institutions';
    const Startups = 'Startups';
    const Corporations = 'Corporations';
    const SocialEnterprises = 'Social Enterprises';
}
