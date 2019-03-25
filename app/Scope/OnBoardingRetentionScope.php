<?php
/**
 * Created by PhpStorm.
 * User: Piusha Kalyana
 */

namespace App\Scope;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\DB;

class OnBoardingRetentionScope  implements Scope
{

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {

        $builder->addSelect(DB::raw('SUM(CASE WHEN onboarding_perentage <= 100 THEN 1 ELSE 0 END) AS Total'));
        $builder->addSelect(DB::raw('SUM(CASE WHEN onboarding_perentage > 0 AND onboarding_perentage <= 100 THEN 1 ELSE 0 END) CreateAccount'));
        $builder->addSelect(DB::raw('SUM(CASE WHEN onboarding_perentage > 20 AND onboarding_perentage <= 100 THEN 1 ELSE 0 END) ActivateAccount'));
        $builder->addSelect(DB::raw('SUM(CASE WHEN onboarding_perentage > 40 AND onboarding_perentage <= 100 THEN 1 ELSE 0 END) ProvideProfileInformation'));
        $builder->addSelect(DB::raw('SUM(CASE WHEN onboarding_perentage > 50 AND onboarding_perentage <= 100 THEN 1 ELSE 0 END) InterestedJob'));
        $builder->addSelect(DB::raw('SUM(CASE WHEN onboarding_perentage > 70 AND onboarding_perentage <= 100 THEN 1 ELSE 0 END) JobExperience'));
        $builder->addSelect(DB::raw('SUM(CASE WHEN onboarding_perentage > 90 AND onboarding_perentage <= 100 THEN 1 ELSE 0 END) AreYouFreelancer'));
        $builder->addSelect(DB::raw('SUM(CASE WHEN onboarding_perentage = 100 THEN 1 ELSE 0 END) Approval'));

        return $builder;
    }
}
