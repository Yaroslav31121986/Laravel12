@extends('layouts.admin')

@section('content_admin')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="u-name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="u-name" type="text" class="form-control{{ $errors->has('u_name') ? ' is-invalid' : '' }}" name="u_name" value="{{ old('u_name') }}" required autofocus>
                                    @if ($errors->has('u_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('u_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="u-login" class="col-md-4 col-form-label text-md-right">{{ __('Login') }}</label>

                                <div class="col-md-6">
                                    <input id="u-login" type="text" class="form-control{{ $errors->has('u_login') ? ' is-invalid' : '' }}" name="u_login" value="{{ old('u_login') }}" required>

                                    @if ($errors->has('u_login'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('u_login') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="u-group" class="col-md-4 col-form-label text-md-right">{{ __('u_group') }}</label>

                                <div class="col-md-6">
                                    <input id="u-group" type="text" class="form-control{{ $errors->has('u_group') ? ' is-invalid' : '' }}" name="u_group" value="{{ old('u_group') }}" required>

                                    @if ($errors->has('u_group'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('u_group') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="u-lang" class="col-md-4 col-form-label text-md-right">{{ __('u_lang') }}</label>

                                <div class="col-md-6">
                                    <input id="u-lang" type="text" class="form-control{{ $errors->has('u_lang') ? ' is-invalid' : '' }}" name="u_lang" value="{{ old('u_lang') }}" required>

                                    @if ($errors->has('u_lang'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('u_lang') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                            <br>
                            @if (! empty($massage))
                                <div class="alert alert-success" role="alert">
                                    {{ $massage }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
