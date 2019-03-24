<?php

namespace App\Http\Controllers\Statistic;

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

            $onBoardings = $this->onBoarding->listCompletionSteps();

            $retentions = $this->onBoarding->getRetention($onBoardings);

            $retentionPercentage = $this->onBoarding->onBoardingFlowPercentage($retentions);


            $this->chart->setDataSet($retentionPercentage);
            $chartDataSet = $this->chart->getChartDataSet();

            return response()->json($chartDataSet,200);

        } catch (Exception $ex){

            return response()->json($ex->getMessage(),500);

        }


    }


}
