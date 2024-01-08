@extends('admin.master')

@section('title', 'Dashboard')
@section('content')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Add Notification
                        <small>KitaabWaala Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Add Notification</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid main-content px-2 px-lg-4">
  <div class="row g-3 g-lg-4 account-settings translate-top pb-4">
    <div class="col-xl-12">
      <div class="rounded">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active px-3 px-lg-4 pb-4 pt-4 bg-card rounded" id="account" role="tabpanel" tabindex="0">
            <form action="{{ route('sendNotification') }}" method="post" class="update-form p-3 p-lg-4">
              @csrf
              <h4 class="pb-4 bottom-border">Notification</h4>
              <div class="row">
                <div class="col mt-3 mt-lg-4">
                  <label for="to" class="form-label">Send To</label>
                  <select class="form-select" id="to" name="to">
                    <option value="all">All</option>
                    @foreach($schooldetails as $schooldetail)
                    <option value="{{ $schooldetail->id }}">{{ $schooldetail->id. '|' .$schooldetail->name. ' ' .$schooldetail->last_name. '|' .$schooldetail->email}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col mt-3 mt-lg-4">
                  <label for="description" class="large">Description</label>
                  <textarea cols="20" rows="5" wrap="hard" id="description" name="description" class="form-control mt-2" placeholder="Enter Description" required></textarea>
                </div>
              </div>
          </div>
          <div class="d-flex gap-4 mt-4">
            <button type="submit" class="primary-btn">
              Send Notification
            </button>
            <button type="reset" class="white-btn">Cancel</button>
          </div>
          </form>
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
                }).then(function() {
                    // Redirect to a desired URL
                    window.location.href = '/admin/notificationAddView'; // Replace with your desired URL
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
                    }).then(function() {
                        // Redirect to a desired URL after the user clicks "OK"
                        window.location.href = '/admin/notificationAddView'; // Replace with your desired URL
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