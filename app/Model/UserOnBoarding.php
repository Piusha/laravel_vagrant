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


    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new OnBoardingRetentionScope());

    }

    public function scopeGroupByWeek($query)
    {
        $query->addSelect(\DB::raw('DATE_ADD(created_at, INTERVAL(2-DAYOFWEEK(created_at)) DAY) AS week_start'));
        $query->addSelect(\DB::raw('CONCAT(YEAR(created_at), "/", WEEK(created_at)) AS `week_name`'));
        $query->groupBy('week_name');

        return $query;
    }





}
