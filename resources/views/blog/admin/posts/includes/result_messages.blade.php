@if($errors->any())
    <div class="row justify-content-center">
        <div class="col-11">
            <div role="alert" class="alert alert-danger ">
                <button aria-label="Close" data-dismiss="alert" class="close " type="button">
                    <span style="color: #620000;" aria-hidden="true">&#10006;</span>
                </button>
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endif
@if(session()->has("success"))
    <div class="row justify-content-center">
        <div class="col-11">
            <div role="alert" class="alert alert-success">
                <button aria-label="Close" data-dismiss="alert" class="close" type="button">
                    <span style="color: #620000;" aria-hidden="true">&#10006;</span>
                </button>
                {!! session("success") !!}
                {{--session()->get("success")--}}
            </div>
        </div>
    </div>



@endif