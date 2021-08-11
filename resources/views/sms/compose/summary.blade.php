@extends('layouts.app' , ['title' => trans('label.sms.summary')])
@push('after-styles')
    {!! Html::style(url('vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')) !!}
    {!! Html::style(url('assets/nextbyte/sms/css/smspreview.css')) !!}
<style>
    fieldset
    {
        border: 1px solid #ddd !important;
        margin: 0;
        min-width: 0;
        padding: 5px;
        position: relative;
        border-radius:4px;
        background-color:#FFF;
        padding-left:10px!important;
    }
    legend
    {
        font-size:14px;
        font-weight: bold;
        margin-bottom: 0px;
        margin-right: 0px;
        min-width: 5%;
        width:auto;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 2px 10px 2px 10px;
        background-color: #ffffff;
    }
</style>
@endpush
{{--@include('includes.datetimepicker')--}}
@section('content')

    <div class="card">
        <div class="card-content collapse show">

            <div class="card-body">
                <header class="card-header card-header-custom">
                    <h2 class="card-title" style="color: white" >{!! trans('label.sms.summary') !!}</h2>
                </header>
                <br/>

                <div class="alert alert-info">
                    <strong>Notice</strong>
                    <br>
                    @lang('strings.sms.summary_notice')
                </div>

                <div class="row">

                    <div class="col-md-6 col-sm-6">
                        <div style="text-align: center;"><strong>@lang('label.sample_sms')</strong></div>
                        <hr/>
                        <div class="analyze-preview-container">
                            <div class="phone-container sms ios ">
                                <div class="phone-content">
                                    <p class="sender">{{ $sms->sender->name }}</p>
                                    <p class="msg-details">
                                        Text message<br>{{ $sms->send_time_label }}
                                    </p>
                                    <div class="msg-container fs-block">
                                        <span dir="auto" class="msg-content">{!! $sms_body !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 col-sm-6">
                        {{--<legend>SMS Summary</legend>--}}
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <table class="table table-bordered table-striped table2excel" id="sms_summary">
                                        <tbody>
                                        @if($sms->send_type_id == 12)
                                            @if(isset($total_uploads))
                                                <tr>
                                                    <th scope="row">Total Records</th>
                                                    <td>{!! number_0_format($total_uploads) !!}</td>
                                                </tr>
                                            @endif
                                            @if(isset($duplicates))
                                                <tr>
                                                    <th scope="row">Duplicate Numbers</th>
                                                    <td>{!! $duplicates !!}</td>
                                                </tr>
                                            @endif
                                            @if(isset($unique_uploads))
                                                <tr>
                                                    <th scope="row">Unique Numbers</th>
                                                    <td>{!! number_0_format($unique_uploads) !!}</td>
                                                </tr>
                                            @endif
                                        @endif
                                        <tr>
                                            <th scope="row">Sms composed</th>
                                            <td>{!! number_0_format($sms->number_of_sms) !!}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Recipients Number</th>
                                            <td>{!! number_0_format($sms->sms_recipients()->count()) !!}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total Sms Cost</th>
                                            <td>{!! number_0_format($sms->sms_recipients()->count() * $sms->number_of_sms) !!}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <br/>
                                    <button class="btn btn-nextsms" onclick="exportTableToExcel('sms_summary', 'sms_summary_data')">Export to Excel File</button>
                                        {!! Form::open(['route' => ['sms.send', $sms->uuid]]) !!}

                                                <div class="element-form">
                                                    <div class="form-group pull-right">
                                                        {!! link_to_route('sms.draft.all',trans('buttons.general.cancel'),[],['id'=> 'cancel', 'class' => 'btn btn-nextsms cancel_button', ]) !!}

                                                        {{--{!! link_to_route('sms.summary',trans('buttons.sms.send'),['uuid' => $sms->uuid],['id'=> 'cancel', 'class' => 'btn btn-primary', ]) !!}--}}
                                                        <button type="submit" class="btn btn-nextsms" id="cancel">@lang("buttons.sms.send") <i class="icon fa fa-paper-plane"></i></button>
                                                    </div>
                                                </div>

                                        {!! Form::close() !!}
                                </div>
                            </div>

                    </div>

                </div>

                <br>

            </div>
        </div>
    </div>


    @endsection

@push('after-scripts')


    <script type="text/javascript">

        $("form[name='form_id']").submit(function (e) {
            e.preventDefault();
            /*alert('e;e;');*/
            {{--var XL_row_object = '.{!! $unique_numbers !!}.';--}}
            {{--var json_object = '{{$unique_numbers}}';--}}
            console.log(r);document.getElementById("jsonObject").innerHTML = json_object;$("input[name='json_data']").val(json_object)});function exportTableToExcel(tableID, filename = '') {let downloadLink;let dataType = 'application/vnd.ms-excel';let tableSelect = document.getElementById(tableID);let tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');filename = filename?filename+'.xls':'excel_data.xls';downloadLink = document.createElement("a");document.body.appendChild(downloadLink);if(navigator.msSaveOrOpenBlob){let blob = new Blob(['\ufeff', tableHTML], {type: dataType});navigator.msSaveOrOpenBlob( blob, filename);}else{downloadLink.href = 'data:' + dataType + ', ' + tableHTML;downloadLink.download = filename;downloadLink.click();}}







</script>

@endpush
