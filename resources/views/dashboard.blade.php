<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form action="/event/store" method="post" class="mb-2 hidden">
                        @csrf
                        <input type="datetime-local" name="start" id="start">
                        <input type="datetime-local" name="end" id="end">
                        <button id="submitBtn">Submit</button>
                    </form>
                    
                    <form method="post" class="mb-2 hidden" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <input type="text" value="{{ Auth::user()->id }}" id="authId">
                        <button id="deleteBtn">Submit</button>
                    </form>

                    <form method="post" class="mb-2 hidden" id="updateForm">
                        @csrf
                        @method('PUT')
                        <input type="datetime-local" name="updateStart" id="updateStart">
                        <input type="datetime-local" name="updateEnd" id="updateEnd">
                        <button id="updateBtn">Submit</button>
                    </form>

                    <div id='calendar'></div>

                    <div class="w-full flex justify-end mt-5">
                        <a href="/pay-with-stripe" class="px-6 py-2 rounded-md text-white bg-yellow-500 text-xl font-medium cursor-pointer hover:bg-yellow-600">Pay With Stripe</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
