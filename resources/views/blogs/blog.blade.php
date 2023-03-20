<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <table class="table-auto">
  <thead>
    <tr>
      <th>Title</th>
      <th>Description</th>
      <th>Action</th>
      
    </tr>
  </thead>

  <tbody>
  @foreach ($blogs as $blog) 
    <tr>
      <td>{{$blog->title}} </td>
      <td>{{$blog->description}} </td>
      <td><a href="{{route('blogs.edit', $blog->id) }}">Edit</a></td>
      <td>
      <form action="{{route('blogs.delete', $blog->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
      </td>
      
    </tr>          
                
            @endforeach
  </tbody>
</table>

           
            </div>
        </div>
    </div>
</x-app-layout>

<!-- efef -->