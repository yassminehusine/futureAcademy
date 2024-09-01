@extends('layouts.dashboard.layout')
@section('content2')
<div class="col-md-12">
<div class="card card-dark">
    <div class="card">
    <div class="card-header">
                <h3 class="card-title">DataTable Course </h3>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover text-center">
                  <thead>
                  <tr>
                <th>Course Name</th>
                <th>Description</th>
                <th>Credit Hours</th>
                <th>Department</th>
                <th>Image</th>
                <th>Actions</th>
                </tr>
                  </thead>
                  <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{$course->course_name}}</td>
                        <td>{{$course->description}}</td>
                        <td>{{$course->credit_hours}}</td>
                        <td>{{ $course->department->department_name ?? 'No Department' }}</td> 
                        <td><img src="{{asset($course->image)}}"  class="dep" alt="Course Image"></td>
                        <td>
                         <a href="{{ route('course.edit', ['id' => $course->id]) }}" class="text-success">
                            <i class="fas fa-edit"></i>
                         </a>
                         <a href="{{ route('course.destroy', ['id' => $course->id]) }}" onclick="return confirm('Are you sure you want to delete this item?')" class="text-danger">
                            <i class="fas fa-trash"></i>
                         </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>


    </div>
 </div>
</div>
@endsection