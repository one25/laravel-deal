<?php $__currentLoopData = $deals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
   <td><?php echo e($deal->date); ?></td>   
   <td><?php echo e($deal->seller->name); ?></td>
   <td><?php echo e($deal->buyer->name); ?></td>  
   <td><?php echo e($deal->name); ?></td>   
   <td><?php echo e($deal->price); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php /**PATH /home/alex/www/laravel-deal/resources/views/front/brick-standard.blade.php ENDPATH**/ ?>