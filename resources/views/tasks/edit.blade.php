@extends('app')

@section('title', 'Edit Task')

@section('content')

<div class="card">
    <h1>Edit Task</h1>
    <p>Update your task information below.</p>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="task_name">Task Name</label>

            <input
                type="text"
                id="task_name"
                name="task_name"
                value="{{ old('task_name', $task->task_name) }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="description">Description</label>

            <textarea
                id="description"
                name="description"
            >{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>

            <input
                type="date"
                id="due_date"
                name="due_date"
                value="{{ old('due_date', $task->due_date) }}"
            >
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <select id="status" name="status" required>
                <option value="Pending"
                    {{ old('status', $task->status) === 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="Completed"
                    {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            Update Task
        </button>

        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </form>
</div>

@endsection