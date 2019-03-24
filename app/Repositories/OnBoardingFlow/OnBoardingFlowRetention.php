<?php
/**
 * User: PiushaKalyana
 * Date: 3/24/19
 * Time: 4:23 PM
 */

namespace App\Repository\OnBoardingFlow;


abstract class OnBoardingFlowRetention
{

    protected $retentionDataSet = [];

    protected $step =  null;

    private $formattedDataSet = [];

    /**
     * Add Validation rules for on boarding process
     * @param $key
     * @return mixed
     */
    abstract protected function validationRule($key);


    protected function calculateFlowRetention()
    {
        try{


            $retentions = $this->retentionDataSet['retentions'];


            foreach($retentions as $week_start => $onBoardingPercentages) {


                $this->formattedDataSet[$week_start]= [
                    'step' => $this->step,
                    'retention' => 0,
                    'week_start' => $week_start,
                ];

                foreach ($onBoardingPercentages as $percentages => $sums) {

                    if ( $this->validationRule($percentages) ) {

                        $this->formattedDataSet[$week_start]['retention'] += $sums;
                    }
                }

            }

          return $this;

        } catch (Exception $ex) {

            throw $ex;
        }

    }

    protected function toPercentage()
    {

        try {


            foreach ($this->formattedDataSet as $key => $value) {

                $total = $this->retentionDataSet['total'][$key];
                $retention = $value['retention'];

                $percentage = round( ($retention / $total ) * 100);

                $this->formattedDataSet[$key]['percentage'] =  $percentage;

            }


            return array_values($this->formattedDataSet);

        }catch (Exception $ex) {

            throw $ex;
        }
    }


}