<?php $__env->startSection('page'); ?>
<div class="container-fluid">
    <div class="row bg-border-color medium-padding120">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">

                    <div class="cart">

                        <h1 class="cart-title">In Your Shopping Cart: <span class="c-primary"> <?php echo e(Cart::content()->count()); ?> items</span></h1>

                    </div>

                    <form action="#" method="post" class="cart-main">

                        <table class="shop_table cart">
                            <thead class="cart-product-wrap-title-main">
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr class="cart_item">

                                    <td class="product-remove">
                                        <a href="<?php echo e(route('cart.delete', ['id' => $product->rowId])); ?>" class="product-del remove" title="Remove this item">
                                            <i class="seoicon-delete-bold"></i>
                                        </a>
                                    </td>

                                    <td class="product-thumbnail">

                                        <div class="cart-product__item">
                                            <a href="#">
                                                <img src="<?php echo e(asset($product->model->image)); ?>" alt="product" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                            </a>
                                            <div class="cart-product-content">
                                               
                                                <h5 class="cart-product-title"><?php echo e($product->name); ?></h5>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="product-price">
                                        <h5 class="price amount">$<?php echo e($product->price); ?></h5>
                                    </td>

                                    <td class="product-quantity">

                                    <div class="quantity">
                                        <a href="<?php echo e(route('cart.reduce', ['id' => $product->rowId, 'qty' => $product->qty ])); ?>" >-</a>
                                        <input title="Qty" class="email input-text qty text" type="text" placeholder="1" readonly value = "<?php echo e($product->qty); ?>">
                                        <a href="<?php echo e(route('cart.inc', ['id' => $product->rowId, 'qty' => $product->qty ])); ?>" >+</a>
                                    </div>

                                </td>

                                <td class="product-subtotal">
                                    <h5 class="total amount">$<?php echo e($product->total); ?></h5>
                                </td>

                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            

                            <tr>
                                <td colspan="5" class="actions">

                                    <div class="coupon">
                                        <input name="coupon_code" class="email input-standard-grey" value="" placeholder="Coupon code" type="text">
                                        <div class="btn btn-medium btn--breez btn-hover-shadow">
                                            <span class="text">Apply Coupon</span>
                                            <span class="semicircle--right"></span>
                                        </div>
                                    </div>

                                    <div class="btn btn-medium btn--dark btn-hover-shadow">
                                        <span class="text">Apply Coupon</span>
                                        <span class="semicircle"></span>
                                    </div>

                                </td>
                            </tr>

                            </tbody>
                        </table>


                    </form>

                    <div class="cart-total">
                        <h3 class="cart-total-title">Cart Totals</h3>
                        <h5 class="cart-total-total">Total: <span class="price">$<?php echo e(Cart::total()); ?></span></h5>
                        <a href="<?php echo e(route('cart.checkout')); ?>" class="btn btn-medium btn--light-green btn-hover-shadow">
                            <span class="text">Checkout</span>
                            <span class="semicircle"></span>
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>