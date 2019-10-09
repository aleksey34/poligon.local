<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn btn-primary">Сохранить</button>
            </div>
        </div>
    </div>
</div>

@if($item->exists)

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>ID: {{$item->id}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <br/>

    <div class="row">
        <div class="justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="title" >Создано</label>
                            <input type="text" value="{{$item->created_at}}" disabled class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title" >Изменено</label>
                            <input type="text" value="{{$item->updated_at}}" disabled class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="title" >Опубликованно</label>
                            <input type="text" value="{{$item->published_at}}" disabled class="form-control">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/>

@endif