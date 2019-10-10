@extends("layouts.app")

@section("content")


    <div class="container">
        <div class="row">
            <div class="col-12">


                <nav class="navbar navbar-toggle navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{route("blog.admin.categories.create")}}">Add New Category</a>
                </nav>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Parent</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($paginator as $item)
                                @php   /**  @var \App\Models\BlogCategory   $item */   @endphp
                                  <tr>
                                      <td>{{$item->id}}</td>
                                      <td>
                                          <a href="{{route("blog.admin.categories.edit" , $item->id)}}">
                                              {{$item->title}}
                                          </a>
                                      </td>
                                      <td @if(in_array($item->parent_id , [0,1])) style="color: #bbac87"    @endif>
                                       {{--{{$item->parent_id}}--}}
{{--                                          {{$item->parentCategory->title ?? "?" }}--}}
                                          {{--{{optional($item->parentCategory)->title}}--}}

                                        {{--{{--}}
                                        {{--$item->parentCategory->title ?? ($item->id === \App\Models\BlogCategory::ROOT ? "Корневая категория" : "???")--}}
                                        {{--}}--}}


{{--                                          {{$item->parent_title}}--}}
                                          {{$item->parentTitle}}

                                      </td>
                                  </tr>

                                 @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>


@if($paginator->total() > $paginator->count() )
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
	            <?php echo $paginator->links(); ?>
            </div>
        </div>
    </div>
@endif

@endsection