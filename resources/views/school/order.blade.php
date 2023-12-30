@extends('school.master')

@section('title', 'Dashboard')
@section('content')


<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Orders
                        <small>KitaabWaala School panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>
                    
                    <li class="breadcrumb-item active">Orders</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Manage Order</h5>
                </div>
                <div class="card-body order-datatable">
                    <table class="display" id="basic-1">
                        <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Product</th>
                                <th>Payment Status</th>
                                <th>Payment Method</th>
                                <th>Order Status</th>
                                <th>Date</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#51240</td>
                                <td>
                                    <div class="d-flex">
                                        <img src="../assets/images/layout-1/product/1.jpg" alt="" class="img-fluid img-30 me-2 ">
                                        <img src="../assets/images/layout-1/product/2.jpg" alt="" class="img-fluid img-30 me-2 ">
                                        <img src="../assets/images/layout-1/product/3.jpg" alt="" class="img-fluid img-30 me-2 ">
                                    </div>
                                </td>
                                <td><span class="badge badge-secondary">Cash On Delivery</span></td>
                                <td>Paypal</td>
                                <td><span class="badge badge-success">Delivered</span></td>
                                <td>Dec 10,18</td>
                                <td>$54671</td>
                            </tr>
                            <tr>
                                <td>#51241</td>
                                <td>
                                    <div class="d-flex">
                                        <img src="../assets/images/layout-1/product/4.jpg" alt="" class="img-fluid img-30 me-2 ">
                                        <img src="../assets/images/layout-1/product/5.jpg" alt="" class="img-fluid img-30 me-2 ">
                                    </div>
                                </td>
                                <td><span class="badge badge-success">Paid</span></td>
                                <td>Master Card</td>
                                <td><span class="badge badge-primary">Shipped</span></td>
                                <td>Feb 15,18</td>
                                <td>$2136</td>
                            </tr>
                            <tr>
                                <td>#51242</td>
                                <td><img src="../assets/images/layout-1/product/6.jpg" alt="" class="img-fluid img-30 me-2 "></td>
                                <td><span class="badge badge-warning">Awaiting Authentication</span></td>
                                <td>Debit Card</td>
                                <td><span class="badge badge-warning">Processing</span></td>
                                <td>Mar 27,18</td>
                                <td>$8791</td>
                            </tr>
                            <tr>
                                <td>#51243</td>
                                <td>
                                    <div class="d-flex">
                                        <img src="../assets/images/layout-1/product/7.jpg" alt="" class="img-fluid img-30 me-2 ">
                                        <img src="../assets/images/layout-1/product/8.jpg" alt="" class="img-fluid img-30 me-2 ">
                                    </div>
                                </td>
                                <td><span class="badge badge-danger">Payment Failed</span></td>
                                <td>Master Card</td>
                                <td><span class="badge badge-danger">Cancelled</span></td>
                                <td>Sep 1,18</td>
                                <td>$139</td>
                            </tr>
                            <tr>
                                <td>#51244</td>
                                <td>
                                    <div class="d-flex">
                                        <img src="../assets/images/cosmetic/product/1.jpg" alt="" class="img-fluid img-30 me-2 ">
                                        <img src="../assets/images/cosmetic/product/2.jpg" alt="" class="img-fluid img-30 me-2 ">
                                    </div>
                                </td>
                                <td><span class="badge badge-success">Paid</span></td>
                                <td>Paypal</td>
                                <td><span class="badge badge-primary">Shipped</span></td>
                                <td>May 18,18</td>
                                <td>$4678</td>
                            </tr>
                            <tr>
                                <td>#51245</td>
                                <td>
                                    <div class="d-flex">
                                        <img src="../assets/images/cosmetic/product/3.jpg" alt="" class="img-fluid img-30 me-2 ">
                                        <img src="../assets/images/cosmetic/product/4.jpg" alt="" class="img-fluid img-30 me-2 ">
                                        <img src="../assets/images/cosmetic/product/5.jpg" alt="" class="img-fluid img-30 me-2 ">
                                    </div>
                                </td>
                                <td><span class="badge badge-success">Paid</span></td>
                                <td>Visa</td>
                                <td><span class="badge badge-success">Delivered</span></td>
                                <td>Jan 14,18</td>
                                <td>$6791</td>
                            </tr>
                            <tr>
                                <td>#51246</td>
                                <td><img src="../assets/images/cosmetic/product/6.jpg" alt="" class="img-fluid img-30 me-2 "></td>
                                <td><span class="badge badge-warning">Awaiting Authentication</span></td>
                                <td>Credit Card</td>
                                <td><span class="badge badge-warning">Processing</span></td>
                                <td>Apr 22,18</td>
                                <td>$976</td>
                            </tr>
                            <tr>
                                <td>#51247</td>
                                <td>
                                    <div class="d-flex">
                                        <img src="../assets/images/cosmetic/product/7.jpg" alt="" class="img-fluid img-30 me-2 ">
                                        <img src="../assets/images/cosmetic/product/8.jpg" alt="" class="img-fluid img-30 me-2 ">
                                    </div>
                                </td>
                                <td><span class="badge badge-danger">Payment Failed</span></td>
                                <td>Master Card</td>
                                <td><span class="badge badge-danger">Cancelled</span></td>
                                <td>Mar 26,18</td>
                                <td>$3212</td>
                            </tr>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

@endsection