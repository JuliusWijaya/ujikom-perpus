@extends('layouts.main')

@section('content')
    <main class="login-form">
        <div class="row justify-content-center">
            <div class="col col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ __('Masuk') }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div class="form-group row mt-3">
                                <label for="email_address" class="form-label">
                                    E-Mail Address
                                </label>
                                <div class="col">
                                    <input type="email" id="email_address" class="form-control" name="email" required
                                        autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="col">
                                    <input type="password" id="password" class="form-control" name="password" required
                                        minlength="6" maxlength="30">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mt-3">
                                <div class="col">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="p-2">
                                <button type="submit" class="btn btn-primary form-control fw-semibold">
                                    Masuk
                                </button>
                            </div>
                        </form>
                        <div class="my-3 text-center">
                            <span class="">
                                {{ __(' Belum punya akun?') }}
                                <a href="{{ route('register') }}" class="fw-semibold text-decoration-none">
                                    {{ __('Daftar') }}
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
