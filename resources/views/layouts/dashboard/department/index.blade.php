@extends('layouts.dashboard.layout')
@section('content2')
<div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-dark">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable Department </h3>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover text-center">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>department name</th>
                    <th>image</th>
                    <th>description</th>
                    <th>department number</th>
                    <th>Action </th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($departments as $dep)
                  <tr>
                    <td>{{$dep->id}}</td>
                    <td>{{$dep->department_name}}</td>
                    <td><img src="{{asset($dep->image)}}"  class="dep" alt="Department Image"></td>
                    <td><p class="para">{{$dep->description}}</p></td>
                    <td>{{$dep->department_number}}</td>
                    <td>
                     <a href="{{ route('department.edit', ['id' => $dep->id]) }}"  class="text-success">
                       <i class="fas fa-edit"></i>
                       </a>
                       <a href="{{ route('department.destroy',['id' => $dep->id])}}" class="text-danger">
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
                    <th>department_name</th>
                    <th>image</th>
                    <th>description</th>
                    <th>department_number</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
              
@endsection