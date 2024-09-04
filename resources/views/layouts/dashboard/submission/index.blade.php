@extends('layouts.dashboard.layout')
@section('content2')
<div class="col-md-12">
<div class="card card-dark">
    <div class="card">
    <div class="card-header">
                <h3 class="card-title">DataTable Submissions </h3>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover text-center">
                  <thead>
                  <tr>
                <th>Assignment</th>
                <th>Course</th>
                <th>grade</th>
                <th>status</th>
                <th>submission date</th>
                <th>Actions</th>
                </tr>
                  </thead>
                  <tbody>
                    @foreach($submissions as $submission)
                    <tr>
                        <td>{{$submission->assignment->title}}</td>
                        <td>{{$submission->assignment->course->name}}</td>
                        <td>{{$submission->grade}}</td>
                        <td>{{$submission->status}}</td> 
                        <td>{{$submission->submission_date}}</td> 

                        <td>
                         <a href="{{ route('submission.edit', ['id' => $submission->id]) }}" class="text-success">
                            <i class="fas fa-edit"></i>
                         </a>
                         <a href="{{ route('submission.destroy', ['id' => $submission->id]) }}" onclick="return confirm('Are you sure you want to delete this item?')" class="text-danger">
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