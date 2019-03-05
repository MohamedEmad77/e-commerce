<?php $__env->startSection('content'); ?>

      <div class="panel panel-default">
            <div class="panel-heading">
                  Products
            </div>
            <div class="panel-body">
                  <table class="table table-hover">
                        <thead>
                              
                              <th>
                                    Name
                              </th>

                              <th>
                                    Price
                              </th>

                              <th>
                                    Edit
                              </th>
                              <th>
                                    Delete
                              </th>
                        </thead>

                        <tbody>
                              <?php if($products->count() > 0): ?>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <tr>
                                                 
                                                 <td>
                                                      <?php echo e($product->name); ?>

                                                </td>

                                                <td>
                                                      <?php echo e($product->price); ?>

                                                </td>

                                                <td>
                                                      <a href="<?php echo e(route('products.edit', ['id' => $product->id ])); ?>" class="btn btn-info btn-xs">
                                                            Edit
                                                      </a>
                                                </td>

                                                <td>
                                                      <form action="<?php echo e(route('products.destroy', ['id' => $product->id])); ?>}" method="post">
                                                        <?php echo e(csrf_field()); ?>

                                                        <?php echo e(method_field('DELETE')); ?>

                                                      <button class="btn btn-danger btn-xs">
                                                            Delete
                                                      </button>
                                                      </form>
                                                     
                                                </td>
                                          </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                   
                              <?php else: ?>
                                     <tr>
                                          <th colspan="5" class="text-center">No products yet.</th>
                                    </tr>
                              <?php endif; ?>
                        </tbody>
                  </table>
            </div>
            <div class="text-center">
                  <?php echo e($products->links()); ?>

            </div>
      </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>