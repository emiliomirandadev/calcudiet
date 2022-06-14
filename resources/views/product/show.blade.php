<x-app-layout>
    <x-slot name="slot">
     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
        <table class="min-w-full">
          <thead class="border-b">
            <tr>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                #
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Name
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Kcal/100g
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Comment
              </th>
              @auth
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                Acciones
              </th>
              @endauth
            </tr>
          </thead>
          <tbody>
                @foreach( $products as $product )
                    <tr class="border-b">
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <img src="{{ asset('storage').'/'.$product->photo }}" width="100" class="p-1 bg-white border rounded max-w-sm" alt="Alimento">
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $product->name }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $product->kcal }}
                        </td>
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $product->comment }}
                        </td>
                        @auth
                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <div class="flex flex-row">
                        <form method="POST" action=" {{ route('products.destroy',[$product -> id]) }} ">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
                                onclick="return confirm('Do you want to delete this entry?')" value "Delete">
                                Delete
                            </button>
                        </form>
                        <form method="POST" action=" {{ route('products.edit',[$product -> id]) }} ">
                            @csrf
                            {{ method_field('GET') }}
                            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" value "Edit">
                                Edit
                            </button>
                        </form>
                        </div>
                        </td>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
                </div>
            </div>
        </div>
    </div> 
    </x-slot>
</x-app-layout>