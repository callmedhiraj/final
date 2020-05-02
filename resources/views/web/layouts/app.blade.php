@include('web.layouts.header')
<div class="container">
    <div class="row">
        <div class="col-12">
            @if($messages=Session::get('success'))

                <div class="alert alert-success">
                    <p>{{$messages}}</p>
                </div>

            @endif
            @if($messages=Session::get('danger'))
                <div class="alert alert-danger">
                    <p>{{$messages}}</p>
                </div>
            @endif
            @if(isset($message))
                <div class="col-12">
                    <div class="alert alert-success">
                        <p>{{$message}}</p>
                    </div>
                </div>
            @endif
        </div>
    </div></div>
    @yield('content')

@include('web.layouts.footer')
