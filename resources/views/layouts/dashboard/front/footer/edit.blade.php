@extends('layouts.dashboard.layout')
@section('content2')
<div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Edit User Course</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @csrf
        <form id="quickForm" novalidate="novalidate" action="{{ route('user_course.update',  $user_course->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{  $user_course->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="course_id">Course</label>
                    <select name="course_id" class="form-control @error('course_id') is-invalid @enderror" id="course_id">
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{  $user_course->course_id == $course->id ? 'selected' : '' }}>
                                {{ $course->course_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pract_mark">Practical Mark</label>
                    <input type="text" name="pract_mark" class="form-control @error('pract_mark') is-invalid @enderror" id="pract_mark" value="{{ old('pract_mark',  $user_course->pract_mark) }}">
                    @error('pract_mark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="total_mark">Total Mark</label>
                    <input type="text" name="total_mark" class="form-control @error('total_mark') is-invalid @enderror" id="total_mark" value="{{ old('total_mark',  $user_course->total_mark) }}">
                    @error('total_mark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="test_mark">Test Mark</label>
                    <input type="text" name="test_mark" class="form-control @error('test_mark') is-invalid @enderror" id="test_mark" value="{{ old('test_mark',  $user_course->test_mark) }}">
                    @error('test_mark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                        <label for="grade">Grade</label>
                        <input list="grades" name="grade" class="form-control @error('grade') is-invalid @enderror" id="grade" placeholder="Select Grade" value="{{ old('grade', $user_course->grade) }}">
                        
                        <datalist id="grades">
                            @foreach (['A+', 'A', 'B+', 'B', 'C+', 'C', 'D+', 'D', 'F'] as $grade)
                                <option value="{{ $grade }}">
                            @endforeach
                        </datalist>

                        @error('grade')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                <div class="form-group">
                    <label for="group_number">Group Number</label>
                    <input type="text" name="group_number" class="form-control @error('group_number') is-invalid @enderror" id="group_number" value="{{ old('group_number',  $user_course->group_number) }}">
                    @error('group_number')
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
