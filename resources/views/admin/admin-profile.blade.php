@extends('admin.master')

@section('title', 'Dashboard')
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Profile
                        <small>KitaabWaala Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a>
                    </li>
                    <li class="breadcrumb-item">Settings</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="top-profile-tab" data-bs-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>Profile</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="top-pancard-tab" data-bs-toggle="tab" href="#top-pancard" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>PAN Card Details</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="top-aadhar-tab" data-bs-toggle="tab" href="#top-aadhar" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>Aadhar Card Details</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="top-gst-tab" data-bs-toggle="tab" href="#top-gst" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>GST No</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="top-bankdetails-tab" data-bs-toggle="tab" href="#top-bankdetails" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>Bank Details</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="top-msme-tab" data-bs-toggle="tab" href="#top-msme" role="tab" aria-controls="top-profile" aria-selected="true"><i data-feather="user" class="me-2"></i>MSME Details</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-bs-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="false"><i data-feather="settings" class="me-2"></i>Contact</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                            <h5 class="f-w-600">Profile</h5>
                            <div class="table-responsive profile-table">
                                <table class="table table-responsive">
                                    <tbody>
                                        <tr>
                                            <hr>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="profile-details text-center">
                                                    <img src="../assets/images/dashboard/designer.jpg" alt="" class="img-fluid img-90 rounded-circle blur-up lazyloaded">
                                                    <h5 class="f-w-600 mb-0">John deo</h5>
                                                    <span>johndeo@gmail.com</span></br>
                                                    Upload Your Profile Image:
                                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>First Name:</td>
                                            <td><input type="text" id="fname" name="fname"></td>
                                        </tr>
                                        <tr>
                                            <td>Last Name:</td>
                                            <td><input type="text" id="lname" name="lname"></td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td><input type="email" id="email" name="email"></td>
                                        </tr>
                                        <tr>
                                            <td>Gender:</td>
                                            <td><input type="text" id="gender" name="gender"></td>
                                        </tr>
                                        <tr>
                                            <td>Mobile Number:</td>
                                            <td><input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}"></td>
                                        </tr>
                                        <tr>
                                            <td>DOB:</td>
                                            <td><input type="date" id="dob" name="dob">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Company Name:</td>
                                            <td><input type="text" id="cname" name="cname"></td>
                                        </tr>
                                        <tr>
                                            <td>Address:</td>
                                            <td><input type="text" id="address" name="address"></td>
                                        </tr>
                                        <tr>
                                            <td>PIN Code:</td>
                                            <td><input type="text" id="pincode" name="pincode"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-primary">Verify
                            </button>
                        </div>

                        <div class="tab-pane fade" id="top-pancard" role="tabpanel" aria-labelledby="top-pancard-tab">
                            <h5 class="f-w-600">PAN Card Details</h5>
                            <div class="table-responsive pancard-table">
                                <table class="table table-responsive">
                                    <tbody>
                                        <tr>
                                            <hr>
                                        </tr>
                                        <tr>
                                            <td>PAN Card No:</td>
                                            <td> <input type="text" id="panno" name="panno"></td>
                                        </tr>
                                        <tr>
                                            <td>PAN Card Image:</td>
                                            <td> <input type="file" id="panimg" name="panimg" accept="image/*"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-primary">Submit
                            </button>
                        </div>
                        <div class="tab-pane fade" id="top-aadhar" role="tabpanel" aria-labelledby="top-profile-tab">
                            <h5 class="f-w-600">Adadhar Card Details</h5>
                            <div class="table-responsive profile-table">
                                <table class="table table-responsive">
                                    <tbody>
                                        <tr>
                                            <hr>
                                        </tr>

                                        <tr>
                                            <td>Aadhar Card No:</td>
                                            <td><input type="text" id="aadharno" name="aadharno"></td>
                                        </tr>
                                        <tr>
                                            <td>Aadhar Card Image:</td>
                                            <td> <input type="file" id="aadharimg" name="aadharimg" accept="image/*"></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-primary">Verify
                            </button>
                        </div>
                        <div class="tab-pane fade" id="top-gst" role="tabpanel" aria-labelledby="top-profile-tab">
                            <h5 class="f-w-600">GST No Details</h5>
                            <div class="table-responsive profile-table">
                                <table class="table table-responsive">
                                    <tbody>
                                        <tr>
                                            <hr>
                                        </tr>
                                        <tr>
                                            <td>GST No:</td>
                                            <td><input type="text" id="gstno" name="gstno"></td>
                                        </tr>
                                        <tr>
                                            <td>Upload GST Certificate Image:</td>
                                            <td> <input type="file" id="gstpdf" name="gstpdf" accept="image/*"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-primary">Verify
                            </button>
                        </div>

                        <div class="tab-pane fade" id="top-msme" role="tabpanel" aria-labelledby="top-profile-tab">
                            <h5 class="f-w-600">MSME Details</h5>
                            <div class="table-responsive profile-table">
                                <table class="table table-responsive">
                                    <tbody>
                                        <tr>
                                            <hr>
                                        </tr>
                                        <tr>
                                            <td>MSME No:</td>
                                            <td> <input type="text" id="msmeno" name="msmeno"></td>
                                        </tr>
                                        <tr>
                                            <td>MSME Image:</td>
                                            <td>
                                                <input type="file" id="msmeimg" name="img" accept="image/*">
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-primary">Verify
                            </button>
                        </div>
                        <div class="tab-pane fade" id="top-bankdetails" role="tabpanel" aria-labelledby="top-profile-tab">
                            <h5 class="f-w-600">Bank Details</h5>
                            <div class="table-responsive profile-table">
                                <table class="table table-responsive">
                                    <tbody>
                                        <tr>
                                            <hr>
                                        </tr>
                                        <tr>
                                            <td>Account Details(Company Account):</td>
                                            <td><input type="text" id="accoubtdetails" name="accountdetails"></td>
                                        </tr>
                                        <tr>
                                            <td>Account Holder Full Name:</td>
                                            <td><input type="text" id="accoubtdetails" name="accountdetails"></td>
                                        </tr>
                                        <tr>
                                            <td>IFSC Code:</td>
                                            <td><input type="text" id="ifsc" name="ifsccode"></td>
                                        </tr>

                                        <tr>
                                            <td>Cancel Check Image :</td>
                                            <td><input type="file" id="cancelcheckimg" name="cancelcheckimg" accept="image/*"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-primary">Verify
                            </button>
                        </div>
                        <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                            <div class="account-setting deactivate-account">
                                <h5 class="f-w-600">Deactivate Account</h5>
                                <div class="row">
                                    <div class="col">
                                        <label class="d-block" for="edo-ani">
                                            <input class="radio_animated" id="edo-ani" type="radio" name="rdo-ani" checked="">
                                            I have a privacy concern
                                        </label>
                                        <label class="d-block" for="edo-ani1">
                                            <input class="radio_animated" id="edo-ani1" type="radio" name="rdo-ani">
                                            This is temporary
                                        </label>
                                        <label class="d-block mb-0" for="edo-ani2">
                                            <input class="radio_animated" id="edo-ani2" type="radio" name="rdo-ani" checked="">
                                            Other
                                        </label>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary">Deactivate
                                    Account</button>
                            </div>
                            <div class="account-setting deactivate-account">
                                <h5 class="f-w-600">Delete Account</h5>
                                <div class="row">
                                    <div class="col">
                                        <label class="d-block" for="edo-ani3">
                                            <input class="radio_animated" id="edo-ani3" type="radio" name="rdo-ani1" checked="">
                                            No longer usable
                                        </label>
                                        <label class="d-block" for="edo-ani4">
                                            <input class="radio_animated" id="edo-ani4" type="radio" name="rdo-ani1">
                                            Want to switch on other account
                                        </label>
                                        <label class="d-block mb-0" for="edo-ani5">
                                            <input class="radio_animated" id="edo-ani5" type="radio" name="rdo-ani1" checked="">
                                            Other
                                        </label>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary">Delete Account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

@endsection