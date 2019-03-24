<?php
/**
 * User: PiushaKalyana
 * Date: 3/24/19
 * Time: 9:44 PM
 */

namespace App\Repository\Chart;


interface ChartInterface
{
    public function setDataSet($dataSet = []);

    public function getChartDataSet();

}