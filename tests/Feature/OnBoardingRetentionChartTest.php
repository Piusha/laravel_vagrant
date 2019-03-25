<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OnBoardingRetentionChartTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testChartDataSetApiStatus()
    {
        $response = $this->json('GET', '/api/charts/weekly-cohort');

        $response->assertStatus(200);
    }


    /**
     * Check Chart Data set in the structure
     */
    public function testChartDataSetExistRelevantAttributeForChart()
    {

        $chartDataSet ["xAxis"] = ["categories" => []];

        $chartDataSet['series'] = [];

        $this->json('GET', '/api/charts/weekly-cohort')->assertJson($chartDataSet);
    }
}
