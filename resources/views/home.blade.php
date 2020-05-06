@extends('layouts.app')

@section('content')
    <div id="title" style="text-align:center;">
        <h1>Laravel框架学习</h1>
        <div style="padding:8px;font-size:16px;">首页面</div>
    </div>
    <hr>
    <div id="content">
        <ul>
            @foreach($articles as $article)
                <li style="margin:50px 0;">
                    <div class="title">
                        <a href="{{url('article/'.$article->id)}}">
                            <h4>{{$article->title}}</h4>
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection