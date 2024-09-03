@extends('layouts.dashboard.layout')
@section('content2')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User Courses</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="userCoursesTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Course Name</th>
                        <th>Practical Mark</th>
                        <th>Total Mark</th>
                        <th>Test Mark</th>
                        <th>Grade</th>
                        <th>Group Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user_courses as $user_course)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                                @if($user_course->user)
                                    {{ $user_course->user->name }}
                                @else
                                    No user available
                                @endif
                         </td>
                        <td>{{ $user_course->course->course_name }}</td>
                        <td>{{ $user_course->pract_mark ?? 'N/A' }}</td>
                        <td>{{ $user_course->total_mark ?? 'N/A' }}</td>
                        <td>{{ $user_course->test_mark ?? 'N/A' }}</td>
                        <td>{{ $user_course->grade ?? 'N/A' }}</td>
                        <td>{{ $user_course->group_number ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('user_course.edit', $user_course->id) }}">
                              <i class="fa fa-edit text-success"> </i>
                            </a>
                            <a href="{{ route('user_course.destroy', $user_course->id)}}">
                                <i class="fa fa-trash text-danger"> </i> </a>
                            </a>
                       
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#userCoursesTable').DataTable();
    });
</script>
@endsection