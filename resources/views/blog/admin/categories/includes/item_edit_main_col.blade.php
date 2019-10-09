@php  /**  @var  \App\Models\BlogCategory  $item */   @endphp

<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#maindata" class="nav-link active" data-toggle="tab">
                            Основные данные
                        </a>
                    </li>
                </ul>
                <br/>
                <div class="tab-content">
                    <div class="tab-panel active" id="maindata" role="tabpanel">

                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input type="text" name="title" value="{{$item->title}}"
                                   id="title" class="form-control"
                                   minlength="3" required>
                        </div>

                        <div class="form-group">
                            <label for="slug">Идендификатор</label>
                            <input type="text" name="slug" value="{{$item->slug}}"
                                   id="slug" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="parent_id">Родитель</label>
                            <select  name="parent_id"
                                    id="parent_id" class="form-control"
                                    required >

                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}"  title="выберете категорию"
                                            @if($item->parent_id === $categoryOption->id) selected    @endif >
                                        {{--{{$categoryOption->id}}--}}
                                        {{--{{$categoryOption->title}}--}}
                                        {{$categoryOption->id_title}}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea  name="description" id="description"
                                       rows="3" class="form-control">{{ old("description" , $item->description) }}
                            </textarea>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








