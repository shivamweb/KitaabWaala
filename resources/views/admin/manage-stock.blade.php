@extends('admin.master')

@section('title', 'Dashboard')


@section('content')
<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Vendor List
                            <small> Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Vendors</li>
                        <li class="breadcrumb-item active">Pending Products List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Pending Status Products Details</h5>
            </div>
            <div class="card-body vendor-table">
                <table class="display" id="basic-1">
                    <thead>

                        <tr>
                            <th>Id</th>
                            <th>Vendor Name</th>
                            <th>Product Status</th>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Download Pdf</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->vendor->firstname.' '.$product->vendor->lastname}}</td>
                            <td>
                                <select class="form-select" id="status" data-product-id="{{ $product->id }}" name="status">
                                    <option value="{{ \App\Enums\ProductStatusEnum::PENDING }}" @if ($product->product_status ==  \App\Enums\ProductStatusEnum::PENDING ) selected @endif>Pending</option>
                                    <option value="{{ \App\Enums\ProductStatusEnum::APPROVED }}" @if ($product->product_status == \App\Enums\ProductStatusEnum::APPROVED ) selected @endif>Approved</option>
                                    <option value="{{ \App\Enums\ProductStatusEnum::REJECTED }}" @if ($product->product_status ==  \App\Enums\ProductStatusEnum::REJECTED ) selected @endif>Rejected</option>
                                </select>
                            </td>
                            <td>{{$product->vendor->company_name}}</td>
                            <td>{{$product->vendor->email}}</td>
                            <td>
                                    <a href="{{ route('downloadPdf', $product->id) }}" data-project-id="{{ $product->id }}">
                                        <span class="fa fa-download"></span>
                                    </a>
                                </td>
                            <td> <a href=""><i class="fa fa-edit me-2 font-success"></i></a></td>
                            <td>
                                <div>
                                    <a href=""><i class="fa fa-eye"></i></a>

                                </div>
                            </td>
                            <td> <i class="fa fa-trash font-danger"></i></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>