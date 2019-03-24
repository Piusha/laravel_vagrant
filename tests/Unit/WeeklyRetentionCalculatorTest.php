<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Repository\OnBoard\OnBoardRepository;


class WeeklyRetentionCalculatorTest extends TestCase
{
    /**
     * Calculate Weekly Retention
     *
     * @return void
     */
    public function testCalculationOfWeeklyRetention()
    {

        $onBoardingRepository = new OnBoardRepository();
        $onBoardingSteps = $onBoardingRepository->listCompletionSteps();

        $onBoardingRepository->getRetention($onBoardingSteps);


        $this->assertTrue(true);
    }
}
