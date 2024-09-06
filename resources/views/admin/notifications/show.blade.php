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
                            <th>Type</th>
                            <th>Title</th>
                            <th>body</th>
                            <th>Created at</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notifications as $notification)
                        <tr>
                            <td>{{ $notification->type }}</td>
                            <td>{{ $title }}</td>
                            <td>{{ $body }}</td>
                            <td>{{ $notification->created_at }}</td>
                            <td>
                  
                          
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
                            <th>Type</th>
                            <th>Data</th>
                            <th>Created at</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
