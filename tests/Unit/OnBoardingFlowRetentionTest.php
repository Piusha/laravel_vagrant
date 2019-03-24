<?php

namespace Tests\Unit;

use App\Repository\OnBoardingFlow\CreateAccountRetention;
use Tests\TestCase;
use App\Repository\OnBoard\OnBoardRepository;

class OnBoardingFlowRetentionTest extends TestCase
{


    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreateAccountRetentionKeysAreExist()
    {

        $onBoardingRepository = new OnBoardRepository();
        $onBoardingSteps = $onBoardingRepository->listCompletionSteps();

        $retention = $onBoardingRepository->getRetention($onBoardingSteps);

        $createAccountRetention = new CreateAccountRetention();
        $createAccountRetentionPercentage = $createAccountRetention->setRetentionDataSet($retention)->calculatePercentage();

        foreach($createAccountRetentionPercentage as $percentage) {

            $this->assertArrayHasKey('step',$percentage);
            $this->assertArrayHasKey('retention',$percentage);
            $this->assertArrayHasKey('week_start',$percentage);
            $this->assertArrayHasKey('percentage',$percentage);
        }

    }

    public function testAllOnBoardingStepRetentionsKeyExist()
    {

        $onBoardingRepository = new OnBoardRepository();
        $onBoardingSteps = $onBoardingRepository->listCompletionSteps();

        $retention = $onBoardingRepository->getRetention($onBoardingSteps);

        $retentionPercentage = $onBoardingRepository->onBoardingFlowPercentage($retention);

        foreach($retentionPercentage as $percentage) {

            $this->assertArrayHasKey('step',$percentage);
            $this->assertArrayHasKey('retention',$percentage);
            $this->assertArrayHasKey('week_start',$percentage);
            $this->assertArrayHasKey('percentage',$percentage);
        }

    }



}
