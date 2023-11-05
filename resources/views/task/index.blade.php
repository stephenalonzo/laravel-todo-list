<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <section class="px-4 py-6">
        <div class="container mx-auto w-1/3">
            <div class="flex flex-col space-y-5 w-full pb-5">
                <h1 class="font-semibold text-2xl">
                    To-do List
                </h1>
                <form action="{{ route('task.store') }}" method="post">
                    @csrf
                    <div class="flex flex-row items-center space-x-4">
                        <input 
                        type="text" 
                        name="description" 
                        id="" 
                        placeholder="Enter task"
                        class="px-4 py-2 rounded-md border-2 border-gray-200 w-full">
                        <button type="submit" class="px-4 py-2 rounded-md bg-green-600 text-white font-semibold">Add</button>
                    </div>
                </form>
            </div>
            <hr class="pb-5">
            <div class="space-y-8">
                @foreach ($tasks as $task)
                    <div class="flex flex-row items-center justify-between w-full">
                        <h3 class="font-semibold text-xl">{{ $task->description }}</h3>
                        <div class="flex flex-row items-center space-x-3">
                            <form 
                                action="{{ route('task.update', $task->id) }}" 
                                method="post">
                                @csrf
                                @method('PATCH')
                                <input 
                                    type="text" 
                                    name="status" 
                                    id="" 
                                    class="hidden"
                                    value="Complete">
                                <button type="submit" class="px-4 py-2 rounded-md bg-blue-600 text-white font-semibold">Complete</button>
                            </form>
                            <form 
                                action="{{ route('task.destroy', $task->id) }}" 
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 rounded-md bg-red-600 text-white font-semibold">Delete</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </section>
</body>
</html>