@extends('layouts.dashboard.layout')
@section('content2')
<div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-dark">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable post </h3>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover text-center">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>image</th>
                    <th>description</th>
                    <th>Action </th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($posts as $post)
                  <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td><img src="{{asset($post->image)}}"  class="post" alt="post Image"></td>
                    <td><p class="para">{{$post->description}}</p></td>
                    <td>
                     <a href="{{ route('post.edit', ['id' => $post->id]) }}"  class="text-success">
                       <i class="fas fa-edit"></i>
                       </a>
                       <a href="{{ route('post.destroy',['id' => $post->id])}}" class="text-danger">
                         <i class="fas fa-trash"></i>
                         </a>
                      </td>
                    </td>
                  </tr>
                  @endforeach        
                  </tbody>
                  <tfoot>
                  <tr>
                     <th>id</th>
                    <th>post_name</th>
                    <th>image</th>
                    <th>description</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
              
@endsection