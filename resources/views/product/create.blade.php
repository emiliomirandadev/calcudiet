<x-app-layout>
    <x-slot name="slot">
     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <x-success-message />    

                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-6 grid-rows-1 gap-4 container md:flex">
                                <div class="col-start-1 col-span-1">
                                    <x-label for="name" :value="__('Name')" />
                                    <x-input id="name" class="block mt-1" type="text" name="name" />
                                </div>
                                <div class="col-start-2 col-span-1">
                                    <x-label for="kcal" :value="__('Kcal')" />
                                    <x-input id="kcal" class="block mt-1" type="number" name="kcal" />
                                </div>
                                <div class="col-start-3 col-span-1">
                                    <x-label for="gramos" :value="__('Grams')" />
                                    <x-input id="gramos" class="block mt-1" type="number" name="gram" />
                                </div>
                                <div class="col-start-4 col-span-1">
                                    <x-label for="comment" :value="__('Comment')" />
                                    <x-input id="comment" class="block mt-1" type="text" name="comment" />
                                </div>
                                <div class="col-start-5 col-span-1">
                                    <x-label for="photo" :value="__('Photo')" />
                                    <x-input id="photo" class="block mt-1" type="file" name="photo" />
                                </div>
                                <div class="mt-4 col-start-6 col-span-1">
                                    <x-button class="ml-3">
                                        {{ __('Create') }}
                                    </x-button>
                                </div>
                        </div>
                                <!-- <div class="flex items-center justify-end mt-4">
                                    
                                </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div> 
    </x-slot>
</x-app-layout>