<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ticket Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach($trips as $t)
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <form method="POST" action="{{ route('seat-allocations.store') }}">
                                        @csrf
                                        <div>
                                            <x-text-input id="id" class="block mt-1 w-full" type="hidden" name="id"
                                                :value="$t->id" />
                                            <x-input-label for="name" :value="__('Route')" />
                                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                                :value="$t->description" readOnly />
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-input-label for="departure_date" :value="__('Dep. Date')" />
                                            <x-text-input id="departure_date" class="block mt-1 w-full" type="date"
                                                name="departure_date" :value="$t->departure_date" readOnly />
                                            <x-input-error :messages="$errors->get('departure_date')" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-input-label for="departure_time" :value="__('Dep. Time')" />
                                            <x-text-input id="departure_time" class="block mt-1 w-full" type="time"
                                                name="departure_time" :value="$t->departure_time" readOnly />
                                            <x-input-error :messages="$errors->get('departure_time')" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-input-label for="return_date" :value="__('Ret. Date')" />
                                            <x-text-input id="return_date" class="block mt-1 w-full" type="date"
                                                name="return_date" :value="$t->return_date" readOnly />
                                            <x-input-error :messages="$errors->get('return_date')" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-input-label for="return_time" :value="__('Dep. Time')" />
                                            <x-text-input id="return_time" class="block mt-1 w-full" type="time"
                                                name="return_time" :value="$t->return_time" readOnly />
                                            <x-input-error :messages="$errors->get('return_time')" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-input-label for="seat-number" :value="__('Seat Number')" />
                                            <select id="seat-number" name="seat-number"
                                                class="border-2 border-gray-300 p-2 w-full rounded-md" required>
                                                <option value="" disabled selected>Select an option</option>
                                                @foreach(range(1,36) as $number)
                                                <option value="{{ $number }}" {{ old('number')==$number ? 'selected'
                                                    : '' }}>
                                                    {{ $number }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <br />
                                            <x-input-error :messages="$errors->get('return_loc')" class="mt-2" />
                                        </div>
                                        <div class="flex items-center justify-end mt-4">
                                            <x-primary-button class="ms-4">
                                                {{ __('Book') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>