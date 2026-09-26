@extends('app')

@section('title', 'My Tasks')

@section('content')

<div class="card">
    <h1>My Tasks</h1>
    <p>Organize your daily activities and deadlines.</p>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">
        + Add New Task
    </a>
</div>

@if (session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <h2>Task List</h2>

    @if ($tasks->count() > 0)

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
                    @foreach ($tasks as $task)
                        <tr>
                            <td>
                                {{ $task->task_name }}
                            </td>

                            <td>
                                {{ $task->description ?: 'No description' }}
                            </td>

                            <td>
                                {{ $task->due_date ?: 'No deadline' }}
                            </td>

                            <td>
                                <span class="status {{ $task->status === 'Completed' ? 'completed' : 'pending' }}">
                                    {{ $task->status }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ route('tasks.edit', $task->id) }}"
                                   class="btn btn-edit">
                                    Edit
                                </a>

                                <form action="{{ route('tasks.destroy', $task->id) }}"
                                      method="POST"
                                      style="display:inline"
                                      onsubmit="return confirm('Are you sure you want to delete this task?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-delete">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @else
        <p>No tasks found. Click Add New Task to create your first task.</p>
    @endif
</div>

@endsection