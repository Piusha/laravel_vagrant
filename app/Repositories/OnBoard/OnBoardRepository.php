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

            return UserOnBoarding::groupByWeek()
                ->orderBy(DB::raw('YEAR(created_at)'),'ASC')
                ->orderBy(DB::raw('WEEK(created_at)'),'ASC')
                ->get();

        } catch (Exception $ex) {

            throw $ex;
        }

    }


}
