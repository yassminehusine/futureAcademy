@extends('layouts.dashboard.layout')
@section('content2')
<!-- left column -->
<div class="col-md-12">
    <!-- jquery validation -->
     <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Submission for {{$assignment->title}}</h3>
        </div>
        <div class="card-body">
    @csrf
    <form id="quickForm" novalidate="novalidate" action="{{ route('submission.store', ['id' =>$id]) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group w-100 bg-white h-25 my-5 p-4 border text-center">

    <h6>{{$assignment->content}}</h6>
     
      </div>
    <div class="form-group">
              <textarea id="summernote"  name="submission_text" rows="5">
                
            
              </textarea>
              @error('submission_text')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
      </div>
    <div class="form-group">
        <label for="submission_file">File
         <img src="https://cdn-icons-png.flaticon.com/512/8191/8191607.png" alt="upload" width="100px">
         <input type="file" name="submission_file" hidden  class="form-control @error('submission_file') is-invalid @enderror" id="submission_file">
        </label>
         @error('submission_file')
            <span class="invalid-feedback" role="alert">
             <strong>{{ $message }}</strong>
             </span>
        @enderror
    </div>
    <div class="form-group">
              <textarea id="summernote"  name="comment" placeholder="Comment..." class="form-control" style="resize:none;" rows="5">
            
              </textarea>
              @error('comment')
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