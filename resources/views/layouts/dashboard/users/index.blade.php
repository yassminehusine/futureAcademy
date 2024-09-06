@extends('layouts.dashboard.layout')
@section('content2')
<div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-dark">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable User</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Academic Level</th>
                            <th>GPA</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                @if($user->image)
                               <div class="imag">
                               <img src="{{ asset($user->image) }}" class="user-image" alt="User Image">
                               </div>
                                @else
                                No Image
                                @endif
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->academic_level }}</td>
                            <td>{{ $user->GPA }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->department->department_name ?? 'N/A' }}</td>
                            <td>
                        <a href="{{ route('user.edit', $user->id) }}">
                            <i class="fa fa-edit text-info"></i>
                        </a>
                        <a href="{{ route('user.destroy', $user->id) }} "
                        onclick="return confirm('Are you sure you want to delete this user?')">
                         <i class="fa fa-trash text-danger"> </i>
                          
                        </a>
                    </td>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
    function confirmDelete() {
        event.preventDefault(); // Prevent the form from submitting immediately
        const form = event.target;

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Submit the form if confirmed
            }
        });

        return false; // Prevent the default form submission
    }
</script>

                            
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Academic Level</th>
                            <th>GPA</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
