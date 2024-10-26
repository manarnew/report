@extends('layout')

@section('content')
<div class="container">
    <h1>Stock Report</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Stock</h5>
                    <p class="card-text">{{ $totalStock }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Sales</h5>
                    <p class="card-text">${{ number_format($totalSales, 2) }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Purchases</h5>
                    <p class="card-text">${{ number_format($totalPurchases, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sales Trend Overview -->
    <div class="row">
        <div class="col-md-12 col-lg-6 order-1 mb-6 mt-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title">Sales Trend</h5>
                    <p class="card-subtitle">Monthly sales overview</p>
                </div>
                <div class="card-body">
                    <div id="salesTrendChart"></div>
                </div>
            </div>
        </div>

        <!-- Purchases Trend Overview -->
        <div class="col-md-6 col-lg-6 order-1 mb-6 mt-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title">Purchases Trend</h5>
                    <p class="card-subtitle">Monthly purchases overview</p>
                </div>
                <div class="card-body">
                    <div id="purchasesTrendChart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const salesTrendData = @json($salesTrend);
        const purchasesTrendData = @json($purchasesTrend);

        const salesLabels = salesTrendData.map(data => `Month ${data.month}`);
        const salesValues = salesTrendData.map(data => data.total);

        const purchasesLabels = purchasesTrendData.map(data => `Month ${data.month}`);
        const purchasesValues = purchasesTrendData.map(data => data.total);

        // Sales Trend Chart
        var optionsSales = {
            chart: {
                type: 'line',
                height: 350
            },
            series: [{
                name: 'Sales',
                data: salesValues
            }],
            xaxis: {
                categories: salesLabels
            }
        };

        var salesChart = new ApexCharts(document.querySelector("#salesTrendChart"), optionsSales);
        salesChart.render();

        // Purchases Trend Chart
        var optionsPurchases = {
            chart: {
                type: 'line',
                height: 350
            },
            series: [{
                name: 'Purchases',
                data: purchasesValues
            }],
            xaxis: {
                categories: purchasesLabels
            }
        };

        var purchasesChart = new ApexCharts(document.querySelector("#purchasesTrendChart"), optionsPurchases);
        purchasesChart.render();
    });
</script>
@endsection