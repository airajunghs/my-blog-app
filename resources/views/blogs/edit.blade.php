<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            
            <!-- Title -->
            <!-- next process after store untuk action -->
            <form action="{{route('blogs.update', $blog->id) }}" method="POST"> 
                @csrf
                @method('PUT')
                <!-- untuk edit sahaja letak method put -->
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{$blog->title}}">
                <br><br>

                <!-- Description -->
                <label for="description">Description:</label>
                <input type="text" id="description" name="description" value="{{$blog->description}}">
                <br><br>
                <button type="submit">Update Blog</button>
            </form> 

            <form action="{{route('blogs.delete', $blog->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>

           
            </div>
        </div>
    </div>
</x-app-layout>

<!-- efef -->