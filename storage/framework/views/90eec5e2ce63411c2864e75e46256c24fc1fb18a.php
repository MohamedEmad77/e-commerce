<?php $__env->startSection('content'); ?>

      
<?php echo $__env->make('includes.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <div class="panel panel-default">
            <div class="panel-heading">
                  edit <?php echo e($product->name); ?>

            </div>

            <div class="panel-body">
                  <form action="<?php echo e(route('products.update', ['id' => $product->id])); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PUT')); ?>

                        <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" name="name" class="form-control" value="<?php echo e($product->name); ?>">
                        </div>
                        <div class="form-group">
                              <label for="image">Image</label>
                              <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="name">Price</label>
                              <input type="text" name="price" class="form-control" value="<?php echo e($product->price); ?>">
                        </div>
                        <div class="form-group">
                              <label for="Description">Description</label>
                              <textarea name="description" id="content" cols="5" rows="5" class="form-control"><?php echo e($product->description); ?></textarea>
                        </div>

                        <div class="form-group">
                              <div class="text-center">
                                    <button class="btn btn-success" type="submit">
                                          Edit product
                                    </button>
                              </div>
                        </div>
                  </form>
            </div>
      </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>