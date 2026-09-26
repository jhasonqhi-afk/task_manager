@extends('app')

@section('title', 'Add Task')

@section('content')

<div class="card">
    <h1>Add New Task</h1>
    <p>Enter the details of your task below.</p>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="task_name">Task Name</label>

            <input
                type="text"
                id="task_name"
                name="task_name"
                value="{{ old('task_name') }}"
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
            >{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>

            <input
                type="date"
                id="due_date"
                name="due_date"
                value="{{ old('due_date') }}"
            >
        </div>

        <div class="form-group">
            <label for="status">Status</label>

            <select id="status" name="status" required>
                <option value="Pending"
                    {{ old('status', 'Pending') === 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="Completed"
                    {{ old('status') === 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            Save Task
        </button>

        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </form>
</div>

@endsection