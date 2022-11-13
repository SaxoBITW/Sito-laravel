<?php $__env->startSection('title', $viewData["title"]); ?>
<?php $__env->startSection('content'); ?>
<div class="card mb-4">
    <div class="card-header">
      Create blogs
    </div>
    <div class="card-body">
      <?php if($errors->any()): ?>
      <ul class="alert alert-danger list-unstyled">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>- <?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
      <?php endif; ?>

      <form method="POST" action="<?php echo e(route('admin.blog.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="row">
          <div class="col">
            <div class="mb-3 row">
              <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Title:</label>
              <div class="col-lg-10 col-md-6 col-sm-12">
                <input name="title" value="<?php echo e(old('name')); ?>" type="text" class="form-control">
              </div>
            </div>
          </div>
          
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Description</label>
          <textarea class="form-control" name="description" rows="3"><?php echo e(old('description')); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

<!-- Vista dei Prodotti in tabella -->
<div class="card">
  <div class="card-header">
    Manage Blogs
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Published</th>
          <th scope="col">Created</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $viewData["blog"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($blog->getId()); ?></td>
          <td><?php echo e($blog->getTitle()); ?></td>
          <td><?php echo e($blog->getCreatedAt()); ?></td>
          <td><?php echo e($blog->getUpdatedAt()); ?></td>
          <td>Data pubblicazione<td>
            <td>Data modifica<td>
            <a class="btn btn-primary" href="<?php echo e(route('admin.blog.edit', ['id'=>$blog->getId()])); ?>">
                <i class="bi-pencil"></i>
            </a>
          </td>
          <td>
            <form action="<?php echo e(route('admin.blog.delete', $blog->getId())); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger">
                        <i class="bi bi-trash3"></i>
                    </button>
                </form>
              </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMAZIONE\Progetti Laravel\onlineStore4\resources\views/admin/blog/index.blade.php ENDPATH**/ ?>