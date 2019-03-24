<?php
/**
 * User: PiushaKalyana
 * Date: 3/24/19
 * Time: 1:04 PM
 */

namespace App\Repository\OnBoardingFlow;


use League\Flysystem\Exception;

class CreateAccountRetention extends OnBoardingFlowRetention implements OnBoardingFlowRetentionInterface
{


    protected $step = 'Create account';

    private static $STEP_PERCENTAGE = 0;

    public function calculatePercentage()
    {

        return $this->calculateFlowRetention()->toPercentage();

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
     * Add Validation rules for on boarding process
     * @param $key
     * @return mixed
     */
    protected function validationRule($key)
    {
        return $key > CreateAccountRetention::$STEP_PERCENTAGE and $key <= 100;
    }
}