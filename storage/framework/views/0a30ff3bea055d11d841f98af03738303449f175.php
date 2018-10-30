<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">About Us</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <p>At Kennels R Us, we understand how important your pet’s safety, happiness, and comfort is to you. 
                        Out kennels are designed to provide safety for your pet and peace of mind for you. </p>

                    <h4>We offer:</h4>
                    <ul>
                        <li>Customizable Options</li>
                        <li>Professional service</li>
                        <li>Quick Delivery</li>
                        <li>Easy Ordering</li>
                        <li>Customizable Options</li>
                        <li>5-Year Maintenance Warranty</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>