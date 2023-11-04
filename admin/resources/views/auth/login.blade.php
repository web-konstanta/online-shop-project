@extends('auth.layouts.app')

@section('title', 'Log in')

@section('content')
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          @if(session()->has('logout'))
            <div class="alert alert-success text-center">{{ session()->get('logout') }}</div>
          @endif
            @if(session()->has('error'))
              <div class="alert alert-warning text-center">{{ session()->get('error') }}</div>
            @endif
          <h4 class="mb-2">Log in your account</h4>

          <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              @error('email')
              <p style="color: #f00f00">{{ $message }}</p>
              @enderror
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus="">
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
              </div>
              @error('password')
              <p style="color: #f00f00">{{ $message }}</p>
              @enderror
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="············" aria-describedby="password">
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>

          <p class="text-center">
            <span>New on the platform?</span>
            <a href="{{ route('register-view') }}">
              <span>Create an account</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
@endsection
