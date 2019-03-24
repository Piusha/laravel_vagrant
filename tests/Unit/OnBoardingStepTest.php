<?php

namespace Tests\Unit;

use App\Repository\OnBoard\OnBoardRepository;
use Tests\TestCase;

class OnBoardingStepTest extends TestCase
{
    /**
     * Test list of completion steps per cohort
     *
     * @return void
     */
    public function testCohortDataIsNotEmpty()
    {

        $onBoardingRepository = new OnBoardRepository();
        $onBoardingSteps = $onBoardingRepository->listCompletionSteps();

        $this->assertGreaterThan(0, $onBoardingSteps->count());

    }


}
