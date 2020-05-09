@extends('frontend.layouts.app')

@section('content')
<section style="background-color:#282828 " class="section">

    <div  class="row">
        <div  class="col s12 m6 offset-m3">
            <div style="background-color: #393C3F" class="card">

                <h4 style="color: cyan" class="center cyan-text uppercase p-t-30">{{ __('Login') }}</h4>

                <div class="p-20">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row">
                            <div class="input-field col s12">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input style="color: aliceblue" id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <label for="password">{{ __('Password') }}</label>
                                <input style="color: aliceblue" id="password" type="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <p>
                            <label>
                                <input  type="checkbox" name="remember" class="filled-in" {{ old('remember') ? 'checked' : '' }} />
                                <span>{{ __('Remember Me') }}</span>
                            </label>
                        </p>

                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="waves-effect waves-light btn cyan">
                                    {{ __('Login') }}
                                </button>

                                <a class="cyan-text p-l-15" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
