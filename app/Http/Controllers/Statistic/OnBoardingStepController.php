<?php

namespace App\Http\Controllers\Statistic;

use App\Model\UserOnBoarding;
use App\Repository\Chart\ChartInterface;
use App\Repository\OnBoard\OnBoardInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Flysystem\Exception;

class OnBoardingStepController extends Controller
{


    private $onBoarding = null;

    private $chart = null;

    public function __construct(OnBoardInterface $onBoarding, ChartInterface $chart)
    {

        $this->onBoarding = $onBoarding;

        $this->chart = $chart;
    }


    public function getCompletionSteps(Request $request)
    {

        try {


//            $onBoardings = $this->onBoarding->listCompletionSteps();
//
//            $this->chart->setDataSet($onBoardings);
//            $chartDataSet = $this->chart->getChartDataSet();

            return response()->json(200);

        } catch (Exception $ex){

            return response()->json($ex->getMessage(),500);

        }


    }


}
