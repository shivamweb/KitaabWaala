@extends('school.master')

@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-profile-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>Add School</a></li>
                        <li class="nav-item"><a class="nav-link" id="top-pancard-tab" data-bs-toggle="tab" href="#top-pancard" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>Spoc Person</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="top-aadhar-tab" data-bs-toggle="tab" href="#top-aadhar" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>Document</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                            <h5 class="f-w-600">Add School</h5>
                            <div class="table-responsive profile-table">
                                <table class="table table-responsive">
                                    <tbody>
                                        <tr>
                                            <hr>
                                        </tr>
                                        <form name="school_profile" method="POST" action="{{route('storeSchoolProfile')}}" enctype="multipart/form-data">
                                            @csrf
                                            <tr>
                                                <td>
                                                    <div class="profile-details text-center">
                                                        @if ($schooldetails && $schooldetails->image)
                                                        <img src="{{ asset($schooldetails->image) }}" alt="" style="height:200px;width:200px;border-radius:50%">
                                                        @else
                                                        <img src="{{ asset('assets/images/dashboard/designer.jpg') }}" alt="" class="img-fluid img-90 rounded-circle blur-up lazyloaded">
                                                        @endif
                                                        <h5 class="f-w-600 mb-0">{{ $schooldetails ? $schooldetails->school_name : '' }}</h5>
                                                        <span>{{ $schooldetails ? $schooldetails->email : '' }}</span></br>
                                                        Upload Your Profile Image:
                                                        <input type="file" name="image" id="fileToUpload">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>School Name:</td>
                                                <td><input type="text" id="school_name" name="school_name" value="{{$schooldetails->school_name}}"></td>
                                            </tr>

                                            <tr>
                                                <td>Email:</td>
                                                <td><input type="email" id="email" name="email" value="{{$schooldetails->email}}"></td>
                                            </tr>
                                            <tr>
                                                <td>Password:</td>
                                                <td><input type="text" id="password" name="password" value="{{$schooldetails->password}}"></td>
                                            </tr>
                                            <tr>
                                                <td>Mobile Number:</td>
                                                <td><input type="text" name="mobile_number"></td>
                                            </tr>
                                            <tr>
                                                <td>School Zone :</td>
                                                <td><input type="text" id="school_zone" name="school_zone"></td>
                                            </tr>
                                            <tr>
                                                <td>Country :</td>
                                                <td><input type="text" id="cname" name="country"></td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td><input type="text" id="address" name="address"></td>
                                            </tr>
                                            <tr>
                                                <td>PIN Code:</td>
                                                <td><input type="text" id="pincode" name="pin_code"></td>
                                            </tr>
                                            <tr>
                                                <td>City:</td>
                                                <td><input type="text" id="pincode" name="city"></td>
                                            </tr>
                                            <tr>
                                                <td>State:</td>
                                                <td><input type="text" id="state" name="state"></td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary">Add School</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="top-pancard" role="tabpanel" aria-labelledby="top-pancard-tab">
                            <h5 class="f-w-600">Spoc Person Detail</h5>
                            <form method="POST" action="{{route('storeSchoolFaculityDetail')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="table-responsive pancard-table">
                                    <table class="table table-responsive">
                                        <tbody>
                                            <tr>
                                                <hr>
                                            </tr>
                                            <tr>
                                                <td>Faculity Name:</td>
                                                <td> <input type="text" id="fname" name="faculity_name"></td>
                                            </tr>
                                            <tr>
                                                <td>Faculity Email:</td>
                                                <td> <input type="text" id="faculity_email" name="faculity_email"></td>
                                            </tr>
                                            <tr>
                                                <td>Faculity Mobile No:</td>
                                                <td> <input type="text" id="faculity_mobileno" name="faculity_mobileno"></td>
                                            </tr>
                                            <tr>
                                                <td>Faculity Gender:</td>
                                                <td> <input type="text" id="faculity_gender" name="faculity_gender"></td>
                                            </tr>
                                            <tr>
                                                <td>Designation:</td>
                                                <td> <input type="text" id="designation" name="designation"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Faculity</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="top-aadhar" role="tabpanel" aria-labelledby="top-profile-tab">
                            <h5 class="f-w-600">Document</h5>
                            <form method="POST" action="{{route('storeSchoolDocument')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="table-responsive profile-table">
                                    <table class="table table-responsive">
                                        <tbody>
                                            <tr>
                                                <hr>
                                            </tr>
                                            <tr>
                                                <td>School Document:</td>
                                              <td>
                                                    <input type="file" id="school_doc_image" name="school_document" accept="image/*" onchange="previewImage(this, 'documentPreview')">
                                                    <img id="documentPreview" src="{{asset($schooldetails->school_document)}}" alt="School Document Preview" style="display: none; max-width: 200px; max-height: 200px; margin-top: 10px;">
                                                    <a href="/Agreement/Agreement.pdf" download="agreement.pdf">Download Agreement</a>
                                                
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-primary">Verify</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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

@endsection