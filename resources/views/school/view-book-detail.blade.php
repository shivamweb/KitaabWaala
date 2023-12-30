@extends('school.master')

@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>View Book Detail
                        <small>Kitaabwaala Seller panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a>
                    </li>
                   
                    <li class="breadcrumb-item active">View Book Detail</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row product-adding">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5>General</h5>
                </div>
                <div class="card-body">
                    <div class="digital-add needs-validation">
                       
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="row product-adding">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5>Add Product Image</h5>
                                                            <div class="card-body">

                                                                <div id="file-input-container">
                                                                    <div class="row mt-3 mt-lg-4">
                                                                       
                                                                        <div class="col-lg-6">
                                                                            <img id="imgpreview" src="{{ asset($bookdetails->image) }}" alt="Preview" style="height: 200px; width:200px; padding-bottom:2px">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row product-adding">
                                                                <div class="col-xl-12">
                                                                    <div class="add-product">
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                <h5>Book Details</h5>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="digital-add needs-validation">
                                                                                    <div class="form-group">
                                                                                        <label for="metadata" class="col-form-label pt-0">Book Name</label>
                                                                                        <input class="form-control" name="book_name" value="{{$bookdetails->book_name}}" id="book_name" type="text">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="metadata" class="col-form-label pt-0">Price</label>
                                                                                        <input class="form-control" name="price" value="{{$bookdetails->price}}"id="price" type="text">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="metadata" class="col-form-label pt-0">Class</label>
                                                                                        <input class="form-control" name="class" value="{{$bookdetails->class}}" id="class" type="text">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="metadata" class="col-form-label pt-0">Status</label>
                                                                                        <input class="form-control" name="status" value="{{$bookdetails->status}}" id="status" type="text">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label class="col-form-label">BookDescription</label>
                                                                                        <textarea rows="4" cols="12" name="description" value="{{$bookdetails->description}}"></textarea>
                                                                                        <!-- <div class="form-group mb-0">
                                                                                            <div class="product-buttons text-center">
                                                                                                <button type="submit" id="submit-button" class="btn btn-primary">Add</button>
                                                                                                <button type="button" class="btn btn-light">Discard</button>
                                                                                            </div>
                                                                                        </div> -->
                                                                                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function previewImage(input, previewId) {
        const file = input.files[0];
        const imagePreview = document.getElementById(previewId);
        if (file) {
            let reader = new FileReader();
            reader.onload = function(event) {
                imagePreview.src = event.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = "";
            imagePreview.style.display = 'block';
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        var status = "{{ session('status') }}";
        var message = "{{ session('message') }}";
        var errors = @json($errors->all());

        if (status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: message
            }).then(function() {

            });
        } else if (status === 'error') {
            if (errors.length > 0) {
                // Construct the error message from the validation errors
                var errorMessage = 'Validation Errors:<br>';
                errors.forEach(function(error) {
                    errorMessage += error + '<br>';
                });

                // Display a SweetAlert with validation errors
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: errorMessage
                });
            } else {
                // Display a SweetAlert with general error message
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: message
                });
            }
        }
    });
</script>




@endsection