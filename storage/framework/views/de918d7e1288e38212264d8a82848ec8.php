

<?php $__env->startSection('title', 'Add Task'); ?>

<?php $__env->startSection('content'); ?>

<div class="card">
    <h1>Add New Task</h1>
    <p>Enter the details of your task below.</p>

    <?php if($errors->any()): ?>
        <div class="error">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('tasks.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="task_name">Task Name</label>

            <input
                type="text"
                id="task_name"
                name="task_name"
                value="<?php echo e(old('task_name')); ?>"
                placeholder="Enter task name"
                required
            >
        </div>

        <div class="form-group">
            <label for="description">Description</label>

            <textarea
                id="description"
                name="description"
                placeholder="Enter task details"
            ><?php echo e(old('description')); ?></textarea>
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>

            <input
                type="date"
                id="due_date"
                name="due_date"
                value="<?php echo e(old('due_date')); ?>"
            >
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <select id="status" name="status" required>
                <option value="Pending"
                    <?php echo e(old('status', 'Pending') === 'Pending' ? 'selected' : ''); ?>>
                    Pending
                </option>

                <option value="Completed"
                    <?php echo e(old('status') === 'Completed' ? 'selected' : ''); ?>>
                    Completed
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            Save Task
        </button>

        <a href="<?php echo e(route('tasks.index')); ?>" class="btn btn-secondary">
            Cancel
        </a>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\personal-task-manager\resources\views/tasks/create.blade.php ENDPATH**/ ?>