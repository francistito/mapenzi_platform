@extends('layouts.userLayout')

@section('content')
<div class="container">
    <a class="btn btn-secondary" href="/">Go Back</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group ">
                            <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="email" class=" col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control" id="phone_number" value=''>
                                </div>
                            </div>
                        </div>





                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio"  id="male" name="gender" value="M" class="custom-control-input" />
                                <label class="custom-control-label" for="male">Male</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio"  id="female" name="gender" value="F" class="custom-control-input" />
                                <label class="custom-control-label" for="female">Female</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birth_date">Birth Date</label>
                            <input type="date" name="birth_date" class="form-control" id="birth_date" value=''>
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" name="country" class="form-control" id="country" value=''>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header">
                                    <h6>Soul mate information</h6>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="desired_soul_mate_gender">Soul Mate Gender</label>
                                            <select class="form-control" name="desired_soul_mate_gender" id="desired_soul_mate_gender">
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="soul_mate_location">Soul Mate Location</label>
                                            <input type="text" name="soul_mate_location" class="form-control" id="soul_mate_location" value=''>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Soul Mate Age</label>
                                            <input type="number" name="desired_soul_mate_age" class="form-control" id="desired_soul_mate_age" value=''>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="password-confirm" class=" col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
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
@endsection
