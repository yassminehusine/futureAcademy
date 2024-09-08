@extends('layouts.dashboard.layout')

@section('content2')
<div class="container mt-5">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Edit Department</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="quickForm" novalidate="novalidate" action="{{ route('department.update', $department->id) }}" method="post" enctype="multipart/form-data">
            @csrf 
            <div class="card-body">
                <!-- Department Name -->
                <div class="form-group">
                    <label for="department_name">Department Name</label>
                    <input type="text" name="department_name" class="form-control @error('department_name') is-invalid @enderror" id="department_name" value="{{$department->department_name}}">
                    @error('department_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Image -->
                <div class="form-group">
                    <label for="image">
                        <img src="{{ asset($department->image) }}" alt="Current Image" width="100px">
                        <input type="file" name="image"  hidden  class="form-control @error('image') is-invalid @enderror" id="image" value="{{$department->image}}">
                    </label>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="4" placeholder="Enter Description">{{ $department->description }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Department Number -->
            
                
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-dark">Update</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>
<!-- Check for success message -->
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}',
        confirmButtonText: 'OK',
    });
</script>
@endif
@endsection
