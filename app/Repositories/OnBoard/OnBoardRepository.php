<?php
/**
 * User: PiushaKalyana
 * Date: 3/23/19
 * Time: 11:22 PM
 */

namespace App\Repository\OnBoard;




use App\Model\UserOnBoarding;
use App\Repository\RetentionCalculator\WeeklyRetentionCalculator;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;

class OnBoardRepository implements OnBoardInterface
{



    /**
     * <p>
     * List On boarding completion steps cohort
     *</p>
     * @return mixed|void
     * @throws Exception
     */
    public function listCompletionSteps()
    {
        try {

            $onBoardings = UserOnBoarding::select([
                    \DB::raw('DATE_ADD(created_at, INTERVAL(2-DAYOFWEEK(created_at)) DAY) AS week_start'),
                    \DB::raw('CONCAT(YEAR(created_at), "/", WEEK(created_at)) AS `week_name` '),
                    \DB::raw('COUNT(`onboarding_perentage`) as `percent`'),
                    'onboarding_perentage',
                    'created_at'
                ])
                ->groupBy('week_start')
                ->groupBy('onboarding_perentage')
                ->groupBy('created_at')
                ->orderBy(DB::raw('YEAR(created_at)'),'ASC')
                ->orderBy(DB::raw('WEEK(created_at)'),'ASC')
                ->get();

            return $onBoardings;

        } catch (Exception $ex) {

            throw $ex;
        }

    }


    /**
     * @param array $onBoardings
     * @param string $period
     * @return mixed
     * @throws Exception
     */
    public function getRetention($onBoardings = [], $period = 'W')
    {
        try {


            $weeklyRetention = new WeeklyRetentionCalculator($onBoardings);
            $calculatedWeeklyRetentions = $weeklyRetention->calculate();

            return [
                'total' => $calculatedWeeklyRetentions->getTotalPercentagePerCohort(),
                'retentions' => $calculatedWeeklyRetentions->getRetentionsPerCohort()
            ];


        }catch (Exception $ex) {

            throw $ex;
        }

    }

    /**
     * @param array $retention
     * @return mixed
     * @throws Exception
     */
    public function onBoardingFlowPercentage($retention = [])
    {
        try {

            $stepRetentionClasses = [
                'CreateAccountRetention',
                'ActivateAccountRetention',
                'ProvideProfileInformationRetention',
                'InterestedJobRetention',
                'JobExperienceRetention',
                'AreYouFreelancerRetention',
                'WaitingForApprovalRetention',
                'ApprovalRetention'

            ];

            return $this->onBoardingStepRetentionClassLoader($stepRetentionClasses, $retention);

        }catch (Exception $ex) {

            throw $ex;
        }
    }

    private function onBoardingStepRetentionClassLoader($stepRetentionClasses, $retention)
    {
        $out = [];
        foreach ($stepRetentionClasses as $class) {

            $class = '\\App\Repository\\OnBoardingFlow\\'.$class;

            $stepClass = new $class;

            $stepPercentage = $stepClass->setRetentionDataSet($retention)->calculatePercentage();

            $out = array_merge( $out, $stepPercentage);

        }

        return $out;


    }
}