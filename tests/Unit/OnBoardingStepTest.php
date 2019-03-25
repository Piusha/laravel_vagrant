<?php

namespace Tests\Unit;

use App\Repository\Chart\WeeklyRetentionChartRepository;
use App\Repository\OnBoard\OnBoardRepository;
use Tests\TestCase;

class OnBoardingStepTest extends TestCase
{
    /**
     * @throws \League\Flysystem\Exception
     */
    public function testCohortDataIsNotEmpty()
    {

        $onBoardingRepository = new OnBoardRepository();
        $onBoardingSteps = $onBoardingRepository->listCompletionSteps();

        $this->assertGreaterThan(0, $onBoardingSteps->count());

    }


    public function testChartSettingDataSetIsEmpty()
    {
        $onBoardingRepository = new OnBoardRepository();
        $onBoardingSteps = $onBoardingRepository->listCompletionSteps();



        $chartRepository = new WeeklyRetentionChartRepository();
        $chartRepository->setDataSet($onBoardingSteps);

        $this->assertGreaterThan(0, $chartRepository->getDataSet()->count());

    }





}
