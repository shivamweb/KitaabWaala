@extends('school.master')

@section('title', 'Dashboard')
@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Place New Order
                        <small>KitaabWaala School </small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>

                    <li class="breadcrumb-item active">Place New Order </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->


<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row products-admin ratio_asos">
        <div class="col-xl-3 col-sm-6">
            <div class="card product">
                @foreach($bookdetails as $bookdetail)
                <div class="card-body">
                    <div class="product-box p-0">
                        <div class="product-imgbox">
                            <div class="product-front">
                                <img src="{{asset($bookdetail->image)}}" class="img-fluid" alt="product">
                            </div>
                        </div>
                        <div class="product-detail detail-inline p-0">
                            <div class="detail-title">
                                <div class="detail-left">
                                    <a href="javascript:void(0)">
                                        <h6 class="price-title">
                                            {{$bookdetail->book_name}}
                                        </h6>
                                    </a>
                                </div>
                                <div class="detail-right">
                                    {{$bookdetail->price}}
                                    <div class="price">
                                        {{$bookdetail->class}}
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="product-buttons text-center">
                                    <a href="/school/purchase-book"><button type="submit" id="submit-button" class="btn btn-primary">Purchase</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->


@endsection