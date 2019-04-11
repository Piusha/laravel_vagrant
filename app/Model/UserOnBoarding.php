<?php

namespace App\Model;

use App\Scope\OnBoardingRetentionScope;
use App\Scope\CreateAccountRetentionScope;
use Illuminate\Database\Eloquent\Model;

class UserOnBoarding extends Model
{
    //

    protected $table = 'user_onboardings';

    public $timestamps = false;

    public function scopeGroupByWeek($query)
    {
        // $query->addSelect(\DB::raw('DATE_ADD(created_at, INTERVAL(2-DAYOFWEEK(created_at)) DAY) AS week_start'));
        $query->addSelect(\DB::raw('CONCAT(YEAR(user_onboardings.created_at), "/", WEEK(user_onboardings.created_at)) AS `week_name`'));
        $query->groupBy('week_name');

        return $query;
    }

    public function scopeTotalOnBoardings($query) {

        $query->addSelect(\DB::raw('SUM(CASE WHEN user_onboardings.onboarding_perentage <= 100 THEN 1 ELSE 0 END) AS Total'));
        return $query;
    }

    public function scopeTotalAccountCreation($query) {

        $query->addSelect(\DB::raw('SUM(CASE WHEN onboarding_perentage > 0 AND onboarding_perentage <= 100 THEN 1 ELSE 0 END) CreateAccount'));
        return $query;
    }

    public function scopeTotalActivatedAccount($query) {

        $query->addSelect(\DB::raw('SUM(CASE WHEN onboarding_perentage > 20 AND onboarding_perentage <= 100 THEN 1 ELSE 0 END) ActivateAccount'));
        return $query;
    }
    public function scopeTotalProvideProfileInformation($query) {

        $query->addSelect(\DB::raw('SUM(CASE WHEN onboarding_perentage > 40 AND onboarding_perentage <= 100 THEN 1 ELSE 0 END) ProvideProfileInformation'));
        return $query;
    }
    public function scopeTotalInterestedJob($query) {

        $query->addSelect(\DB::raw('SUM(CASE WHEN onboarding_perentage > 50 AND onboarding_perentage <= 100 THEN 1 ELSE 0 END) InterestedJob'));
        return $query;
    }
    public function scopeTotalJobExperience($query) {

        $query->addSelect(\DB::raw('SUM(CASE WHEN onboarding_perentage > 70 AND onboarding_perentage <= 100 THEN 1 ELSE 0 END) JobExperience'));
        return $query;
    }
    public function scopeTotalFreelancer($query) {

        $query->addSelect(\DB::raw('SUM(CASE WHEN onboarding_perentage > 90 AND onboarding_perentage <= 100 THEN 1 ELSE 0 END) AreYouFreelancer'));
        return $query;
    }
    public function scopeTotalApproval($query) {

        $query->addSelect(\DB::raw('SUM(CASE WHEN onboarding_perentage = 100 THEN 1 ELSE 0 END) Approval'));
        return $query;
    }


}
