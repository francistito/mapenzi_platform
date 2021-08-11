<div class="toggle toggle-primary col-sm-11 col-md-11 col-lg-11 col-xl-11 offset-1" data-plugin-toggle="">
    <section class="">
        <div class="" style="margin-left: 50px">
            <div class="checkbox-custom checkbox-default">
                {{ Form::checkbox('scheduler', 'scheduler', false,["class" => "form-check-input", "id" => "smsScheduler","onclick" => "toggleScheduler()"]) }}
                <label for="smsScheduler" style="color: black">{!! trans('label.sms.sms_scheduler') !!}</label>
            </div>
            <div id="smsSchedulerBlock" style="display: none">
                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" style="color: black">{!! trans('label.date') !!}</label>
                    <div class="col-6">
                        <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-calendar-alt"></i>
															</span>
														</span>
                            <input type="text" {{--data-plugin-datepicker="" --}}class="form-control datepicker" id="date" name="date"  autocomplete="off" >
                        </div>
                        <label class="badge badge-danger"></label>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" style="color: black">{!! trans('label.time') !!}</label>
                    <div class="col-lg-6">
                        <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="far fa-clock"></i>
															</span>
														</span>
                            {!! Form::text('time','', [ 'class' => 'form-control datepicker2', 'placeholder' => '', 'autocomplete' => 'off']) !!}

                        </div>
                        <label class="badge badge-danger"></label>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" style="color: black">{!! trans('label.repeat') !!}</label>
                    <div class="col-lg-6">
                        {{ Form::select('repeat',['None', 'hourly'=>'Hourly', 'daily'=>'Daily','weekly'=>'Weekly','monthly'=>'Monthly'], null,['class' => 'form-control select2']) }}
                    </div>
                </div>

                <div class="checkbox-custom checkbox-default">
                        {{ Form::checkbox('duration', 'duration', false,["class" => "form-check-input", "id" => "duration"/*,"onclick" => "toggleDuration()"*/]) }}
                        <label for="duration" style="color: black">{!! trans('label.campaign_duration') !!}</label>
                    </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right" style="color: black">{!! trans('label.start_on') !!}</label>
                    <div class="col-lg-6">
                            <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-calendar-alt"></i>
															</span>
														</span>
                                <input type="text" disabled class="form-control datepicker" id="start" name="start" value="{{ old('start') }}" autocomplete="off" >


                            </div>
                        <label class="badge badge-danger"></label>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right" style="color: black">{!! trans('label.end_on') !!}</label>
                    <div class="col-lg-6">
                        <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-calendar-alt"></i>
															</span>
														</span>
                            <input type="text" disabled class="form-control datepicker{{ $errors->has('date') ? ' is-invalid' : '' }}" id="end" name="end" value="{{ old('end') }}" autocomplete="off" >


                        </div>
                        <label class="badge badge-danger"></label>

                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

@push('after-scripts')
    {{ Html::script(url("assets/nextbyte/plugins/xdan/js/jquery.datetimepicker.full.min.js")) }}
    <script>
        function toggleScheduler() {
            // Get the checkbox
            var checkBox = document.getElementById("smsScheduler");
            // Get the output text
            var text = document.getElementById("smsSchedulerBlock");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true){
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }

        $(function () {
            //Toggle Sms Scheduler
            $("#scheduler").click(function() {
                $('#service_type').val(null).trigger('change');
                $("#service_type").attr("disabled", this.checked);
            });


            /*------------Start Time Process ---------*/
            jQuery('.datepicker2').datetimepicker({
                datepicker:false,
                format:'H:i',
                weeks: false,
                maskInput: false,
                lazyInit: true,
                scrollInput: false,
            });
            /*-----------End Time Process------------*/
        });

        $('#duration').click(function() {
            $('#start').attr('disabled',! this.checked);
            $('#end').attr('disabled',! this.checked);
        });

        $(function () {
            jQuery('.datepicker').datetimepicker({
                timepicker:true,
                format:'Y-m-d',
                weeks: true,
                dayOfWeekStart: 1,
                lazyInit: true,
                scrollInput: true
            });
        });
    </script>
@endpush