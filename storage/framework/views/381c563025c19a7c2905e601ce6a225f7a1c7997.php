<?php $__env->startSection('page'); ?>
    <div class="container">
        <div class="row pt120">
            <div class="books-grid">

            <div class="row mb30">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="books-item">
                            <div class="books-item-thumb">
                                <img src="<?php echo e(asset($product->image)); ?>" alt="book">
                                <div class="new">New</div>
                                <div class="sale">Sale</div>
                                <div class="overlay overlay-books"></div>
                            </div>

                            <div class="books-item-info">
                                <a href="<?php echo e(route('product.single', ['id' => $product->id ])); ?>">
                                    <h5 class="books-title"><?php echo e($product->name); ?></h5>
                                </a>

                                <div class="books-price">$<?php echo e($product->price); ?></div>
                            </div>

                            <a href="<?php echo e(route('cart.rapid.add', ['id' => $product->id ])); ?>" class="btn btn-small btn--dark add">
                                <span class="text">Add to Cart</span>
                                <i class="seoicon-commerce"></i>
                            </a>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="row pb120">

                <div class="col-lg-12"><?php echo e($products->links()); ?></div>

            </div>
        </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>