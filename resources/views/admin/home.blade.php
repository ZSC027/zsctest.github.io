

@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">后台管理平台</div>
				<div class="panel-body">
					<a href="{{url('admin/articles')}}" class="btn btn-lg btn-success">
						管理文章
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection