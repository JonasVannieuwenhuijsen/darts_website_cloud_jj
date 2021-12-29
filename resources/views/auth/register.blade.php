@extends('layouts.app')

@section('content')
<div class="card-container">
            <div class="card">
                

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="card-header">{{ __('Register') }}</div>

                        <div class="inputBox">
                            <!-- <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label> -->

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="name" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="inputBox">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label> -->

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="inputBox">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> -->

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="inputBox">
                            <!-- <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label> -->

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="confirm password" required autocomplete="new-password">
                        </div>

                        <div class="button-containter">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
