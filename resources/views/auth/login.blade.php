@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-lg-5 offset-lg-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="text-center">Masuk</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login.post') }}" class="needs-validation">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1"
                                        required autofocus>
                                </div>

                                <div class="form-group">
                                    <label for="email">Password</label>
                                    <input id="password" type="password" class="form-control" name="password"
                                        tabindex="2" required>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                            id="remember-me">
                                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Masuk
                                    </button>
                                </div>
                            </form>

                            <div class="mt-3 text-muted text-center">
                                Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
