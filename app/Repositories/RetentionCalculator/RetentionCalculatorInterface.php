<?php
/**
 * User: PiushaKalyana
 * Date: 3/24/19
 * Time: 11:23 AM
 */

namespace App\Repository\RetentionCalculator;


interface RetentionCalculatorInterface
{

    public function calculate();

    public function getTotalPercentagePerCohort();

    public function getRetentionsPerCohort();


}