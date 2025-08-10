<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col gap-5">

                    @foreach ($events as $event)
                        <div class="grid grid-cols-4 py-6 px-5 border items-center border-white/10 rounded-lg">
                            <div class="">
                                <h1 class="text-blue-300">Name :</h1>
                                <h1 class="text-2xl w-[15vw]">{{ $event->user->name }}</h1>
                            </div>
                            <div class="">
                                <h1 class="text-blue-300">Start Event :</h1>
                                <h1 class="text-2xl text-green-500">{{ $event->start }}</h1>
                            </div>
                            <div class="">
                                <h1 class="text-blue-300">End Event :</h1>
                                <h1 class="text-2xl text-red-600">{{ $event->end }}</h1>
                            </div>
                            <div class="flex justify-end w-full gap-5">
                                <form action="/event/update/{{ $event->id }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="text-lg font-medium bg-green-600 px-5 py-2 rounded-md hover:bg-green-700 cursor-pointer">Edit</button>
                                </form>
                                <form action="/event/destroy/{{ $event->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-lg font-medium bg-red-600 px-5 py-2 rounded-md hover:bg-red-700 cursor-pointer">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</x-app-layout>
