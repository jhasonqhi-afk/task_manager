

<?php $__env->startSection('title', 'My Tasks'); ?>

<?php $__env->startSection('content'); ?>

<div class="card">
    <h1>My Tasks</h1>
    <p>Organize your daily activities and deadlines.</p>

    <a href="<?php echo e(route('tasks.create')); ?>" class="btn btn-primary">
        + Add New Task
    </a>
</div>

<?php if(session('success')): ?>
    <div class="success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<div class="card">
    <h2>Task List</h2>

    <?php if($tasks->count() > 0): ?>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($task->task_name); ?>

                            </td>

                            <td>
                                <?php echo e($task->description ?: 'No description'); ?>

                            </td>

                            <td>
                                <?php echo e($task->due_date ?: 'No deadline'); ?>

                            </td>

                            <td>
                                <span class="status <?php echo e($task->status === 'Completed' ? 'completed' : 'pending'); ?>">
                                    <?php echo e($task->status); ?>

                                </span>
                            </td>

                            <td>
                                <a href="<?php echo e(route('tasks.edit', $task->id)); ?>"
                                   class="btn btn-edit">
                                    Edit
                                </a>

                                <form action="<?php echo e(route('tasks.destroy', $task->id)); ?>"
                                      method="POST"
                                      style="display:inline"
                                      onsubmit="return confirm('Are you sure you want to delete this task?')">

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button type="submit" class="btn btn-delete">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

    <?php else: ?>
        <p>No tasks found. Click Add New Task to create your first task.</p>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\personal-task-manager\resources\views/tasks/index.blade.php ENDPATH**/ ?>