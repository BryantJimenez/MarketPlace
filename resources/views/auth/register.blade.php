@extends('layouts.auth')

@section('title', 'Registrarse')

@section('content')

<section id="wrapper" class="login-register login-sidebar login-image">
    <div class="login-box card">
        <div class="card-body">
            <form class="form-horizontal form-material mt-md-1 mt-2" action="{{ route('register') }}" method="POST" id="formRegister">
                {{ csrf_field() }}
                <p class="h2 text-center db">REGISTRATE</p>
                <div class="form-group m-t-30">
                    <div class="col-xs-12">
                        <label>Nombre</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" required placeholder="Ejm: Juan" value="{{ old('name') }}" autocomplete="name" autofocus>
                    </div>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label>Correo Electrónico</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" required placeholder="{{ 'ejemplo@gmail.com' }}" value="{{ old('email') }}">
                    </div>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label>Contraseña</label>
                        <input class="form-control @error('password') is-invalid @enderror" type="password" required name="password" placeholder="********" id="password">
                    </div>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label>Confirmar Contraseña</label>
                        <input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="********">
                    </div>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit" action="register">Registarse</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-primary m-l-5"><b>Ingresa</b></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection