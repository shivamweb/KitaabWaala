@extends('admin.master')

@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-profile-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>Add School</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="top-pancard-tab" data-bs-toggle="tab" href="#top-pancard" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>Faculity Details</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="top-aadhar-tab" data-bs-toggle="tab" href="#top-aadhar" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>Document</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="top-book-tab" data-bs-toggle="tab" href="#top-book" role="tab" aria-controls="top-book" aria-selected="true"><i data-feather="user" class="me-2"></i>Book</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                            <h5 class="f-w-600">Add School</h5>
                            <div class="table-responsive profile-table">
                                <table class="table table-responsive">
                                    <tbody>
                                        <form name="school_profile" method="POST" action="{{ route('updateSchool',$schooldetails->uuid) }}" enctype="multipart/form-data">
                                            @csrf
                                            <tr>
                                                <hr>
                                            </tr>
                                            <tr>
                                                <td>School Name:</td>
                                                <td><input type="text" id="school_name" name="school_name" value="{{$schooldetails->school_name}}" disabled></td>
                                            </tr>

                                            <tr>
                                                <td>Email:</td>
                                                <td><input type="email" id="email" name="email" value="{{$schooldetails->email}}" disabled></td>
                                            </tr>
                                            <tr>
                                                <td>Password:</td>
                                                <td><input type="text" id="password" name="password" value="{{$schooldetails->password}}" disabled></td>
                                            </tr>
                                            <tr>
                                                <td>Mobile Number:</td>
                                                <td><input type="text" name="mobile_number" value="{{$schooldetails->mobile_number}}" disabled></td>
                                            </tr>
                                            <tr>
                                                <td>School Zone :</td>
                                                <td><input type="text" id="school_zone" name="school_zone"></td>
                                            </tr>
                                            <tr>
                                                <td>Country :</td>
                                                <td><input type="text" id="cname" name="country" value="{{$schooldetails->country}}" disabled></td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td><input type="text" id="address" name="address" value="{{$schooldetails->address}}" disabled></td>
                                            </tr>
                                            <tr>
                                                <td>PIN Code:</td>
                                                <td><input type="text" id="pincode" name="pin_code" value="{{$schooldetails->pin_code}}" disabled></td>
                                            </tr>
                                            <tr>
                                                <td>City:</td>
                                                <td><input type="text" id="pincode" name="city" value="{{$schooldetails->city}}" disabled></td>
                                            </tr>
                                            <tr>
                                                <td>State:</td>
                                                <td><input type="text" id="state" name="state" value="{{$schooldetails->state}}" disabled> </td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary">Add School</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="top-pancard" role="tabpanel" aria-labelledby="top-pancard-tab">
                            <h5 class="f-w-600">School Management Detail</h5>

                            <div class="table-responsive pancard-table">
                                <table class="table table-responsive">
                                    <tbody>
                                        <tr>
                                            <hr>
                                        </tr>
                                        <tr>
                                            <td>Faculity Name:</td>
                                            <td> <input type="text" id="fname" name="faculity_name" value="{{$schooldetails->faculity_name}}" disabled></td>
                                        </tr>
                                        <tr>
                                            <td>Faculity Email:</td>
                                            <td> <input type="text" id="faculity_email" name="faculity_email" value="{{$schooldetails->faculity_email}}" disabled></td>
                                        </tr>
                                        <tr>
                                            <td>Faculity Mobile No:</td>
                                            <td> <input type="text" id="faculity_mobileno" name="faculity_mobileno" value="{{$schooldetails->faculity_mobileno}}" disabled></td>
                                        </tr>
                                        <tr>
                                            <td>Faculity Gender:</td>
                                            <td> <input type="text" id="faculity_gender" name="faculity_gender" value="{{$schooldetails->faculity_gender}}" disabled></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Faculity</button>


                        </div>
                        <div class="tab-pane fade" id="top-aadhar" role="tabpanel" aria-labelledby="top-profile-tab">
                            <h5 class="f-w-600">Document</h5>

                            <div class="table-responsive profile-table">
                                <table class="table table-responsive">
                                    <tbody>
                                        <tr>
                                            <hr>
                                        </tr>

                                        <tr>
                                            <td>School Document:</td>
                                            <td><input type="text" id="school_document" name="school_document" value="{{$schooldetails->school_document}}" disabled></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary">Verify</button>


                        </div>
                        <div class="tab-pane fade" id="top-book" role="tabpanel" aria-labelledby="top-profile-tab">
                            <h5 class="f-w-600">Book</h5>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach($classesWithBooks as $class)
                                        <div class="row mb-3">
                                            <div class="col-md-3">
                                                <div class="form-check">
                                                    <h6>Class:- {{ $class->class }}</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-9">
                                                <div class="form-check">
                                                    @foreach ($class->books as $book)
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="books" id="book{{ $book->id }}" value="{{ $book->id }}" data-book-id="{{ $book->id }}">
                                                        <label class="form-check-label" for="book{{ $book->id }}">
                                                            {{ $book->book_name }}
                                                        </label>
                                                    </div>
                                                    <br>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var status = "{{ session('status') }}";
        var message = "{{ session('message') }}";
        var errors = @json($errors->all());
        if (status === 'success') {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: message
            });
        } else if (status === 'error') {
            if (errors.length > 0) {
                var errorMessage = 'Validation Errors:<br>';
                errors.forEach(function(error) {
                    errorMessage += error + '<br>';
                });
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    html: errorMessage
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: message
                });
            }
        }
    });

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
            imagePreview.style.display = 'none';
        }
    }
</script>
<script>
    $(document).ready(function() {
        // Bind the change event to form-check-input checkboxes
        $('.form-check-input').on('change', function(e) {
            e.preventDefault();
            var book_id = $(this).data('book-id');
            var isCheckboxChecked = $(this).is(':checked');

            // Update the URL to match your route
            $.ajax({
                type: 'POST',
                // Update the URL to match the correct route
                url: '/admin/addBookToSchool',
                data: {
                    book_id: book_id,
                    isAnyCheckboxChecked: isCheckboxChecked,
                    school_id: '{{ $schooldetails->id }}',
                    _token: '{{ csrf_token() }}'
                },

                success: function(data) {
                    // Handle the success response if needed
                    console.log(data.message);
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500,
                        type: "info",
                      
                        customClass: 'swal-wide',
                        showCancelButton: true,
                        showConfirmButton:false,
                        width: '400px' ,
                        height : '200px',
                        
                    });
                },
                error: function(error) {
                    // Handle the error response if needed
                    console.error('Error adding books to school:', error);
                    alert('Error adding book to school');
                }

            });
        });
    });
</script>




@endsection