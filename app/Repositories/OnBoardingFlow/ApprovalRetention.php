<?php
/**
 * User: PiushaKalyana
 * Date: 3/24/19
 * Time: 5:50 PM
 */

namespace App\Repository\OnBoardingFlow;


class ApprovalRetention extends OnBoardingFlowRetention  implements OnBoardingFlowRetentionInterface
{


    protected $step = 'Approval';

    private static $STEP_PERCENTAGE = 100;

    /**
     * Add Validation rules for on boarding process
     * @param $key
     * @return mixed
     */
    protected function validationRule($key)
    {
        return $key === ApprovalRetention::$STEP_PERCENTAGE;
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