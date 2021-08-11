@extends('layouts.app' , ['title' => trans('label.sms.send')])
@push('after-styles')
    {{--{!! Html::style(url("vendor/bootstrap-fileupload/bootstrap-fileupload.min.css")) !!}--}}
    {{--{!! Html::style(url("assets/nextbyte/plugins/tagify/css/tagify.css")) !!}--}}
    {!! Html::style(url('vendor/sweetalert/sweetalert.css')) !!}


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
@include('includes.datetimepicker')
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-content collapse show">

                <div class="card-body">

                    {{ Form::open(['route' => 'sms.create', 'autocomplete' => 'off', 'id' =>'create_sms_form' ,'enctype'=>'multipart/form-data', 'class' => 'create_sms_form', 'name' => 'create_sms_form']) }}
                    <header class="card-header card-header-custom">
                        <h2 class="card-title" style="color: white" >{!! trans('label.sms.send') !!}</h2>
                    </header>

                    <br/>

                    {{--                    <div class="row">
                                            <div class="col-md-10 col-sm-10 offset-1">
                                                <div class="form-group">
                                                    <label class="required_asterik" for="">{{ trans('label.sms.select_send_option') }}</label>
                                                    {!! Form::select('send_option', code_value()->getCodeForSelect(6), 13, ['class' => 'select2 form-control','id' => 'send_option','aria-describedby' => '','disabled']) !!}
                                                    <div class="form-control-position">
                                                        <i class="ft-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>--}}

                    {{--{{ Form::open(['route' => 'sms.create']) }}--}}
                    {{--
                                        <div class="row">
                                            <div class="col-md-10 col-sm-10 offset-1">

                                            </div>
                                        </div>--}}


                    <div class="form-body mb-3">
                        <div class="row" id="senderID">
                            <div class="col-md-6 col-sm-6 offset-1">
                                <div class="form-group">
                                    {!! Form::label('sender_id', trans('label.sms.sender_id'), ['class' => 'required_asterik'] ) !!}
                                    {{ Form::select('sender_id',[ trans('label.sender_id.system') => $system_sender_ids, trans('label.sender_id.personal') =>  $personal_sender_ids ], $default_sender_id, ['id'=> 'hide_search','class'=>'form-control select2 sender', 'single'=> true ]) }}
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <a class="btn btn-sm btn-primary" href="{{ route('profile.request_sender_id') }}">{!! trans('label.customer.request_sender_id') !!}</a>
                            </div>
                        </div>

                        <div class="row" id="contacts">
                            <div class="col-md-10 col-sm-10 mt-3 offset-1">
                                <div class="form-group">
                                    {!! Form::label('send', trans('label.sms.send_to'), ['class' => 'required_asterik'] ) !!}&nbsp;&nbsp;<small style="color: #777;">@lang('label.select_contact_placeholder')</small>
                                    {{ Form::select('contact[]', [], null, ['data-placeholder' => trans('label.select_contact_placeholder'),'id'=> 'sendTo','class'=>'form-control select2']) }}
                                    <label class="badge badge-danger" style="font-size: 14px;"></label>

                                    {{--<span class="invalid-feedback">
                                        <strong>I am error message...</strong>
                                    </span>--}}
                                </div>
                            </div>
                        </div>

                        <h5><span class="line">@lang('label.sms.file_option')</span></h5>

                        <div class="row">
                            <div class="col-md-4 col-sm-4 offset-4">

                                <div class="form-group">
                                    <input name="contacts_file" class="input-file" id="fileUploader" type="file" onchange="document.getElementById('loadImg').style.display='inline';">
                                    <label class="input-file-trigger" style="text-align: center;">{!! trans('label.select_xls') !!}</label>
                                    <label class="required_asterik" style="text-align: center;"><small>@lang('label.file2sms.description')</small></label>
                                    <p class="file-return" style="font-size: larger"></p>
                                    <label class="badge badge-danger"></label>
                                </div>

                                <div id="loadImg" style="text-align: center; display: none;">
                                    <div ><img src="{!! url('loadingGif.gif') !!}" width="150"></div>
                                </div>
                                <br/>

                            </div>

                            {{--                            <div class="col-md-3 col-sm-3">
                                                            <a target="_blank" style="text-decoration: none;margin-top: 0px;font-size: larger"
                                                               href="{!! url('assets/sms/number_excel_template.xlsx') !!}" download>{!! trans('label.download_sample_file') !!}<i class="fas fa-download ml-1"></i> </a>
                                                        </div>
                                                        <div class="col-md-3 col-sm-3">
                                                            <div><img src="{!! url("img/sending/send_file.png") !!}" alt="sample_file" style="height: 100px"></div>
                                                        </div>--}}

                        </div>
                        <div id="file2sms_preview"  class="scrollable-content"></div>

                        <input type="hidden" value="" name="json_data">
                        <input type="hidden" value="0" name="file2sms_preview">
                        <input type="hidden" value="{{ $reference }}" name="reference">

                        {{--                        <div class="row" id="contacts_file" style="display: none">
                                                    <div class="col-md-10 col-sm-10 mt-3 offset-1">
                                                        <div class="form-group">
                                                            {!! Form::label('send', trans('label.sms.send_to'), ['class' => 'required_asterik'] ) !!}
                                                            <div class="fileupload fileupload-exists" data-provides="fileupload">
                                                                <input type="hidden" value="" name="attachment">
                                                                <input type="hidden" value="" name="specific_name">
                                                                <div class="input-append">
                                                                    <div class="uneditable-input alert alert-primary col-6">
                                                                        <span class="fileupload-preview"></span>
                                                                    </div>
                                                                    <a href="#" onclick="showSendTo()" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">{!! trans('buttons.general.remove') !!}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>--}}

                        <div class="row">
                            @include('sms.includes.select_template', ['template' => $template])
                            @include('sms.includes.variables')
                        </div>

                        <div class="row" >
                            <div class="col-md-10 col-sm-10 mt-3 offset-1">
                                <div class="form-group">
                                    {!! Form::label('message', trans('label.sms.message'), ['class' => 'required_asterik'] ) !!}
                                    {!! Form::textarea('message', null, ['class' => 'form-control ','id' => 'message', 'spellcheck' => 'false', 'data-tags-input-name' => 'add-box', 'placeholder' => trans('label.sms.enter_message'), 'required', 'style' => 'overflow: hidden; word-wrap: break-word; resize: horizontal;border-radius: 3px;']) !!}
                                </div>
                                @include('sms.includes.counter')
                            </div>
                        </div>

                        @include('sms.includes.scheduler')

                        {{--Display loader after submit form--}}
                        <img src="{!! url('preloader.gif') !!}" id="gif" style="display: none; margin: 0 auto; width: 200px; visibility: hidden;">
                        <hr>

                        <div class="form-actions">
                            <div style="text-align: center;">{{ Form::button(trans('buttons.general.analyze').' <i class="icon fa fa-arrow-right"></i>', ['class' => 'btn btn-primary btn-submit', 'type' => 'submit', 'id' => 'submit']) }}</div>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>

        {{--        @include('sms.import_numbers.modal')--}}

    </div>
@endsection

@push('after-scripts')
    {!! Html::script(url('vendor/autosize/autosize.js')) !!}
    {!! Html::script(url('assets/convertExcelToJSON/js/xlsx.full.min.js')) !!}
    {!! Html::script(url('assets/nextbyte/plugins/forms/js/jquery.form.min.js')) !!}
    {!! Html::script(url('vendor/sweetalert/sweetalert.min.js')) !!}

    <script>
        let $gtcnts = '{!! route('contact.get_user_contacts') !!}';
        let contacts=$("#contacts"),sendTo=$("#sendTo"),fileInput=document.querySelector(".input-file"),button=document.querySelector(".input-file-trigger"),the_return=document.querySelector(".file-return");function showLoading(){document.getElementById("loadImg").style="visibility: visible"}function hideLoading(){document.getElementById("loadImg").style="visibility: hidden"}function showSendTo(){$("#contacts_file").hide(),contacts.show(),sendTo.prop("disabled",!1)}$(document).ready(function(){$("#fileUploader").change(function(e){var t=e.target.files[0],n=new FileReader;n.onload=function(e){document.getElementById("loadImg").style="display: none";var t=e.target.result,n=XLSX.read(t,{type:"binary"});let i=n.SheetNames,s=XLSX.utils.sheet_to_row_object_array(n.Sheets[i[0]]),a=JSON.stringify(s);$("input[name='json_data']").val(a),$("input[name=file2sms_preview]").val(1),$("#create_sms_form").submit()},n.onerror=function(e){console.error("File could not be read! Code "+e.target.error.code)},n.readAsBinaryString(t)})}),$(document).ready(function(){$("select[name='send_option']").change(function(e){switch(e.preventDefault(),$(this).val()){case"13":$("#senderID").prop("hidden",!1),$("#hide_search").prop("disabled",!1);break;case"14":$("#senderID").prop("hidden",!0),$("#hide_search").prop("disabled",!0)}}),autosize($("textarea")),$("#sendTo").select2({tags:!0,tokenSeparators:[","," "],multiple:!0,allowClear:!0,placeholder:"",ajax:{url:$gtcnts,data:function(e){return{query:e.term,page:e.page||1}},dataType:"json",processResults:function(e,t){return t.page=t.page||1,{results:e.items,pagination:{more:!0}}},cache:!0,delay:250},escapeMarkup:function(e){return e}}),$(".create_sms_form").on("submit",function(e){e.preventDefault();let t=$("#gif");t.css("visibility","visible"),t.css("display","block");let n=this;$(n).find(".btn-submit").prop("disabled",!0);let i={dataType:"json",type:"POST",url:$(n).attr("action"),beforeSend:function(e){$(n).find(":input").each(function(){$(this).closest(".form-group").removeClass("has-danger").find(".badge-danger").html("")})},success:function(e){if(t.css("visibility","hidden"),t.css("display","none"),$(n).find(".btn-submit").prop("disabled",!1),e.success)switch(e.success){case 2:$("#file2sms_preview").html(e.data.view),$("input[name=json_data]").val(""),$("#select-variables").empty(),$("#select-variables").html(e.data.variables);break;default:document.location=e.redirect_url}else alert(e.message);$("input[name=file2sms_preview]").val(0)},error:function(e){t.css("visibility","hidden"),t.css("display","none"),$(n).find(".btn-submit").prop("disabled",!1);let i=$.parseJSON(e.responseText);$.each(i.errors,function(e,t){$(n).find(':input[name="'+e+'"]').each(function(){$(this).closest(".form-group").addClass("has-danger").find(".badge-danger").html(t)}),$(n).find(':input[name="'+e+'[]"]').each(function(){$(this).closest(".form-group").addClass("has-danger").find(".badge-danger").html(t)})}),$("input[name=file2sms_preview]").val(0)}};$(n).ajaxSubmit(i)}),$("input[name = 'contacts_file']").click(function(){sendTo.prop("disabled",!0)}),document.querySelector("html").classList.add("js"),button.addEventListener("keydown",function(e){13!=e.keyCode&&32!=e.keyCode||fileInput.focus()}),button.addEventListener("click",function(e){return fileInput.focus(),!1}),fileInput.addEventListener("change",function(e){the_return.innerHTML=document.getElementById("fileUploader").files[0].name})});
    </script>

@endpush
