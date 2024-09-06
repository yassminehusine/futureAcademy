@extends('layouts.dashboard.layout')
@section('content2')
<!-- Content Header (Page header) -->
<!-- left column -->
<div class="col-md-12">
    <!-- jquery validation -->
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Table-User</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @csrf
        <form id="quickForm" novalidate="novalidate" action="{{ route('register') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                        placeholder="Enter Your Name" value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image
                        <img src="https://cdn-icons-png.flaticon.com/512/8191/8191607.png" alt="upload" width="100px">
                        <input type="file" name="image" hidden class="form-control @error('image') is-invalid @enderror"
                            id="image">
                    </label>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-control @error('role') is-invalid @enderror" id="role">
                        <option disabled selected>Select Role</option>
                        <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="doctors" {{ old('role') == 'Doctor' ? 'selected' : '' }}>Doctors</option>
                        <option value="students" {{ old('role') == 'Student' ? 'selected' : '' }}>Students</option>
                    </select>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="academic_level">Academic Years</label>
                    <select name="academic_level" class="form-control @error('academic_level') is-invalid @enderror"
                        id="academic_level">
                        <option disabled selected>Select Year</option>
                        <option value="--" {{ old('academic_level') == '--' ? 'selected' : '' }}>--</option>
                        <option value="First" {{ old('academic_level') == 'First' ? 'selected' : '' }}>First Year</option>
                        <option value="Second" {{ old('academic_level') == 'Second' ? 'selected' : '' }}>Second Year
                        </option>
                        <option value="Third" {{ old('academic_level') == 'Third' ? 'selected' : '' }}>Third Year</option>
                        <option value="Fourth" {{ old('academic_level') == 'Fourth' ? 'selected' : '' }}>Fourth Year
                        </option>
                        <option value="Graduate" {{ old('academic_level') == 'Graduate' ? 'selected' : '' }}>Graduate
                        </option>

                    </select>
                    @error('academic_level')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group" id="gpa-field" style="display:none;">
                    <label for="GPA">GPA</label>
                    <input type="number" name="GPA" step="0.01" min="0" max="4"
                        class="form-control @error('GPA') is-invalid @enderror" id="GPA"
                        placeholder="Enter Your PGPA Number" value="{{ old('GPA') }}">
                    @error('GPA')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone"
                        placeholder="Enter Your Phone Number" value="{{ old('phone') }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                        id="address" placeholder="Enter Your Address" value="{{ old('address') }}">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="Enter Your Email" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="department_id">Department</label>
                    <select name="department_id" class="form-control @error('department_id') is-invalid @enderror"
                        id="department_id">
                        <option disabled selected>Select Department</option>
                        @foreach ($departments as $depa)
                            <option value="{{ $depa->id }}" {{ old('department_id') == $depa->id ? 'selected' : '' }}>
                                {{ $depa->department_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" placeholder="Enter Your Password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password-confirm"
                        class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        placeholder="Confirm Your Password" required autocomplete="new-password">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-dark">Submit</button>
            </div>
    </div>
    <!-- /.card -->
</div>
<!-- /.row -->
<!-- /.container-fluid -->

<!-- Check for success message -->
@if (session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif
<script>
    document.getElementById('role').addEventListener('change', function () {
        var role = this.value;
        var gpaField = document.getElementById('gpa-field');
        if (auth() -> user() -> role === 'student') {
            gpaField.style.display = 'block';
        } else {
            gpaField.style.display = 'none';
        }
    });
</script>
@endsection