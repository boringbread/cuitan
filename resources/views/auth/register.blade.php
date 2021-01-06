@extends('layouts.app')

@section('content')
<div class="container-fluid bg-dark">
    <div class="row justify-content-center" style="height: 100vh">
        <div class="col-md-8 text-primary">
                <div class="card-body d text-center">
                   
                    <form method="POST" action="{{ route('register') }}" class="col-12 my-2">
                        @csrf

                        <div class="form-group row d-flex justify-content-center text-white">

                            <div class="col-8">
                                <i class="fab fa-twitter" style="font-size: 48px"></i>
                                <h2>Daftar ke Cuitan</h2>
                            </div>
                        </div>

                        <div class="form-group row text-left d-flex justify-content-center">

                            <div class="col-8 border border-primary rounded ">
                                <label for="nama" style="margin: 0">Nama</label>
                                <input id="username"style="border: 0;outline: none ;box-shadow: none" type="text" class="mb-1 text-white form-control @error('name') is-invalid @enderror bg-dark" name="username" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row text-left d-flex justify-content-center">

                            <div class="col-8 border border-primary rounded">
                                <label for="nama" style="margin: 0">Username</label>
                                <input id="disp_name"type="text" style="border: 0;outline: none ;box-shadow: none" class="mb-1 text-white bg-dark form-control @error('name') is-invalid @enderror" name="disp_name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row text-left d-flex justify-content-center">

                            <div class="col-8 border border-primary rounded">
                                <label for="nama" style="margin: 0">Email</label>
                                <input id="email" type="email" style="border: 0;outline: none ;box-shadow: none ;" class="mb-1 text-white bg-dark form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row text-left d-flex justify-content-center">

                            <div class="col-8 border border-primary rounded">
                                <label for="nama" style="margin: 0">Password</label>
                                <input id="password" type="password" style="border: 0;outline: none ;box-shadow: none;" class="mb-1 text-white bg-dark form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row text-left d-flex justify-content-center">

                            <div class="col-8 border border-primary rounded">
                                <label for="nama" style="margin: 0">Confirm Password</label>
                                <input id="password-confirm" style="border: 0;outline: none ;box-shadow: none ;" type="password" class="mb-1 text-white bg-dark form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0 d-flex justify-content-center">
                            <div class="col-8">
                                <button type="submit" class="btn btn-primary rounded-pill w-100">
                                    {{ __('Daftar') }}
                                </button>
                                <button type="submit" class="btn btn-success rounded-pill w-100 mt-1">
                                    {{ __('Kembali') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
