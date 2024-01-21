@extends('layout.head')
<!-- Font Awesome CSS -->
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"> --}}
@push('title')
Register Distributor
@endpush

<style>
    .input-group-text {
        cursor: pointer;
    }
</style>

<div class="container">
    <div class="row justify-content-center" style="height: 100vh;">
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="card w-100">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <div class="input-group">
                                <input type="text" value="{{ $data['id'] }}" class="d-none" name="id">
                                <input id="username" value="{{ $data['username'] }}" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" required autofocus readonly>
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required value="{{ old('password') }}">
                                <span class="input-group-text" id="togglePassword" onclick="togglePasswordVisibility()">
                                    <i class="fas fa-eye" id="eye-icon"></i>
                                </span>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input id="password_confirmation" type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                                <span class="input-group-text" id="toggleConfirmPassword"
                                    onclick="toggleConfirmPasswordVisibility()">
                                    <i class="fas fa-eye" id="confirm-eye-icon"></i>
                                </span>
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">
                                {{ __('Daftar') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    function togglePasswordVisibility() {
        var passwordInput = document.getElementById("password");
        var eyeIcon = document.getElementById("eye-icon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }
    function toggleConfirmPasswordVisibility() {
        var confirmPasswordInput = document.getElementById("password_confirmation");
        var confirmEyeIcon = document.getElementById("confirm-eye-icon");

        if (confirmPasswordInput.type === "password") {
            confirmPasswordInput.type = "text";
            confirmEyeIcon.classList.remove("fa-eye");
            confirmEyeIcon.classList.add("fa-eye-slash");
        } else {
            confirmPasswordInput.type = "password";
            confirmEyeIcon.classList.remove("fa-eye-slash");
            confirmEyeIcon.classList.add("fa-eye");
        }
    }
</script>