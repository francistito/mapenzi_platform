<div class="col-md-4 col-sm-4" id="variables">
{{--    <br/>
    {{ Form::label('variable',trans("label.sms.variables"),['class' => '']) }}

    <div class="btn-group flex-wrap">
        <button type="button" value="" class="btn btn-sm btn-warning" onclick="addText('$firstName');" id="btn">{{ trans('buttons.sms.first_name') }}</button>

        <button type="button" value="" class="btn btn-sm btn-warning" onclick="addText('$lastName');">{{ trans('buttons.sms.last_name') }}</button>
    </div>--}}
    {{ Form::label('select-variables', trans('label.sms.personalise'), ['class' => '']) }}
    {!! Form::select('variables', ['first_name' => 'First Name', 'last_name' => 'Last Name'], null, ['class' => 'form-control form-control-sm', 'placeholder' => '', 'id' => 'select-variables', 'onclick' => 'addText(this.value);this.value=null;']) !!}
</div>

@push('after-scripts')

    <script>
        let $variable = $('#variable');
        function addText($x) {
            if ($x) {
                let $value = ' {' + $x + '} ';
                insertAtCaret('message', $value);
                $variable.text('Using variable sms count will not be precise');
            }
        }
        function insertAtCaret(areaId, text) {
            let txtarea=document.getElementById(areaId),scrollPos=txtarea.scrollTop,strPos=0,br=txtarea.selectionStart||"0"==txtarea.selectionStart?"ff":!!document.selection&&"ie";"ie"==br?(txtarea.focus(),(range=document.selection.createRange()).moveStart("character",-txtarea.value.length),strPos=range.text.length):"ff"==br&&(strPos=txtarea.selectionStart);var range,front=txtarea.value.substring(0,strPos),back=txtarea.value.substring(strPos,txtarea.value.length);(txtarea.value=front+text+back,strPos+=text.length,"ie"==br)?(txtarea.focus(),(range=document.selection.createRange()).moveStart("character",-txtarea.value.length),range.moveStart("character",strPos),range.moveEnd("character",0),range.select()):"ff"==br&&(txtarea.selectionStart=strPos,txtarea.selectionEnd=strPos,txtarea.focus());txtarea.scrollTop=scrollPos;
        }
    </script>

    <script>
/*        $('#message').keyup(function (e) {
        if (e.keyCode === 8) {
        e.preventDefault();
        let text = $(this).val().split(' ');

        text.splice(text.length-1);

        $(this).val(text.join(' '));
        }
        })*/
    </script>

{{--    <script>--}}
{{--        $('textarea').on('keypress',function (e) {--}}
{{--            if (e.keyCode === 13 && $(e.target).is('textarea')) {--}}
{{--                e.preventDefault();--}}
{{--            }--}}
{{--        })--}}
{{--    </script>--}}
    @endpush
