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
                <th>author</th>
                <th>grade</th>
                <th>status</th>
                <th>submission date</th>
                <th>Actions</th>
                </tr>
                  </thead>
                  <tbody>
                    @foreach($assignments as $assignment)
                    <tr>
                        <td>{{$assignment->title}}</td>
                        <td>{{$assignment->user->name}}</td>
                        <td>{{$assignment->due_date}}</td>
                        <td></td> 
                        <td>
                         <a href="{{ route('assignment.edit', ['id' => $assignment->id]) }}" class="text-success">
                            <i class="fas fa-edit"></i>
                         </a>
                         <a href="{{ route('assignment.destroy', ['id' => $assignment->id]) }}" onclick="return confirm('Are you sure you want to delete this item?')" class="text-danger">
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