@extends('layouts.dashboard.layout')
@section('content2')
<div class="col-md-12">
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Edit User</h3>
        </div>
        <!-- Form for editing user -->
        @csrf 
        <form id="quickForm" novalidate="novalidate" action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
             @csrf          
               <div class="card-body">
                <!-- Name -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Your Name" value="{{ old('name', $user->name) }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <!-- Image -->
                <div class="form-group">
                    <label for="image">Image
                        <img src="{{ $user->image ? asset($user->image) : 'https://cdn-icons-png.flaticon.com/512/8191/8191607.png' }}" alt="upload" width="100px">
                        <input type="file" name="image" hidden class="form-control @error('image') is-invalid @enderror" id="image">
                    </label>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <!-- Role -->
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-control @error('role') is-invalid @enderror" id="role">
                        <option disabled selected>Select Role</option>
                        <option value="Admin" {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="doctors" {{ old('role', $user->role) == 'doctors' ? 'selected' : '' }}>Doctors</option>
                        <option value="students" {{ old('role', $user->role) == 'students' ? 'selected' : '' }}>Students</option>
                    </select>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <!-- Academic Years -->
                <div class="form-group">
                    <label for="academic_years">Academic Years</label>
                    <select name="academic_years" class="form-control @error('academic_years') is-invalid @enderror" id="academic_years">
                        <option disabled selected>Select Year</option>
                        <option value="1" {{ old('academic_years', $user->academic_years) == '1' ? 'selected' : '' }}>First Year</option>
                        <option value="2" {{ old('academic_years', $user->academic_years) == '2' ? 'selected' : '' }}>Second Year</option>
                        <option value="3" {{ old('academic_years', $user->academic_years) == '3' ? 'selected' : '' }}>Third Year</option>
                        <option value="4" {{ old('academic_years', $user->academic_years) == '4' ? 'selected' : '' }}>Fourth Year</option>
                        <option value="graduated" {{ old('academic_years', $user->academic_years) == 'graduated' ? 'selected' : '' }}>Graduated</option>
                    </select>
                    @error('academic_years')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <!-- GPA -->
                <div class="form-group">
                    <label for="GPA">GPA</label>
                    <select name="GPA" class="form-control @error('GPA') is-invalid @enderror" id="GPA">
                        <option disabled selected>Select GPA</option>
                        <option value="4.00" {{ old('GPA', $user->GPA) == '4.00' ? 'selected' : '' }}>4.00</option>
                        <option value="3.83" {{ old('GPA', $user->GPA) == '3.83' ? 'selected' : '' }}>3.83</option>
                        <option value="3.75" {{ old('GPA', $user->GPA) == '3.75' ? 'selected' : '' }}>3.75</option>
                        <option value="3.50" {{ old('GPA', $user->GPA) == '3.50' ? 'selected' : '' }}>3.50</option>
                    </select>
                    @error('GPA')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <!-- Phone -->
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter Your Phone Number" value="{{ old('phone', $user->phone) }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <!-- Address -->
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Enter Your Address" value="{{ old('address', $user->address) }}">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Your Email" value="{{ old('email', $user->email) }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <!-- Department -->
                <div class="form-group">
                    <label for="department_id">Department</label>
                    <select name="department_id" class="form-control @error('department_id') is-invalid @enderror" id="department_id">
                        <option disabled selected>Select Department</option>
                        @foreach ($departments as $depa)
                            <option value="{{ $depa->id }}" {{ old('department_id', $user->department_id) == $depa->id ? 'selected' : '' }}>
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
                
                <!-- Password (optional for editing) -->
                <div class="form-group">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter New Password (optional)">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror 
                </div>
                
                <!-- Confirm Password -->
                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Your Password">
                </div>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-dark">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- SweetAlert for success message -->
@if (session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session("success") }}',
        });
    </script>
@endif
@endsection
