/**
 * Created by PiushaKalyana
 */

(function ($) {
    'use strict'
    $.fn.weeklyCohortChart = function(){

        return this.each(function(){
            var self = this,
                $self = $(this);

            var OnboardingApp = {
                init:function () {
                    OnboardingApp.loadChartData()
                },
                loadChartData:function () {

                    $.ajax({
                        method:'GET',
                        url:'api/charts/weekly-cohort',
                        dataType:'JSON'
                    }).done(function(response){
                        OnboardingApp.drawChart(response)

                    })
                },
                drawChart:function(chart){

                    $self.highcharts(chart)
                }

            };

            OnboardingApp.init();

        });



    }
}(jQuery));