@extends('layouts.dashboard.layout')
@section('content2')
           <div class="col-md-6">
             <div class="card card-dark card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset($user->image)}}"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center text-success">{{$user->name}}</h3>
                @if(auth()->user()->role === "students"||auth()->user()->role === "doctors")
                <p class="text-muted text-center text-success">
                {{$department->department_name}}</p>
                @endif
                <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                 <b>Academic Year</b> 
                  <a class="float-right text-success">
                      @if($user->academic_level == 1)
                          First Year
                      @elseif($user->academic_level == 2)
                        Second Year
                      @elseif($user->academic_level == 3)
                      Third Year
                    @elseif($user->academic_level == 4)
                      Fourth Year
                    @elseif($user->academic_level == 'graduated')
                        Is Graduated
                      @else
                      Undefined
                  @endif
                  </a> 
                  <li class="list-group-item ">
                    <b>Address</b> <a class="float-right text-success">{{$user->address}}</a>
                  </li>
                  <li class="list-group-item">
                   <b>Job Type</b> 
                    <a class="float-right text-success">
                        @if($user->role == 'Admin')
                            Administrator
                        @elseif($user->role == 'doctors')
                            Doctor
                        @elseif($user->role == 'students')
                            Student
                        @else
                            Undefined
                        @endif
                    </a>
                <li class="list-group-item ">
                    <b>Academic_Mail</b><a class="float-right text-success">{{$user->email}}</a>
                  </li>
                </ul>
              </div>
              </div>            
          </div>
          <div class="col-md-6 ">
            <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                          </div>
                          <!-- /.card-header -->
                          <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                              B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">Malibu, California</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                              <span class="tag tag-danger">UI Design</span>
                              <span class="tag tag-success">Coding</span>
                              <span class="tag tag-info">Javascript</span>
                              <span class="tag tag-warning">PHP</span>
                              <span class="tag tag-primary">Node.js</span>
                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                          </div>
                          <!-- /.card-body -->
            </div>
          </div>      
@endsection