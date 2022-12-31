<?php if(session()->has('message')): ?>
    <div class="fixed top-0 transform bg-laravel text-white px-48 py-3 left-1/4">
        <p>
            <?php echo e(session('message')); ?>

        </p>
    </div>
<?php endif; ?>
<?php /**PATH /Users/doctorsnetwork/Desktop/laravel-project/resources/views/components/message.blade.php ENDPATH**/ ?>