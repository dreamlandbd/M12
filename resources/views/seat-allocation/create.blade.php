<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Trips') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('seat-allocations.search') }}">
                        @csrf
                        <div>
                            <x-input-label for="departure_loc" :value="__('Depature Location')" />
                            <select id="departure_loc" name="departure_loc"
                                class="border-2 border-gray-300 p-2 w-full rounded-md" required>
                                <option value="" disabled selected>Select an option</option>
                                @foreach($options as $value => $label)
                                <option value="{{ $label->id }}" {{ old('departure_loc')==$label->name ? 'selected' : ''
                                    }}>
                                    {{ $label->name }}
                                </option>
                                @endforeach
                            </select>
                            <br />
                            <x-input-error :messages="$errors->get('departure_loc')" class="mt-2" />
                        </div>
                        <br />
                        <div>
                            <x-input-label for="return_loc" :value="__('Return Location')" />
                            <select id="return_loc" name="return_loc"
                                class="border-2 border-gray-300 p-2 w-full rounded-md" required>
                                <option value="" disabled selected>Select an option</option>
                                @foreach($options as $value => $label)
                                <option value="{{ $label->id }}" {{ old('return_loc')==$label->name ? 'selected' : ''
                                    }}>
                                    {{ $label->name }}
                                </option>
                                @endforeach
                            </select>
                            <br />
                            <x-input-error :messages="$errors->get('return_loc')" class="mt-2" />
                        </div>
                        <br />
                        <div>
                            <x-input-label for="date_of_departure" :value="__('Date of Departure')" />
                            <input type="date" id="date_of_departure" name="date_of_departure"
                                class="border-2 border-gray-300 p-2 w-full rounded-md"
                                value="{{ old('date_of_departure') }}" required />
                            <br />
                            <x-input-error :messages="$errors->get('date_of_departure')" class="mt-2" />
                        </div>
                        <br />
                        <div>
                            <x-input-label for="date_of_return" :value="__('Date of Return')" />
                            <input type="date" id="date_of_return" name="date_of_return"
                                class="border-2 border-gray-300 p-2 w-full rounded-md"
                                value="{{ old('date_of_return') }}" required />
                            <br />
                            <x-input-error :messages="$errors->get('date_of_return')" class="mt-2" />
                        </div>
                        <br />
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Search') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>