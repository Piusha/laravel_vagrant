<?php
/**
 * User: PiushaKalyana
 * Date: 3/24/19
 * Time: 9:47 PM
 */

namespace App\Repository\Chart;


class WeeklyRetentionChartRepository implements ChartInterface
{

    private $dataSet = [];

    private $chartDataSet = [];


    public function setDataSet($dataSet = [])
    {

        $this->dataSet = $dataSet;

    }

    public function getChartDataSet()
    {

        $this->prepareDataSet();

        return $this->chartDataSet;
    }
    


    private function prepareDataSet()
    {
        $this->chartDataSet ["chart"] = ["type" => "line"];
        $this->chartDataSet ["title"] =[ "text" => "Weekly Retention Curve"];
        $this->chartDataSet ["credits"] = ["enabled" => false];
        $this->chartDataSet ["xAxis"] = ["categories" => []];
        $this->chartDataSet ["tooltip"] =["valueSuffix" => "%"];

         // $categoryArray = ['0', '20', '40', '50', '70', '90', '99', '100' ];



        $this->chartDataSet ["yAxis"] = array (
            "title" => array (
                "text" => "Total Onboarded"
            ),
            'labels' => array(
                'format' => '{value}%'
            ),
            'min' => '0',
            'max' => '100'
        );


        $series = [];
       // $categoryArray = [];
        foreach($this->dataSet as $data) {


            if ( !isset($categoryArray[$data['step']])) {

                $categoryArray[$data['step']] = $data['step'];
            }


            if (!isset($series[$data['week_start']]) ) {

                $series[$data['week_start']] = [
                    'name' =>   $data['week_start'],
                    'data' =>[]
                ];
            }

            $series[$data['week_start']]['data'][] = $data['percentage'];
        }
        $this->chartDataSet ["xAxis"] = ["categories" => array_values($categoryArray)];
        $this->chartDataSet['series'] = array_values($series);

       // dd($this->chartDataSet);
    }
}