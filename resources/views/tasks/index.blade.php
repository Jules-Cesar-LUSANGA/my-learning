<x-app-layout>
    <table>
        <thead>
            <tr>
                <th>*</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($tasks as $task)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->category->name }}</td>
                    <td>
                        @if ($task->done == true)
                            <span style="color: blue; font-weight:bold;">Done</span>
                        @else
                            <span style="color: red; font-weight:bold;">Not done</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('tasks.show', $task->id) }}">Show</a>
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
                        @endif

                    </td>
                </tr>
        @endforeach            
        </tbody>

    </table>
</x-app-layout>