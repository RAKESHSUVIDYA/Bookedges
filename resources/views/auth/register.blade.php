@extends('layouts.app')

@section('content')
<!-- Hero -->

<section class="bg-soft py-5">
<div class="container">
 <div class="card-header">{{ __('Register Account') }}</div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-4">
            <div class="card_mn">
               

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                           

                            <div class="col-md-6">
							
							 <label for="name" class="col-md-6 col-form-label text-md-right row">{{ __('Name') }}</label>
							
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                           

                            <div class="col-md-6">
							
							 <label for="email" class="col-md-6 col-form-label text-md-right row">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                           

                            <div class="col-md-6">
							 <label for="password" class="col-md-6 col-form-label text-md-right row">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                           

                            <div class="col-md-6">
							 <label for="password-confirm" class="col-md-6 col-form-label text-md-right row">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
