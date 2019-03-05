<?php $__env->startSection('page'); ?>
      <div class="container-fluid">
	<div class="row medium-padding120 bg-border-color">
		<div class="container">

			<div class="row">

				<div class="col-lg-12">
                              <div class="order">
                                    <h2 class="h1 order-title align-center">Your Order</h2>
                                    <form action="#" method="post" class="cart-main">
                                          <table class="shop_table cart">
                                                <thead class="cart-product-wrap-title-main">
                                                <tr>
                                                      <th class="product-thumbnail">Product</th>
                                                      <th class="product-quantity">Quantity</th>
                                                      <th class="product-subtotal">Total</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <tr class="cart_item">

                                                            <td class="product-thumbnail">

                                                                  <div class="cart-product__item">
                                                                        <div class="cart-product-content">
                                                                              <h5 class="cart-product-title"><?php echo e($item->name); ?> </h5>
                                                                        </div>
                                                                  </div>
                                                            </td>

                                                            <td class="product-quantity">

                                                                  <div class="quantity">
                                                                        x <?php echo e($item->qty); ?>

                                                                  </div>

                                                            </td>

                                                            <td class="product-subtotal">
                                                                  <h5 class="total amount">$<?php echo e($item->total()); ?></h5>
                                                            </td>

                                                      </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <tr class="cart_item total">

                                                      <td class="product-thumbnail">


                                                            <div class="cart-product-content">
                                                                  <h5 class="cart-product-title">Total:</h5>
                                                            </div>


                                                      </td>

                                                      <td class="product-quantity">

                                                      </td>

                                                      <td class="product-subtotal">
                                                            <h5 class="total amount">$<?php echo e(number_format(Cart::total())); ?></h5>
                                                      </td>
                                                </tr>

                                                </tbody>
                                          </table>

                                          <div class="cheque">

                                                <div class="logos">
                                                      <a href="#" class="logos-item">
                                                            <img src="<?php echo e(asset('app/img/visa.png')); ?>" alt="Visa">
                                                      </a>
                                                      <a href="#" class="logos-item">
                                                            <img src="<?php echo e(asset('app/img/mastercard.png')); ?>" alt="MasterCard">
                                                      </a>
                                                      <a href="#" class="logos-item">
                                                            <img src="<?php echo e(asset('app/img/discover.png')); ?>" alt="DISCOVER">
                                                      </a>
                                                      <a href="#" class="logos-item">
                                                            <img src="<?php echo e(asset('app/img/amex.png')); ?>" alt="Amex">
                                                      </a>
                                                      
                                                      <span style="float: right;">
                                                            <form action="<?php echo e(route('cart.checkout')); ?>" method="POST">
                                                                  <?php echo e(csrf_field()); ?>

                                                                  <script
                                                                  src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                                  data-key="pk_test_9yypJGq72lGLfKeHEhiTWPZ6"
                                                                  data-amount="<?php echo e(Cart::total() * 100); ?>"
                                                                  data-name="E-commerce"
                                                                  data-description="Buy some books"
                                                                  data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                                                  data-locale="auto">
                                                                  </script>
                                                            </form>
                                                      </span>
                                                </div>
                                          </div>

                                    </form>
                              </div>
                        </div>

			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>