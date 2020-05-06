<?php $__env->startSection('content'); ?>
    <div id="title" style="text-align:center">
        <h1><?php echo e($article->title); ?></h1>
        <div style="padding:5px;font-size:16px">编辑时间:<?php echo e($article->updated_at); ?></div>
    </div>
    <hr>
    <div id="content">
        <div class="body" style="padding:0 150px 0 150px;overflow-x: hidden;word-break:break-all;">
            <pre><?php echo e($article->body); ?></pre>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>