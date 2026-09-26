

<?php $__env->startSection('title', 'Edit Task'); ?>

<?php $__env->startSection('content'); ?>

<div class="card">
    <h1>Edit Task</h1>
    <p>Update your task information below.</p>

    <?php if($errors->any()): ?>
        <div class="error">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('tasks.update', $task->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label for="task_name">Task Name</label>

            <input
                type="text"
                id="task_name"
                name="task_name"
                value="<?php echo e(old('task_name', $task->task_name)); ?>"
                required
            >
        </div>

        <div class="form-group">
            <label for="description">Description</label>

            <textarea
                id="description"
                name="description"
            ><?php echo e(old('description', $task->description)); ?></textarea>
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>

            <input
                type="date"
                id="due_date"
                name="due_date"
                value="<?php echo e(old('due_date', $task->due_date)); ?>"
            >
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <select id="status" name="status" required>
                <option value="Pending"
                    <?php echo e(old('status', $task->status) === 'Pending' ? 'selected' : ''); ?>>
                    Pending
                </option>

                <option value="Completed"
                    <?php echo e(old('status', $task->status) === 'Completed' ? 'selected' : ''); ?>>
                    Completed
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            Update Task
        </button>

        <a href="<?php echo e(route('tasks.index')); ?>" class="btn btn-secondary">
            Cancel
        </a>
    </form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\personal-task-manager\resources\views/tasks/edit.blade.php ENDPATH**/ ?>