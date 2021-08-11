@extends('layouts.userLayout')

@section('content')
    <div class="container">
        <a class="btn btn-secondary" href="/home">Go Back</a>
        <h3 class="text-center">Send sms</h3>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content collapse show">

                        <div class="card-body">
                            <form method="POST" action="/sms/store" enctype="multipart/form-data">
                                @csrf
                                <br/>
                                <div class="form-body mb-3">

                                    <div class="row" id="contacts">
                                        <div class="col-md-10 col-sm-10 mt-3 offset-1">
                                            <div class="form-group">
                                                <label for="phone_number">Send to</label>
                                                <input type="text" name="phone_number" class="form-control" id="phone_number">
                                                @error('phone_number')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        {{--                            @include('sms.includes.variables')--}}
                                    </div>

                                    <div class="row" >
                                        <div class="col-md-10 col-sm-10 mt-3 offset-1">
                                            <div class="form-group">
                                                <label for="message">Message</label>
                                                <br>
                                                <textarea id="message" name="message" rows="4" cols="109" maxlength="200"></textarea>
                                                @error('message')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    {{--Display loader after submit form--}}
                                    <hr>

                                    <div class="form-actions">
                                        <div style="text-align: center;">
                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{--        @include('sms.import_numbers.modal')--}}

            </div>

        </div>
    </div>
@endsection
