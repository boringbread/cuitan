@extends('layouts.app')

@section('content')
<div class="container-fluid ">
    <div class="row justify-content-center">
        <div class="col-md-8 text-primary">
            <div class="card-body d text-center w-75 px-5 py-0" style="margin:0 auto">
                <div class="">
                    <form method="POST" action="{{ route('register') }}" class="col-12 my-3">
                        @csrf
                        <div class="form-group row d-flex justify-content-center">
                            <div class="col-8">
                                <i class="fab fa-twitter" style="font-size: 48px"></i>
                                <h3>Daftar ke Cuitan</h3>
                            </div>
                        </div>

                        <div class="form-group row text-left d-flex justify-content-center">
                            <div class="col-8 border border-primary rounded px-1 ">
                                <small for="username" style="margin: 0">Username</small>
                                <input id="username" name="username" style="border: 0;outline: none ;box-shadow: none" type="text" class="  form-control p-0 @error('username') is-invalid @enderror " name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row text-left d-flex justify-content-center">
                            <div class="col-8 border border-primary rounded px-1">
                                <small for="nama" style="margin: 0">Display Name</small>
                                <input id="disp_name"type="text" style="border: 0;outline: none ;box-shadow: none" class="   form-control p-0 @error('name') is-invalid @enderror" name="disp_name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row text-left d-flex justify-content-center">
                            <div class="col-8 border border-primary rounded px-1">
                                <small for="nama" style="margin: 0">Email</small>
                                <input id="email" type="email" style="border: 0;outline: none ;box-shadow: none ;" class="   form-control p-0 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row text-left d-flex justify-content-center">
                            <div class="col-8 border border-primary rounded px-1">
                                <small for="nama" style="margin: 0">Password</small>
                                <input id="password" type="password" style="border: 0;outline: none ;box-shadow: none;" class="   form-control p-0 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row text-left d-flex justify-content-center">
                            <div class="col-8 border border-primary rounded px-1">
                                <small for="nama" style="margin: 0">Confirm Password</small>
                                <input id="password-confirm" style="border: 0;outline: none ;box-shadow: none ;" type="password" class="   form-control p-0" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0 d-flex justify-content-center">
                            <div class="col-8">
                                <button type="submit" class="btn btn-primary rounded-pill w-100 mb-2">
                                    {{ __('Daftar') }}
                                </button>
                                <a href="{{route('login')}}">&larr; Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
