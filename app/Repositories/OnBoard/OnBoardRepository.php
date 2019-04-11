<?php
/**
 * User: PiushaKalyana
 * Date: 3/23/19
 * Time: 11:22 PM
 */

namespace App\Repository\OnBoard;

use App\Model\UserOnBoarding;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;

class OnBoardRepository implements OnBoardInterface
{

    private $onBoardings =[];

    /**
     * <p>
     * List On boarding completion steps cohort
     *
     *</p>
     * @return mixed|void
     * @throws Exception
     */
    public function listCompletionSteps()
    {
        try {

            return UserOnBoarding::totalOnBoardings()
                ->totalAccountCreation()
                ->totalActivatedAccount()
                ->totalProvideProfileInformation()
                ->totalInterestedJob()
                ->totalJobExperience()
                ->totalFreelancer()
                ->totalApproval()
                ->groupByWeek()
                ->get();

        } catch (Exception $ex) {

            throw $ex;
        }

    }


}
