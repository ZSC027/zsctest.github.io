<?php $__env->startSection('content'); ?>
<div class='container'>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="col-md-9"><h2>文章管理</h2></div>
					<div class="col-md-3"><h2><a href="<?php echo e(url('admin/articles/create')); ?>" class="btn btn-lg btn-primary">新增</a></h2></div>
				</div>
				
				<div class="panel-body">
					<?php if(count($errors)>0): ?>
						<div class="alert alert-danger">
							<?php echo implode('<br>',$errors->all()); ?>

						</div>
					<?php endif; ?>
					
					<table class="table">
						<tr>
							<th>编号</th><th>文章标题</th><th>文章内容</th><th>添加时间</th><th>操作</th>
						</tr>
					<!--遍历文章列表数据-->
					<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($article->id); ?></td>
							<td><?php echo e($article->title); ?></td>
							<td style="text-overflow: ellipsis"><?php echo e($article->body); ?></td>
							<td><?php echo e($article->created_at); ?></td>
							<td>
								<a href="<?php echo e(url('admin/articles/'.$article->id.'/edit')); ?>" class=
								"btn btn-success">编辑</a>
								<form action="<?php echo e(url('admin/articles/'.$article->id)); ?>" method=
								"POST" style="display:inline;">
									<?php echo e(method_field('DELETE')); ?>

									<?php echo csrf_field(); ?>

									<button type="submit" class="btn btn-danger">删除</button>
								</form>
							</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</table>
					<?php echo e($articles->links()); ?> <!--显示分页-->
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>