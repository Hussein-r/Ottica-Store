@extends('layouts.admin')
@section('content')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script> --}}

<meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">   

<!-- Begin Page Content -->
              
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-6">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Sum of Orders Overview</h6>
            </div>
            <div class="card-body">
              <div class="chart-area">
              {!! $chart_order->container() !!}

              </div>
            </div>
          </div>
        </div>

        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-6">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Total Income Overview</h6>
            </div>
            <div class="card-body">
              <div class="chart-area">
              {!! $chart_total->container() !!}

              </div>
            </div>
          </div>
        </div>
    </div>
</div>
{!! $chart_order->script() !!}
{!! $chart_total->script() !!}


@endsection