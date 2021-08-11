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
                                        <div class="col-md-10 col-sm-10 mt-3 offset-1" id="variables">
                                            <div class="form-group">
                                                <label for="desired_soul_mate_gender">Select Variable</label>
                                                <select class="form-control" name="select_variables" id="select_variables">
                                                    <option value="">Personalize Message ..</option>
                                                    <option value="name">Name</option>
                                                    <option value="location">Location</option>
                                                    <option value="gender">Gender</option>
                                                    <option value="age">Age</option>
                                                    <option value="soul_mate_location">Soul Mate Location</option>
                                                    <option value="disired_soul_mate_age">Disired Soul Mate Age</option>
                                                    <option value="disired_soul_mate_gender">Disired Soul Mate Gender</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-10 col-sm-10 mt-3 offset-1">
                                            <div class="form-group">
                                                <label for="message">Message</label>
                                                <br>
                                                <textarea id="message" name="message" rows="4" cols="109" maxlength="200">MPENZI </textarea>
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

@push('after-scripts')

    <script>
        let $variable = $('#variable');
        let $select_variable = document.getElementById("select_variables");

        document.getElementById("select_variables").addEventListener("change", function () {

        });



        $(document).on('change','#select_variables',function(){
            $x = $(this).val();
            addText($x)
        });




        function addText($x) {
            if ($x) {
                let $value = ' {' + $x + '} ';
                insertAtCaret('message', $value);
                $variable.text('Using variable sms count will not be precise');
            }
        }

        function insertAtCaret(message, text) {

            let txtarea = document.getElementById(message), scrollPos = txtarea.scrollTop, strPos = 0,
                br = txtarea.selectionStart || "0" == txtarea.selectionStart ? "ff" : !!document.selection && "ie";
            "ie" == br ? (txtarea.focus(), (range = document.selection.createRange()).moveStart("character", -txtarea.value.length), strPos = range.text.length) : "ff" == br && (strPos = txtarea.selectionStart);
            var range, front = txtarea.value.substring(0, strPos), back = txtarea.value.substring(strPos, txtarea.value.length);
            (txtarea.value = front + text + back, strPos += text.length, "ie" == br) ? (txtarea.focus(), (range = document.selection.createRange()).moveStart("character", -txtarea.value.length), range.moveStart("character", strPos), range.moveEnd("character", 0), range.select()) : "ff" == br && (txtarea.selectionStart = strPos, txtarea.selectionEnd = strPos, txtarea.focus());
            txtarea.scrollTop = scrollPos;
        }
    </script>

@endpush
