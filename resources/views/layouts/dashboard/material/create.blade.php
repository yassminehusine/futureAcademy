@extends('layouts.dashboard.layout')
@section('content2')
<div class="col-md-12">
    <!-- Create Material Form -->
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Create Material</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form id="quickForm" action="{{ route('material.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Title" value="{{ old('title') }}">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Enter Description">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="file_path">File</label>
                    <input type="file" name="file_path" class="form-control @error('file_path') is-invalid @enderror" id="file_path">
                    @error('file_path')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="thumbnail_path">Thumbnail</label>
                    <input type="file" name="thumbnail_path" class="form-control @error('thumbnail_path') is-invalid @enderror" id="thumbnail_path">
                    @error('thumbnail_path')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id" {{ auth()->user()->role == 'student' ? 'disabled' : '' }}>
                    <option disabled selected>Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ auth()->user()->id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                @error('user_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
                <div class="form-group">
                    <label for="courses_id">Course</label>
                    <select name="courses_id" class="form-control @error('courses_id') is-invalid @enderror" id="courses_id">
                        <option disabled selected>Select Course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ old('courses_id') == $course->id ? 'selected' : '' }}>
                                {{ $course->course_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('courses_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection