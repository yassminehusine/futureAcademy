@extends('layouts.dashboard.layout')
@section('content2')
<!-- left column -->
<div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Table-Courses</h3>
        </div>
        <div class="card-body">
            @csrf
            <form id="quickForm" novalidate="novalidate" action="{{ route('course.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="course_name">Course Name</label>
                    <input type="text" name="course_name" class="form-control" id="course_name"
                        value="{{ old('course_name') }}" required>
                    @error('course_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="course_code">Couse Code</label>
                    <input type="text" name="course_code"
                        class="form-control @error('course_code') is-invalid @enderror" id="course_code"
                        placeholder="">
                    @error('course_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea id="summernote" name="description">
              {{ old('description') }}
              </textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image
                        <img src="https://cdn-icons-png.flaticon.com/512/8191/8191607.png" alt="upload" width="100px">
                        <input type="file" name="image" hidden class="form-control @error('image') is-invalid @enderror"
                            id="image">
                    </label>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="credit_hours">Credit Hours</label>
                    <input type="text" name="credit_hours" class="form-control" id="credit_hours"
                        value="{{ old('credit_hours') }}" required>
                    @error('credit_hours')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="department_id">Department</label>
                    <select name="department_id" class="form-control @error('department_id') is-invalid @enderror"
                        id="department_id">
                        <option disabled selected>Select Department</option>
                        @foreach ($departments as $depa)
                            <option value="{{ $depa->id }}" {{ old('department_id') == $depa->id ? 'selected' : '' }}>
                                {{ $depa->department_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-dark">Submit</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection