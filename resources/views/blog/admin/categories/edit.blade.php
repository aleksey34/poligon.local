@extends("layouts.app")

@section("content")

    @php    /**  @var \App\Models\BlogCategory @item */  @endphp





                    <div class="container">

                        @php   /**  @var \Illuminate\Support\ViewErrorBag  $errors */   @endphp

                        @include("blog.admin.categories.includes.result_messages")



                    @if($item->exists)
                            <form action="{{route("blog.admin.categories.update" , $item->id)}}" method="POST">
                                @method("PATCH")
                                @else
                            <form action="{{route("blog.admin.categories.store" , $item->id)}}" method="POST">
                                        @endif

                                        @csrf





                        <div class="row justify-content-center">
                            <div class="col-8">
                                @include("blog.admin.categories.includes.item_edit_main_col")
                            </div>
                            <div class="col-3">
                                @include("blog.admin.categories.includes.item_edit_add_col")
                            </div>
                        </div>

                      </form>
                    </div>




@endsection