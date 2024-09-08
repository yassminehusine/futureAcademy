@extends('layouts.dashboard.layout')
@section('content2')
<div class="col-md-12">
    <!-- Edit Material Form -->
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Edit Material</h3>
        </div>
        <!-- form start -->
        @csrf
        <form id="quickForm" action="{{ route('material.update', $material->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter Title" value="{{ old('title', $material->title) }}">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Enter Description">{{ old('description', $material->description) }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="file_path">File</label>
                    <input type="file" name="file_path" class="form-control @error('file_path') is-invalid @enderror" id="file_path" value="{{old($material->file_path)}}">
                    @if ($material->file_path)
                        @php
                            $fileExtension = pathinfo($material->file_path, PATHINFO_EXTENSION);
                        @endphp
                        <a href="{{ asset('storage/materials/' . basename($material->file_path)) }}" target="_blank">
                            @if ($fileExtension == 'pdf')
                            <i class="fa fa-solid fa-file-pdf"></i> 
                            @elseif ($fileExtension == 'doc' || $fileExtension == 'docx')
                            <i class="fa fa-solid fa-file-word"></i> 
                            @elseif ($fileExtension == 'ppt' || $fileExtension == 'pptx')
                               <i class="fa-solid fa-file-powerpoint"></i>
                            @elseif ($fileExtension == 'xls' || $fileExtension == 'xlsx')
                                <i class="fa fa-excel"></i> Excel
                            @else
                                <i class="fa fa-file"></i> Download File
                            @endif
                        </a>
                    @endif
                    @error('file_path')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="thumbnail_path">Photo</label>
                    <input type="file" name="thumbnail_path" class="form-control @error('thumbnail_path') is-invalid @enderror" id="thumbnail_path" value="{{$material->thumbnail_path}}">
                    @if ($material->thumbnail_path)
                        <img src="{{ asset($material->thumbnail_path) }}" alt="Current Thumbnail" style="width: 100px; height: auto;">
                    @endif
                    @error('thumbnail_path')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="user_id">User</label>
                    <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id" {{ auth()->user()->role == 'student' ? 'disabled' : '' }}>
                        <option disabled>Select User</option>
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
                        <option disabled>Select Course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ $material->courses_id == $course->id ? 'selected' : '' }}>
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
                <button type="submit" class="btn btn-dark">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
