<div class="col-md-5 col-sm-5 offset-1">
    {{ Form::label('select-template',trans('label.sms.template'),['class' => '']) }}
    {!! Form::select('template', $template, null, ['class' => 'form-control form-control-sm', 'placeholder' => trans('label.select'), 'id' => 'select-template']) !!}
</div>

@push('after-scripts')
    <script>
        $('#select-template').change(function(){
            var insert = $( "#select-template option:selected" ).val();
            $('#message').val(insert);
        });
    </script>
    @endpush
