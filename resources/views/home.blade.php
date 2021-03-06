@extends('layouts.userLayout')

@section('content')
<div class="container">
    <h1 class="display-4">Welcome {{Auth::user()->name}},</h1>

    @if($check)
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>THERE IS A SOUL MATE IN YOUR LOCATION</strong>
        <p>You can also get your soul mate by age or gender </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">

                {{--Success Msg--}}
                @if (session('msg_success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('msg_success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
        </div>
    </div>
</div>
@endsection
