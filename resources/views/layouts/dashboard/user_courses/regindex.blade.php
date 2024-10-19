@extends('layouts.dashboard.layout')
@section('content2')
<div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Users Registery</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body">

            <div id="users" class="col-10 justify-content-center">

                <div class="row">
                    <input class="search form-control my-4 mx-2 p-2 w-50 " placeholder="Search" id="name" name="name" />
                    <button
                        class="sort btn-dark btn d-inline my-4 mx-2 p-2 text-center w-25 fw-bold vertical-center pb-4 form-control"
                        data-sort="name">
                        <h6>Sort By Name</h6>
                    </button>
                </div>

                <table class="table table-hover w-100 border-2">
                    <thead>
                        <tr>
                            <td class="id col-1">ID</td>
                            <td class="name col-4">Name</td>
                            <td class="col-3">Action
                            </td>

                        </tr>

                    </thead>
                    <!-- IMPORTANT, class="list" have to be at tbody -->
                    <tbody class="list">
                        @foreach ($users as $user)
                            <tr>
                                <td class="id col-1">{{$user->id}}</td>
                                <td class="name col-4">{{$user->name}}</td>
                                <td class="col-3"><a href="{{route('user_course.create', ['id' => $user->id])}}"
                                        class="btn btn-dark">Register</a>
                                </td>

                            </tr>

                        @endforeach


                    </tbody>
                </table>
            </div>



        </div>
    </div>
</div>
@endsection