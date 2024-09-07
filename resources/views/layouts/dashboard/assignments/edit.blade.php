@extends('layouts.dashboard.layout')
@section('content2')
<!-- left column -->
<div class="col-md-12">
    <!-- jquery validation -->
     <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Table-assignments</h3>
        </div>
        <div class="card-body">
    @csrf
    <form id="quickForm" novalidate="novalidate" action="{{ route('assignment.update' ,$assignment->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" required value="{{$assignment->title}}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    </div>
    <div class="form-group">
              <textarea id="summernote"  name="content">
              {{$assignment->content}}
              </textarea>
              @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
      </div>
    <div class="form-group">
        <label for="file_path">File
         <img src="https://cdn-icons-png.flaticon.com/512/8191/8191607.png" alt="upload" width="100px">
         <input type="file" name="file_path" hidden  class="form-control @error('file_path') is-invalid @enderror" id="file_path">
        </label>
         @error('file_path')
            <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
             </span>
        @enderror
    </div>
    <div class="form-group">
            <label for="assignment_points">Points for assignment</label>
            <input type="number" name="assignment_points" class="form-control" id="assignment_points" required max="3">
            @error('assignment_points')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
       <div class="form-group">
            <label for="due_date">Due Date -- {{$assignment->due_date}}</label>
            <input type="datetime-local" name="due_date" class="form-control" id="due_date" required>
            @error('due_date')
                <div class="alert alert-danger">{{ $message }}</div>
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