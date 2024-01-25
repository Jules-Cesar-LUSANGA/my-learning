<x-app-layout>
    <div>
        <article>
            <p>{{ $task->title }}</p>
            <p>{{ $task->category->name }}</p>
            <p>
                @if ($task->done == true)
                    <span style="color: blue; font-weight:bold;">Done</span>
                @else
                    <span style="color: red; font-weight:bold;">Not done</span>
                @endif
            </p>
            <p>
                {{ $task->description }}
            </p>

            <div>
                <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" style="display: inline" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Delete">
                </form>
                @if ($task->done != true)
                    <form action="{{ route('tasks.markAsDone', $task->id) }}" style="display: inline" method="post">
                        @csrf
                        <input type="submit" value="Mark as done">
                    </form>
            </div>                           
            @endif
        </article>
    </div>
</x-app-layout>