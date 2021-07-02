<template>
    <div>
        Dashboard
    </div>
    <!-- <div class="row layout-top-spacing">
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-content">
                        <div class="w-info">
                            <h2 class="value">$ 45,141</h2>
                            <h6 class="">{{ $t('monthly_income') }}</h6>
                        </div>
                        <div class="">
                            <div class="w-icon">
                                <i class="fas fa-cash-register"></i>
                            </div>
                        </div>
                    </div>
                    <div class="progress p-1 mt-2">
                        <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-content">
                        <div class="w-info">
                            <h2 class="value">$ 5,141</h2>
                            <h6 class="">{{ $t('monthly_expense') }}</h6>
                        </div>
                        <div class="">
                            <div class="w-icon">
                                <i class="fas fa-credit-card"></i>
                            </div>
                        </div>
                    </div>
                    <div class="progress p-1 mt-2">
                        <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 20%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-content">
                        <div class="w-info">
                            <h2 class="value">$ 141</h2>
                            <h6 class="">{{ $t('monthly_total_loan') }}</h6>
                        </div>
                        <div class="">
                            <div class="w-icon">
                                <i class="fas fa-chart-bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="progress p-1 mt-2">
                        <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 70%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="row widget-statistic">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="widget widget-one_hybrid widget-followers">
                        <div class="widget-heading">
                            <div class="w-icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <p class="w-value">$ 3,000</p>
                            <h5 class="">{{ $t('today_sale') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="widget widget-one_hybrid widget-success">
                        <div class="widget-heading">
                            <div class="w-icon">
                                <i class="fas fa-shopping-basket"></i>
                            </div>
                            <p class="w-value">$ 1,300</p>
                            <h5 class="">{{ $t('today_purchase') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="widget widget-one_hybrid widget-referral">
                        <div class="widget-heading">
                            <div class="w-icon">
                                <i class="fas fa-anchor"></i>
                            </div>
                            <p class="w-value">$ 0</p>
                            <h5 class="">{{ $t('today_lost') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="widget widget-one_hybrid widget-engagement">
                        <div class="widget-heading">
                            <div class="w-icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <p class="w-value">$ 400</p>
                            <h5 class="">{{ $t('today_profit') }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <b-row>
            <b-col xl="4" lg="6" md="12" sm="12">
                <b-card class="card-chart">
                    <b-card-body>
                        <div>
                            <apexchart width="400" type="line" :options="areaChart.chartOptions" :series="areaChart.series"></apexchart>
                        </div>
                    </b-card-body>
                </b-card>
            </b-col>
            <b-col xl="4" lg="4" md="12" sm="12">
                <b-card class="card-chart">
                    <b-card-body>
                        <div>
                            <apexchart width="400" type="donut" :options="pieChart.chartOptions" :series="pieChart.series"></apexchart>
                        </div>
                    </b-card-body>
                </b-card>
            </b-col>
            <b-col xl="4" lg="4" md="12" sm="12">
                <b-card class="card-chart">
                    <b-card-body>
                        <div>
                            <apexchart width="400" type="bar" :options="columnChart.chartOptions" :series="columnChart.series"></apexchart>
                        </div>
                    </b-card-body>
                </b-card>
            </b-col>
        </b-row>

    </div> -->
</template>

<script>
    import { mapGetters } from 'vuex'
    import store from '../../store';
    export default {
        moduleKey: 'dashboard',
        components: {
        },
        data() {
            return {
                loading: true,
                barChart:{
                    options: {
                        chart: {
                            id: 'vuechart-example'
                        },
                        xaxis: {
                            categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998]
                        }
                    },
                    series: [{
                        name: 'series-1',
                        data: [30, 40, 45, 50, 49, 60, 70, 91]
                    }]
                },
                 areaChart:{
                    series: [{
                        name: 'series1',
                        data: [31, 40, 28, 51, 42, 109, 100]
                    }, {
                        name: 'series2',
                        data: [11, 32, 45, 32, 34, 52, 41]
                    }],
                    chartOptions: {
                        chart: {
                            height: 200,
                            type: 'area',
                            toolbar: {
                                show: true,
                                tools: {
                                    download: true,
                                    selection: false,
                                    zoom: false,
                                    zoomin: false,
                                    zoomout: false,
                                    pan: false,
                                    reset: false
                                },
                            },
                            },
                            dataLabels: {
                            enabled: false
                            },
                            stroke: {
                            curve: 'smooth'
                            },
                            xaxis: {
                            type: 'datetime',
                            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                            },
                            tooltip: {
                            x: {
                                format: 'dd/MM/yy HH:mm'
                            },
                        },
                    },
                },
                pieChart:{
                    series: [44, 55, 41, 17, 15],
                    chartOptions: {
                        chart: {
                            type: 'donut',
                            toolbar: {
                                show: true,
                                tools: {
                                    download: true,
                                    selection: false,
                                    zoom: false,
                                    zoomin: false,
                                    zoomout: false,
                                    pan: true,
                                    reset: false
                                },
                            },
                        },
                        responsive: [{
                            breakpoint: 1000,
                            options: {
                                chart: {
                                    width: 200
                                },
                                legend: {
                                    position: 'bottom'
                                }
                            }
                        }]
                    },
                },
                columnChart: {
                    series: [{
                        data: [21, 22, 10, 28, 16, 21, 13, 30]
                    }],
                    chartOptions: {
                        chart: {
                        height: 350,
                        type: 'bar',
                        events: {
                            click: function(chart, w, e) {
                            // console.log(chart, w, e)
                            }
                        }
                        },
                        // colors: 'red',
                        plotOptions: {
                        bar: {
                            columnWidth: '45%',
                            distributed: true,
                        }
                        },
                        dataLabels: {
                        enabled: false
                        },
                        legend: {
                        show: false
                        },
                        xaxis: {
                        categories: [
                            ['John', 'Doe'],
                            ['Joe', 'Smith'],
                            ['Jake', 'Williams'],
                            'Amber',
                            ['Peter', 'Brown'],
                            ['Mary', 'Evans'],
                            ['David', 'Wilson'],
                            ['Lily', 'Roberts'],
                        ],
                        labels: {
                            style: {
                            // colors: 'red',
                            fontSize: '12px'
                            }
                        }
                        }
                    },
                },
            }
        },
        computed: {
            ...mapGetters({
                // products: 'getProducts',
            }),
        },
        created() {
            // store.dispatch('fetchCustomers').then(() => { this.loading = false; });
            // store.dispatch('fetchProducts');
        },
    }
</script>

<style scoped>
    i{
        font-size: 18px;
        padding: 5px;
    }
    .card-chart{
        background: #fff;
        border-radius: 6px;
        border: none;
        webkit-box-shadow: 0 4px 6px 0 rgb(85 85 85 / 8%), 0 1px 20px 0 rgb(0 0 0 / 7%), 0px 1px 11px 0px rgb(0 0 0 / 7%);
        -moz-box-shadow: 0 4px 6px 0 rgba(85, 85, 85, 0.08), 0 1px 20px 0 rgba(0, 0, 0, 0.07), 0px 1px 11px 0px rgba(0, 0, 0, 0.07);
        box-shadow: 0 4px 6px 0 rgb(85 85 85 / 8%), 0 1px 20px 0 rgb(0 0 0 / 7%), 0px 1px 11px 0px rgb(0 0 0 / 7%);
    }
</style>
