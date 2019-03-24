<?php
/**
 * User: PiushaKalyana
 * Date: 3/24/19
 * Time: 11:36 AM
 */

namespace App\Repository\RetentionCalculator;


use League\Flysystem\Exception;

class WeeklyRetentionCalculator implements RetentionCalculatorInterface
{

    private $retentionPerCohort  = [
        'total' => [],
        'retentions'=>[]
    ];

    private $completionSteps = [];

    public function __construct($completionSteps)
    {

        $this->completionSteps = $completionSteps;
    }

    public function calculate()
    {

        try{

            $weekData = [];
            $total = [];

            foreach($this->completionSteps as $entry){

                if (!isset($weekData[$entry->week_start])) {

                    $weekData[$entry->week_start] = [];

                }
                if (!isset($weekData[$entry->week_start][$entry->onboarding_perentage])) {

                    $weekData[$entry->week_start][$entry->onboarding_perentage] = 0;
                }

                if (!isset($total[$entry->week_start])) {

                    $total[$entry->week_start] = 0;
                }

                $weekData[$entry->week_start][$entry->onboarding_perentage] += $entry->percent;

                $total[$entry->week_start] += $entry->percent;

                $this->retentionPerCohort['total'] = $total;
                $this->retentionPerCohort['retentions'] = $weekData;


            }

            return $this;

        } catch(Exception $ex) {

            throw $ex;
        }

    }

    public function getTotalPercentagePerCohort()
    {

        return $this->retentionPerCohort['total'];
    }

    public function getRetentionsPerCohort()
    {

        return $this->retentionPerCohort['retentions'];
    }
}