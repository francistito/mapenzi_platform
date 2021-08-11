<p><span class="badge badge-xl badge-warning" id="remaining">160 {{ @trans('label.sms.char_remain') }}</span>  <span class="badge badge-xl badge-success" id="messages">1 {{ @trans('label.sms.title') }}</span> <span class="badge badge-xl badge-danger" id="variable"></span>
</p>

@push('after-scripts')
    <script>
        let $remaining = $('#remaining'),
            $messages = $remaining.next();

        $('#message').keyup(function(){
            let chars = this.value.length;
            let messages = Math.ceil(chars / 160),
                remaining = messages * 160 - (chars % (messages * 160) || messages * 160);
            $remaining.text(remaining + ' {!! @trans('label.sms.char_remain') !!}');
            $messages.text(messages + ' SMS');
            if (chars > 160) {
                let messages = Math.ceil(chars / 153),
                    remaining = messages * 153 - (chars % (messages * 153) || messages * 153);
                $remaining.text(remaining + ' {!! @trans('label.sms.char_remain') !!}');
                $messages.text(messages + ' SMS');
            }
        });
    </script>
@endpush
