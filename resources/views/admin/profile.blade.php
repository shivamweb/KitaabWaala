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
                        <small>Hill Cell Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>

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
                    </ul>
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade show active" id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                            <h5 class="f-w-600">Profile</h5>
                            <div class="table-responsive profile-table">
                                <table class="table table-responsive">
                                    <tbody>

                                        <form method="POST" action="{{route('storeAdminProfile')}}" enctype="multipart/form-data">
                                            @csrf
                                            <tr>
                                                <td>
                                                    <div class="profile-details text-center">
                                                        @if ($adminDetails->image)
                                                        <img src="{{asset($adminDetails->image)}}" alt="" style="height:200px;width:200px;border-radius:50%">
                                                        @else
                                                        <img src="../assets/images/dashboard/designer.jpg" alt="" class="img-fluid img-90 rounded-circle blur-up lazyloaded">
                                                        @endif
                                                        <h5 class="f-w-600 mb-0">{{$adminDetails->firstname. ' ' .$adminDetails->lastname}}</h5>
                                                        <span>{{$adminDetails->email}}</span></br>
                                                        Upload Your Profile Image:
                                                        <input type="file" name="image" id="fileToUpload">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>First Name:</td>
                                                <td><input type="text" id="fname" name="firstname" value="{{$adminDetails->firstname}}"></td>
                                            </tr>
                                            <tr>
                                                <td>Last Name:</td>
                                                <td><input type="text" id="lname" name="lastname" value="{{$adminDetails->lastname}}"></td>
                                            </tr>
                                            <tr>
                                                <td>Email:</td>
                                                <td><input type="email" id="email" name="email" value="{{$adminDetails->email }}"></td>
                                            </tr>
                                            <tr>
                                                <td>Mobile Number:</td>
                                                <td><input type="text" name="mobile_number"></td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Profile</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
                            <div class="account-setting">
                                <h5 class="f-w-600">Notifications</h5>
                                <div class="row">
                                    <div class="col">
                                        <label class="d-block" for="chk-ani">
                                            <input class="checkbox_animated" id="chk-ani" type="checkbox">
                                            Allow Desktop Notifications
                                        </label>
                                        <label class="d-block" for="chk-ani1">
                                            <input class="checkbox_animated" id="chk-ani1" type="checkbox">
                                            Enable Notifications
                                        </label>
                                        <label class="d-block" for="chk-ani2">
                                            <input class="checkbox_animated" id="chk-ani2" type="checkbox">
                                            Get notification for my own activity
                                        </label>
                                        <label class="d-block mb-0" for="chk-ani3">
                                            <input class="checkbox_animated" id="chk-ani3" type="checkbox" checked="">
                                            DND
                                        </label>
                                    </div>
                                </div>
                            </div>
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
                                <button type="button" class="btn btn-primary">Deactivate Account</button>
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
@endsection