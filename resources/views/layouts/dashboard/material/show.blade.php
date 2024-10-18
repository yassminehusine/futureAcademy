@extends('layouts.dashboard.layout')
@section('content2')
<div class="col-md-12">
    <!-- Materials Index -->
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Materials List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>File</th>
                        <th>Image</th>
                        <th>User</th>
                        <th>Course</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materials as $material)
                        <tr>
                            <td>{{$material->title}}</td>
                            <td>{{$material->description}}</td>
                            <td>
                            @if($material->file_path)
                                @php
                                    $fileExtension = pathinfo($material->file_path, PATHINFO_EXTENSION);
                                @endphp
                                <a href="{{ route('download', ['filename' => basename($material->file_path)]) }}" target="_blank" download>
                                    @if($fileExtension == 'pdf')
                                        <i class="fas fa-file-pdf text-danger"></i> 
                                    @elseif(in_array($fileExtension, ['ppt', 'pptx']))
                                        <i class="fas fa-file-powerpoint text-warning"></i> 
                                    @elseif(in_array($fileExtension, ['doc', 'docx']))
                                        <i class="fas fa-file-word text-primary"></i> 
                                    @elseif(in_array($fileExtension, ['xls', 'xlsx']))
                                        <i class="fas fa-file-excel text-success"></i> 
                                    @else
                                        <i class="fas fa-file-alt"></i> File
                                    @endif
                                </a>
                            @else
                                N/A
                            @endif
                        </td>

                            <td>
                                @if($material->thumbnail_path)
                                    <img src="{{ asset($material->thumbnail_path) }}" alt="Thumbnail" style="width: 100px; height: auto;">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $material->user->name }}</td>
                            <td>{{ $material->courses_id}}</td>
                            <td>
                                <a href="{{ route('material.edit', $material->id) }}">
                                     <i class="fas fa-edit text-info"></i> 
                                </a>
                               <a href="{{ route('material.destroy', $material->id) }}">
                                <i class="fa fa-trash text-danger"></i>
                               </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection
