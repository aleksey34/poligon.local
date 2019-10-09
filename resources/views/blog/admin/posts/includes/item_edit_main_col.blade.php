@php  /**  @var  \App\Models\BlogCategory  $item */   @endphp

<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">

            <div class="card-header">

                @if($item->is_published)
                    <span>Опубликованно </span>
                @else
                    <span>Черновик </span>
                @endif

            </div>


            <div class="card-body">

                <div class="card-title"></div>
                <div class="card-subtitle text-muted mb-2"></div>

                <ul class="nav nav-tabs mb-4" role="tablist">
                    <li class="nav-item">
                        <a href="#maindata1" class="nav-link active" data-toggle="tab">
                            Основные данные
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#maindata2" class="nav-link" data-toggle="tab">
                            Дополнительные данные
                        </a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane active " id="maindata1" role="tabpanel">

                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input type="text" name="title" value="{{ $item->title}}"
                                   id="title" class="form-control"
                                   minlength="3" required>
                        </div>

                        <div class="form-group">
                            <label for="content_raw">Сталья</label>
                            <textarea
                                    name="content_raw"
                                    rows="30"
                                   id="content_raw"
                                    class="form-control">{{old("content_raw",$item->content_raw)}}
                            </textarea>
                        </div>

                        {{--<div class="form-group">--}}
                            {{--<label for="parent_id">Категория</label>--}}
                            {{--<select  name="parent_id"--}}
                                    {{--id="parent_id" class="form-control"--}}
                                    {{--required >--}}

                                {{--@foreach($categoryList as $categoryOption)--}}
                                    {{--<option value="{{$categoryOption->id}}"  title="выберете категорию"--}}
                                            {{--@if($item->parent_id === $categoryOption->id) selected    @endif >--}}
                                        {{--{{$categoryOption->id}}--}}
                                        {{--{{$categoryOption->title}}--}}
                                        {{--{{$categoryOption->id_title}}--}}
                                    {{--</option>--}}
                                {{--@endforeach--}}

                            {{--</select>--}}
                        {{--</div>--}}


                    </div>

                    <div class="tab-pane " id="maindata2" role="tabpanel">

                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select  name="category_id"
                                     id="parent_id" class="form-control"
                                     required >

                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}"  title="выберете категорию"
                                            @if($item->category_id === $categoryOption->id) selected="selected"    @endif >
                                        {{$categoryOption->id_title}}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="slug">Идендификатор</label>
                            <input type="text" name="slug" value="{{ $item->slug}}"
                                   id="slug" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="content_raw">Выдержка</label>
                            <textarea
                                    name="excerpt"
                                    rows="3"
                                    id="excerpt"
                                    class="form-control">{{old("excerpt",$item->excerpt)}}
                            </textarea>
                        </div>


                        <div class="form-group pl-4">
                            <input type="hidden" name="is_published" value="0"/>

                            <input type="checkbox"
                                   id="is_published"
                                   name="is_published"
                                   class="form-check-input"
                                   value="1"
                                    @if($item->is_published)
                                    checked="checked"
                                    @endif />
                            <label for="is_published" class="form-check-label">Опубликованно</label>
                        </div>


                        {{--<div class="form-group">--}}
                            {{--<label for="description">Описание</label>--}}
                            {{--<textarea  name="description" id="description"--}}
                                       {{--rows="3" class="form-control">{{ old("description" , $item->description) }}--}}
                            {{--</textarea>--}}
                        {{--</div>--}}



                    </div>

                </div>
            </div>
        </div>
    </div>
</div>








