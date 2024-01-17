@extends('admin.master')

@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Date Wise reports
                        <small>KitaabWaala Admin </small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>

                    <li class="breadcrumb-item active">Date Wise reports</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card tab2-card">
                <div class="card-body">
              
<hr>
 
    {{-- Date Range Picker --}}
    <div class="form-group">
        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" class="form-control">
    </div>

    <div class="form-group">
        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" class="form-control">
    </div>

    </div>
    </div>  
</div>  
</div>
</div>

@endsection
