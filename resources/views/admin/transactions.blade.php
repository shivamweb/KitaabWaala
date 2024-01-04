@extends('admin.master')

@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Transections
                        <small>Hill Cell Seller panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Transections</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Transections</h5>
                </div>
                <div class="card-body">
                    <div class="btn-popup pull-right">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title f-w-600" id="exampleModalLabel">Add Transections</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body order-datatable">
                        <table class="display" id="basic-1">
                            <thead>
                                <tr>
                                    <th>OrderId</th>
                                    <th>TransectionId</th>
                                    <th>School Name</th>
                                    <th>Remaining Amount</th>
                                    <th>Paid Amount</th>
                                    <th>Total Amount</th>
                                    <th>Transection Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transections as $transection)
                                <tr>
                                    <td>{{$transection->order_id}}</td>
                                    <td>{{$transection->transection_id}}</td>
                                    <td>{{$transection->order->school->school_name}}</td>
                                    <td>{{$transection->order->remaining_Amount}}</td>
                                    <td>{{$transection->amount}}</td>
                                    <td>{{$transection->order->total_Amount}}</td>
                                    <td>{{$transection->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection