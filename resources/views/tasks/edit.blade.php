<x-app-layout>
    <div>
        <form action="{{ route('tasks.store') }}" method="post"> 
            @csrf

            <div>
                <label for="category">Task category</label>
                <select name="category_id" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>
            </div>
            <div>
                <label for="title">Title</label>
                <x-input-form name="title" id="title" value="{{ old('title') ? old('title') : $task->title }}" />
                <p>
                    @error('title')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <div>
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10">{{ old('description') ? old('description') : $task->description }}</textarea>
                <p>
                    @error('description')
                        {{ $message }}
                    @enderror
                </p>
            </div>
            <input type="submit" value="Save">
        </form>
    </div>
</x-app-layout>
