@extends('layouts.dashboard.layout')
@section('content2')
@foreach($user_courses as $course)
<di class="col-lg-4">
<div class="card">
<div class="image">
    <img src="{{asset($course->course->image)}}"  class="img" alt="">
</div>
<div class="card-body">
    <h5 class="card-title">{{$course->course->course_name}}</h5>
    <p class="card-text">{{$course->course->description}}</p>
    <a href="#" class="btn btn-primary">View Course</a>
@if (auth()->user()->role === "doctors")
<a href="{{route('assignment.create', ['id' => $course->course->id])}}" class="btn btn-primary">Add Assignment</a>
@endif
</div>
 </div>
</div>
@endforeach
@endsection