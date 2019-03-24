<?php
/**
 * User: PiushaKalyana
 * Date: 3/24/19
 * Time: 5:50 PM
 */

namespace App\Repository\OnBoardingFlow;


class JobExperienceRetention extends OnBoardingFlowRetention  implements OnBoardingFlowRetentionInterface
{


    protected $step = 'Experience in these job';

    private static $STEP_PERCENTAGE = 70;

    /**
     * Add Validation rules for on boarding process
     * @param $key
     * @return mixed
     */
    protected function validationRule($key)
    {
        return $key > JobExperienceRetention::$STEP_PERCENTAGE and $key <= 100;
    }

    /**
     * Set Retention data set
     * @param array $retentionDataSet
     * @return $this
     */
    public function setRetentionDataSet($retentionDataSet = [])
    {
        $this->retentionDataSet = $retentionDataSet;
        return $this;
    }

    /**
     * Calculate Retention percentage
     * @return mixed
     */
    public function calculatePercentage()
    {
        return $this->calculateFlowRetention()->toPercentage();
    }
}