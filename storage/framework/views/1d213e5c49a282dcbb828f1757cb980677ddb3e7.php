<?php $__env->startSection('content'); ?>

<?php $__currentLoopData = $listings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<h4><a href='/listings/<?php echo e($listing->id); ?>'><?php echo e($listing->title); ?></a></h4>
<p><?php echo e($listing->tags); ?></p>
<p><?php echo e($listing->company); ?></p>
<p><?php echo e($listing->webside); ?></p>
<p><?php echo e($listing->email); ?></p>
<p><?php echo e($listing->location); ?></p>
<p><?php echo e($listing->description); ?></p>
<br>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/doctorsnetwork/Desktop/laravel-project/resources/views/listings.blade.php ENDPATH**/ ?>