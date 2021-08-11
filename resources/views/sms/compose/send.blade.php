@extends('layouts.userLayout' , ['title' => trans('label.sms.send')])
@push('after-styles')
    {{--{!! Html::style(url("vendor/bootstrap-fileupload/bootstrap-fileupload.min.css")) !!}--}}
    {{--{!! Html::style(url("assets/nextbyte/plugins/tagify/css/tagify.css")) !!}--}}


    <style>
        #variable {
            background-color: red;
        }

        .input-file-container {
            position: relative;
            width: 225px;
        }
        .js .input-file-trigger {
            display: block;
            padding: 14px 45px;
            background: #39D2B4;
            color: #fff;
            font-size: 1em;
            transition: all .4s;
            cursor: pointer;
        }
        .js .input-file {
            position: absolute;
            top: 0; left: 0;
            width: 225px;
            opacity: 0;
            padding: 14px 0;
            cursor: pointer;
        }
        .js .input-file:hover + .input-file-trigger,
        .js .input-file:focus + .input-file-trigger,
        .js .input-file-trigger:hover,
        .js .input-file-trigger:focus {
            background: #34495E;
            color: #39D2B4;
        }

        .file-return {
            margin: 0;
        }
        .file-return:not(:empty) {
            margin: 1em 0;
        }
        .js .file-return {
            font-style: italic;
            font-size: .9em;
            font-weight: bold;
        }
        .js .file-return:not(:empty):before {
            content: "Selected file: ";
            font-style: normal;
            font-weight: normal;
        }



        /* Useless styles, just for demo styles */



        h2 + P {
            text-align: center;
        }
        .txtcenter {
            margin-top: 4em;
            font-size: .9em;
            text-align: center;
            color: #aaa;
        }
        .copy {
            margin-top: 2em;
        }
        .copy a {
            text-decoration: none;
            color: #1ABC9C;
        }
        h5 {
            width: 100%;
            text-align: center;
            border-bottom: 1px solid #dd803f;
            line-height: 0.1em;
            margin: 10px 0 20px;
        }
        h5 span {
            background:#fff;
            padding:0 10px;
        }
        /*h5 span.line:before,  h5 span.line:after {*/
        /*content: "\2015";*/
        /*color: #bf601f;*/
        /*}*/

    </style>
@endpush
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-content collapse show">

                <div class="card-body">
                    <form method="POST" action={{url('sms/store')}} enctype="multipart/form-data">
                        @csrf


                    <header class="card-header card-header-custom">
                        <h2 class="card-title" style="color: white" >{!! trans('label.sms.send') !!}</h2>
                    </header>

                    <br/>




                    <div class="form-body mb-3">

                        <div class="row" id="contacts">
                            <div class="col-md-10 col-sm-10 mt-3 offset-1">
                                <div class="form-group">
                                    <label for="phone_number">Send to</label>
                                    <input type="text" name="phone_number" class="form-control" id="phone_number">
                                    <label class="badge badge-danger" style="font-size: 14px;"></label>
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
                                    <input type="textarea" name="message" class="form-control" id="message">
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
@endsection

@push('after-scripts')
    {{--    {!! Html::script(url("vendor/bootstrap-fileupload/bootstrap-fileupload.min.js")) !!}
        {!! Html::script(url("assets/nextbyte/plugins/tagify/js/tagify.js")) !!}
        {!! Html::script(url("assets/nextbyte/plugins/tagify/js/jQuery.tagify.min.js")) !!}--}}

    {{--{!! Html::script(url("assets/convertExcelToJSON/js/jquery.js")) !!}--}}



@endpush
