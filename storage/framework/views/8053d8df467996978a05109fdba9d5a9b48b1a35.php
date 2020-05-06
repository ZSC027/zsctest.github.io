<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">添加文章</div>
				<div class="panel-body">
					<?php if(count($errors)>0): ?>
						<div class="alert-danger">
							<strong>新增失败</strong>输入不符合要求<br><br>
							<?php echo implode('<br>',$error->all()); ?>

						</div>
					<?php endif; ?>
					
					<form action="<?php echo e(url('admin/articles')); ?>" method="POST">
						<?php echo csrf_field(); ?>

						<label>
							<input type="text" name="title" class="form-control" maxlength="40" style="width:415%"
								   required="required" placeholder="请输入标题">
						</label>
						<br>
						<label>
							<textarea name="body" rows="20" cols="100" class="form-control" required="required" placeholder="请输入内容"></textarea>
						</label>
						<br>
						<button class="btn btn-lg btn-info">添加文章</button>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>