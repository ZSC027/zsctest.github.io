<?php $__env->startSection('content'); ?>
    <div id="title" style="text-align:center;">
        <h1>Laravel框架学习</h1>
        <div style="padding:8px;font-size:16px;">首页面</div>
    </div>
    <hr>
    <div id="content">
        <ul>
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li style="margin:50px 0;">
                    <div class="title">
                        <a href="<?php echo e(url('article/'.$article->id)); ?>">
                            <h4><?php echo e($article->title); ?></h4>
                        </a>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>