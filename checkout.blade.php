{{-- route/web --}}
Route::patch('tasks/{task}', 'ProjectTasksController@update');
_______________________________________________________________
@if ($project->tasks->count())
    @foreach ($project->tasks as $task)
        <div class="">
            <form class="" action="/tasks/{{ $task->id }}" method="post">
                @csrf @method('PATCH')
                <label class="checkbox {{ $task->completed ? 'is-completed' : '' }}" for="completed">
                    <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                    {{ $task->description }}
                </label>
            </form>
        </div>
    @endforeach
@endif
