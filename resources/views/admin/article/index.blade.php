@extends('layouts.app')

@section('content')
<div class='container'>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="col-md-9"><h2>文章管理</h2></div>
					<div class="col-md-3"><h2><a href="{{url('admin/articles/create')}}" class="btn btn-lg btn-primary">新增</a></h2></div>
				</div>
				
				<div class="panel-body">
					@if(count($errors)>0)
						<div class="alert alert-danger">
							{!!implode('<br>',$errors->all())!!}
						</div>
					@endif
					
					<table class="table">
						<tr>
							<th>编号</th><th>文章标题</th><th>文章内容</th><th>添加时间</th><th>操作</th>
						</tr>
					<!--遍历文章列表数据-->
					@foreach($articles as $article)
						<tr>
							<td>{{$article->id}}</td>
							<td>{{$article->title}}</td>
							<td style="text-overflow: ellipsis">{{$article->body}}</td>
							<td>{{$article->created_at}}</td>
							<td>
								<a href="{{ url('admin/articles/'.$article->id.'/edit') }}" class=
								"btn btn-success">编辑</a>
								<form action="{{ url('admin/articles/'.$article->id)}}" method=
								"POST" style="display:inline;">
									{{method_field('DELETE')}}
									{!!csrf_field()!!}
									<button type="submit" class="btn btn-danger">删除</button>
								</form>
							</td>
						</tr>
					@endforeach
					</table>
					{{$articles->links()}} <!--显示分页-->
				</div>
			</div>
		</div>
	</div>
</div>
@endsection