<?php
/**
 * User: PiushaKalyana
 * Date: 3/24/19
 * Time: 1:02 PM
 */

namespace App\Repository\OnBoardingFlow;


interface OnBoardingFlowRetentionInterface
{

    /**
     * Set Retention data set
     * @param array $retentionDataSet
     * @return $this
     */
    public function setRetentionDataSet($retentionDataSet = []);

    /**
     * Calculate Retention percentage
     * @return mixed
     */
    public function calculatePercentage();

}