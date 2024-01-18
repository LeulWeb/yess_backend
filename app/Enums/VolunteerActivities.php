<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class VolunteerActivities extends Enum
{
    const CommunityDevelopment = "Community Development";
    const EducationAndTeaching = "Education and Teaching";
    const HealthcareAndMedicalServices = "Healthcare and Medical Services";
    const EnvironmentalConservation = "Environmental Conservation";
    const AgriculturalDevelopment = "Agricultural Development";
    const OrphanageAndChildcare = "Orphanage and Childcare";
    const WomensEmpowerment = "Women Empowerment";
    const YouthDevelopment = "Youth Development";
    const HumanRightsAndAdvocacy ="Human Rights and Advocacy";
    const HivAidsAwarenessAndSupport = "HIV/AIDS Awareness and Support";
    const EmergencyResponseAndDisasterRelief = "Emergency Response and Disaster Relief";
    const CulturalExchange = "Cultural Exchange";
    const TechnologyAndITSupport = "Technology and IT Support";
    const SportsAndRecreation = "Sports and Recreation";
    const MicrofinanceAndEntrepreneurship = "Microfinance and Entrepreneurship";
    const AnimalWelfare = "Animal Welfare";

    const OTHER = "Other";

}
