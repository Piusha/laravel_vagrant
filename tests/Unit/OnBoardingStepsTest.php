<?php

namespace Tests\Unit;

use App\Model\UserOnBoarding;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OnBoardingStepsTest extends TestCase
{

   // use DatabaseMigrations;

    private  $dbDataSetToBeInserted = [
        [
            'user_id'=>3121,
            'created_at'=> '2016-07-19',
            'onboarding_perentage' => 40,
            'count_applications' => 0,
            'count_accepted_application'=>0
        ],
        ['user_id'=>3122,'created_at'=> '2016-07-19', 'onboarding_perentage' => 40, 'count_applications' => 0, 'count_accepted_application'=>0],
        ['user_id'=>3123,'created_at'=> '2016-07-19', 'onboarding_perentage' => 40, 'count_applications' => 0, 'count_accepted_application'=>0],
        ['user_id'=>3124,'created_at'=> '2016-07-19', 'onboarding_perentage' => 100, 'count_applications' => 0, 'count_accepted_application'=>0],
        ['user_id'=>3126,'created_at'=> '2016-07-20', 'onboarding_perentage' => 100, 'count_applications' => 0, 'count_accepted_application'=>0],
        ['user_id'=>3127,'created_at'=> '2016-07-20', 'onboarding_perentage' => 40, 'count_applications' => 0, 'count_accepted_application'=>0],
    ];

    private $onBoardingData = [];

    public function setUp(): void
    {
        parent::setUp();

        // $this->onBoardingData = UserOnBoarding::insert($this->dbDataSetToBeInserted);
    }

    public function testDataSetInsertedToTestDataBase()
    {

        $expected = 40;

        $foundData = UserOnBoarding::where('user_id',3121)->first();

        $this->assertEquals($expected, $foundData->onboarding_perentage);

    }

    public function testTotalOnBoardingCountInDataSet()
    {

        $totalOnBoardings = UserOnBoarding::totalOnBoardings()->groupByWeek()->get();

        $expected = 47;

        $this->assertEquals($expected, $totalOnBoardings[0]->Total);

    }

    public function testTotalAccountCreation()
    {
        $totalOnBoardings = UserOnBoarding::totalAccountCreation()->groupByWeek()->get();

        $expected = 47;

        $this->assertEquals($expected, $totalOnBoardings[0]->CreateAccount);
    }


    public function testTotalActivatedAccount()
    {
        $totalOnBoardings = UserOnBoarding::totalActivatedAccount()->groupByWeek()->get();

        $expected = 47;

        $this->assertEquals($expected, $totalOnBoardings[0]->ActivateAccount);
    }

    public function testTotalProvideProfileInformation()
    {
        $totalOnBoardings = UserOnBoarding::totalProvideProfileInformation()->groupByWeek()->get();

        $expected = 19;

        $this->assertEquals($expected, $totalOnBoardings[0]->ProvideProfileInformation);
    }

    public function testTotalInterestedJob()
    {
        $totalOnBoardings = UserOnBoarding::totalInterestedJob()->groupByWeek()->get();

        $expected = 17;

        $this->assertEquals($expected, $totalOnBoardings[0]->InterestedJob);
    }

    public function testTotalJobExperience()
    {
        $totalOnBoardings = UserOnBoarding::totalJobExperience()->groupByWeek()->get();

        $expected = 17;

        $this->assertEquals($expected, $totalOnBoardings[0]->JobExperience);
    }

    public function testTotalFreelancer()
    {
        $totalOnBoardings = UserOnBoarding::totalFreelancer()->groupByWeek()->get();

        $expected = 17;

        $this->assertEquals($expected, $totalOnBoardings[0]->AreYouFreelancer);
    }

    public function testTotalApproval()
    {
        $totalOnBoardings = UserOnBoarding::totalApproval()->groupByWeek()->get();

        $expected = 13;

        $this->assertEquals($expected, $totalOnBoardings[0]->Approval);
    }


}
