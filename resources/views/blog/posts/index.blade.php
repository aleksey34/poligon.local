@extends("layouts.app")

@section("content")

@if(!empty($items))
<table>
    @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->excerpt}}</td>
            <td>{{$item->slug}}</td>
        </tr>
    @endforeach
</table>
@endif

@endsection

