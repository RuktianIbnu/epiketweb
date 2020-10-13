@extends('layouts.depan')

@section('content')
<div class="limiter">
    <div class="container-login100" style="background-image: url('assets/images/imigrasi.jpeg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
                <span class="login100-form-logo">
                    <img src="{{asset('assets/images/logoimi.png')}}" alt="IMIGRASI">
                </span>

                <span class="login100-form-title p-b-34 p-t-27">
                    LOG IN
                </span>

                <div class="wrap-input100 validate-input" data-validate = "nip">
                    <input id="login" type="text" placeholder="NIP" class="input100{{ $errors->has('nip') ? ' is-invalid' : '' }}" name="login" value="{{ old('nip') }}" required>
                    
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    
                </div>
                

                <div class="wrap-input100 validate-input" data-validate="password">
                    <input id="password" type="password" placeholder="password" class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    
                </div>
                @if ($errors->has('nip') || $errors->has('password'))
                    <div id="breathing-button">
                        <strong>{{ $errors->first('nip') ?: $errors->first('password')}}</strong>
                    </div>
                @endif

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        {{ __('Login') }}
                    </button>

                </div>

                <div class="text-center p-t-20">
                        <a class="txt1" href="{{ route('regis') }}">
                            {{ __('Belum punya akun?') }}
                        </a>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>
@endsection