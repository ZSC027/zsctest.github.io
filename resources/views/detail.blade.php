@extends('layouts.app')

@section('content')
    <div id="title" style="text-align:center">
        <h1>{{$article->title}}</h1>
        <div style="padding:5px;font-size:16px">编辑时间:{{$article->updated_at}}</div>
    </div>
    <hr>
    <div id="content">
        <div class="body" style="padding:0 150px 0 150px;overflow-x: hidden;word-break:break-all;">
            <pre>{{$article->body}}</pre>
        </div>
    </div>
@endsection