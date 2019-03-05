<?php $__env->startSection('page'); ?>
    <div class="container">
        <div class="row medium-padding120">
            <div class="product-details">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="product-details-thumb">
                        <div class="swiper-container" data-effect="fade">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <div class="product-details-img-wrap swiper-slide">
                                    <img src="<?php echo e(asset($product->image)); ?>" alt="product" data-swiper-parallax="-10">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-12 col-xs-offset-0">
                    <div class="product-details-info">
                        <div class="product-details-info-price">$<?php echo e($product->price); ?></div>
                        <h3 class="product-details-info-title"><?php echo e($product->name); ?></h3>
                        <p class="product-details-info-text"><?php echo e($product->description); ?></p>

                        <form action="<?php echo e(route('cart.add')); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <div class="quantity">
                                <a href="#" class="quantity-minus">-</a>
                                <input title="Qty" class="email input-text qty text" name = "quantity" type="text" value="2">
                                <a href="#" class="quantity-plus">+</a>
                            </div>

                            <input type="hidden" name="product" value = "<?php echo e($product->id); ?>">

                            <button href="19_cart.html" class="btn btn-medium btn--primary">
                                <span class="text">Add to Cart</span>
                                <i class="seoicon-commerce"></i>
                                <span class="semicircle"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>