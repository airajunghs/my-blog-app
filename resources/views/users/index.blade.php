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
      <th>Name</th>
      <th>Email</th>
      
    </tr>
  </thead>

  <tbody>
  @foreach ($users as $usr) 
    <tr>
      <td>{{$usr->name}} </td>
      <td>{{$usr->email}} </td>
    </tr>          
                
            @endforeach
  </tbody>
</table>

           
            </div>
        </div>
    </div>
</x-app-layout>

<!-- efef -->