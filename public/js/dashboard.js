/**
 * Created by andreiiorga on 04/07/2017.
 */
/**
 * Created by andreiiorga on 04/07/2017.
 */
restaurant.dashboard = function () {
    this.dataSet = $('#dashboard-container').data('results');
    this.initComponent();
}

restaurant.dashboard.prototype = {
    initComponent: function () {
        this.attachListeners();
        this.generateChart();
        console.log(this.dataSet)
    },
    attachListeners: function () {

    },
    generateChart: function () {
        // Create the chart

        Highcharts.chart('dashboard-container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Last week incommes'
            },
            xAxis: {
                categories: ['Today', 'One day ago', 'Two days Ago', 'Three days Ago', 'Four days Ago', 'Five days Ago', 'Six days Ago']
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Incommes LEI',
                data: [
                    this.dataSet[0].day0,
                    this.dataSet[0].day1,
                    this.dataSet[0].day2,
                    this.dataSet[0].day3,
                    this.dataSet[0].day4,
                    this.dataSet[0].day5,
                    this.dataSet[0].day6]
            }]
        });
    }


}

$(document).ready(function () {
    var something = new restaurant.dashboard();
});