@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><h2>修改文章</h2></div>
				<div class="panel-body">

					@if(count($errors)>0)
						<div class="alert alert-danger">
							<strong>修改失败</strong>输入不符合要求<br><br>
							{!!implode('<br>',$errors->all())!!}
						</div>
					@endif

					<form action="{{url('admin/articles/'.$articles->id)}}" method="POST">
						{{method_field('put')}}
							{!!csrf_field()!!}
						<label>
							<input type="text" name="title" maxlength="40" style="width:415%" class="form-control"
								   required="required" placeholder="请输入标题" value="{{$articles->title}}">
						</label>
						<br>
						<label>
							<textarea name="body" rows="20" cols="100" class="form-control" required="required"
									  placeholder="请输入内容">{{$articles->body}}"</textarea>
						</label><br>
							<button class="btn btn-lg btn-info">修改文章</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
				