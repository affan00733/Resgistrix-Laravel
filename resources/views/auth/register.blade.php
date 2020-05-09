@extends('frontend.layouts.app')

@section('content')
<section style="background-color:#282828 " class="section">

    <div class="row">
        <div  class="col s12 m6 offset-m3">
            <div style="background-color: #393C3F" class="card">
                <h4 class="center cyan-text uppercase p-t-30">{{ __('Register') }}</h4>

                <div class="p-20">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="input-field col s12">
                                <label for="name">{{ __('Name') }}</label>
                                <input style="color: aliceblue" id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input style="color: aliceblue" id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                        
                        <div class="row">
                            <div class="input-field col s12">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input style="color: aliceblue" id="password-confirm" type="password" name="password_confirmation" required>
                            </div>
                        </div>
                        
                        <p>
                            <label>
                                <input type="checkbox" name="agent" class="filled-in" />
                                <span>{{ __('Registration as Agent') }}</span>
                            </label>
                        </p>
                        
                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="waves-effect waves-light btn cyan">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
