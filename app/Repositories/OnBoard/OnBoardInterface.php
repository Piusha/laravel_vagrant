<?php
/**
 * User: PiushaKalyana
 * Date: 3/23/19
 * Time: 11:15 PM
 */

namespace App\Repository\OnBoard;


interface OnBoardInterface
{


    /**
     * <p>
     * List On boarding completion steps
     *</p>
     * @return mixed
     */
    public function listCompletionSteps();


    /**
     * @param string $period
     * @param array $onBoardings
     * @return mixed
     */
    public function getRetention($onBoardings = [], $period = 'W' );

    /**
     * @param array $retention
     * @return mixed
     */
    public function onBoardingFlowPercentage($retention = []);

}