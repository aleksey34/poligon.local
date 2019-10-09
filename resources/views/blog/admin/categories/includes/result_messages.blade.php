

@if($errors->any())
    <div class="row justify-content-center">
        <div class="col-11">
            <div role="alert" class="alert alert-danger ">
                <button aria-label="Close" data-dismiss="alert" class="close " type="button">
                    <span style="color: #620000;" aria-hidden="true">&#10006;</span>
                </button>
                {!! $errors->first() !!}
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
            </div>
        </div>
    </div>



@endif