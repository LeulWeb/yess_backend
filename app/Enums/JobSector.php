<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class JobSector extends Enum
{
    const IT = 'Information Technology';
    const HEALTHCARE = 'Healthcare';
    const FINANCE = 'Finance';
    const EDUCATION = 'Education';
    const MANUFACTURING = 'Manufacturing';
    const RETAIL = 'Retail';
    const HOSPITALITY = 'Hospitality';
    const MARKETING = 'Marketing';
    const ENGINEERING = 'Engineering';
    const GOVERNMENT = 'Government';
    const NON_PROFIT = 'Non-profit';
    const MEDIA_ENTERTAINMENT = 'Media and Entertainment';
    const TELECOMMUNICATIONS = 'Telecommunications';
    const CONSULTING = 'Consulting';
    const TRANSPORTATION_LOGISTICS = 'Transportation and Logistics';
    const CONSTRUCTION = 'Construction';
    const BIOTECHNOLOGY = 'Biotechnology';
    const ENERGY = 'Energy';
    const LEGAL = 'Legal';
    const AGRICULTURE = 'Agriculture';

    // You can also add a generic 'Other' category if needed
    const OTHER = 'Other';
}
