<?php $__env->startSection('content'); ?>


<h4><?php echo e($listing->title); ?></h4>
<p><?php echo e($listing->tags); ?></p>
<p><?php echo e($listing->company); ?></p>
<p><?php echo e($listing->webside); ?></p>
<p><?php echo e($listing->email); ?></p>
<p><?php echo e($listing->location); ?></p>
<p><?php echo e($listing->description); ?></p>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/doctorsnetwork/Desktop/laravel-project/resources/views/listing.blade.php ENDPATH**/ ?>