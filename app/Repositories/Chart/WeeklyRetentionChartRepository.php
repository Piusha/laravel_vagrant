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

    public function getDataSet()
    {
        return $this->dataSet;
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


        $this->chartDataSet ["yAxis"] = [
            "title" => [
                "text" => "Total OnBoarded"
            ],
            'labels' => [
                'format' => '{value}%'
            ],
            'min' => '0',
            'max' => '100'
        ];


        $series = [];
       // $categoryArray = [];
        foreach($this->dataSet->toArray() as $data) {

            $week_start = $data['week_start'];
            unset($data['week_start']);
            unset($data['week_name']);
            $total = $data['Total'];
            unset($data['Total']);

            $series[$week_start] = [
                'name' => $week_start,
                'data' =>[]
            ];
            foreach($data as $key => $value) {

                if ( !isset($categoryArray[$key])) {
                    $categoryArray[$key] = $key;
                }
                $series[$week_start]['data'][] = round(($value / $total) * 100);
            }

        }
        $this->chartDataSet ["xAxis"] = ["categories" => array_values($categoryArray)];
        $this->chartDataSet['series'] = array_values($series);

    }
}
