@extends('admin.master')

@section('title', 'Dashboard')
@section('content')

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>School List
                        <small>KitaabWaala Admin panel</small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="dashboard"><i data-feather="home"></i></a></li>

                    <li class="breadcrumb-item active">School List</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h5>School List</h5>
        </div>
        <div class="card-body vendor-table">
            <table class="display" id="basic-1">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>School Name</th>
                        <th>School Zone</th>
                        <th>School Email</th>
                        <th>Mobile No</th>
                        <th>View</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($schooldetails as $schooldetail)


                        <td>{{$schooldetail->id}}</td>
                        <td>{{$schooldetail->school_name}}</td>
                        <td>{{$schooldetail->school_zone}}</td>
                        <td>{{$schooldetail->email}}</td>
                        <td>{{$schooldetail->mobile_number}}</td>
                        <td>
                            <div>
                                <a href="/admin/view-schooldetail/{{$schooldetail->uuid}}"><i class="fa fa-eye"></i></a>

                            </div>
                        </td>
                        <td>
                            <div>
                                <form action="{{ route('Delete', $schooldetail->uuid) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle delete button click event
        $('.delete-button').on('click', function () {
            // Display SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    $(this).closest('.delete-form').submit();
                }
            });
        });
    });
</script>

@endsection