@extends('layouts.dashboard.layout')
@section('content2')
<div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Create User Course</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @csrf
         <form id="quickForm" novalidate="novalidate" action="{{ route('user_course.store') }}" method="POST">
            @csrf
            <div class="card-body">
            <div class="form-group">
                 <label for="user_id">User</label>
                 <!-- <datalist id="user_search" name="user_id" class="form-control  @error('user_id') is-invalid @enderror" onchange="checkAutofill()">

                 </datalist> -->
                <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id">
                    @foreach ($users as $user)
                    <option value="{{$user->id}}" {{ auth()->user()->id == $user->id ? 'selected' : '' }}>
                          {{$user->name}}
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
                        <option disabled selected>Select Course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
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
                    <input type="text" name="pract_mark" class="form-control @error('pract_mark') is-invalid @enderror" id="pract_mark" placeholder="Enter Practical Mark" value="{{ old('pract_mark') }}">
                    @error('pract_mark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total_mark">Total Mark</label>
                    <input type="text" name="total_mark" class="form-control @error('total_mark') is-invalid @enderror" id="total_mark" placeholder="Enter Total Mark" value="{{ old('total_mark') }}">
                    @error('total_mark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="test_mark">Test Mark</label>
                    <input type="text" name="test_mark" class="form-control @error('test_mark') is-invalid @enderror" id="test_mark" placeholder="Enter Test Mark" value="{{ old('test_mark') }}">
                    @error('test_mark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="grade">Grade</label>
                    <select name="grade" class="form-control @error('grade') is-invalid @enderror" id="grade">
                        <option disabled selected>Select Grade</option>
                        @foreach (['A+', 'A', 'B+', 'B', 'C+', 'C', 'D+', 'D', 'F'] as $grade)
                            <option value="{{ $grade }}" {{ old('grade') == $grade ? 'selected' : '' }}>
                                {{ $grade }}
                            </option>
                        @endforeach
                    </select>
                    @error('grade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="group_number">Group Number</label>
                    <input type="text" name="group_number" class="form-control @error('group_number') is-invalid @enderror" id="group_number" placeholder="Enter Group Number" value="{{ old('group_number') }}">
                    @error('group_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
