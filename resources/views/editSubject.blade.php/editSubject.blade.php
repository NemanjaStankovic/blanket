<x-app-layout>
    <x-slot name="header">
        <h2 class="page-title">
            {{ __('Dodaj predmet') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="card">
                <div class="card-body">
                    <section>

                        <form method="POST" action="{{ route('subject.store') }}" class="mt-6 space-y-6">
                            @csrf

                            <!-- Identificator -->
                            <div class="col-lg-6">
                                <x-input-label for="subjectID" :value="__('ID predmeta')" />
                                <x-text-input id="subjectID" class="mt-1 block w-full mb-3" type="" name="subjectID" :value="old('subjectID')" required autofocus autocomplete="subjectID" />
                                <x-input-error :messages="$errors->get('subjectID')" class="mt-2" />
                            </div>

                            <!-- Name -->
                            <div class="col-lg-6">
                                <x-input-label for="name" :value="__('Naziv predmeta')" />
                                <x-text-input id="name" class="mt-1 block w-full mb-3" type="text" name="name" :value="old('name')" required autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <x-primary-button class="flex items-center gap-4">
                                {{ __('Dodaj predmet') }}
                            </x-primary-button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{--            @if (session('status') === 'password-updated')--}}
{{--                <p--}}
{{--                    x-data="{ show: true }"--}}
{{--                    x-show="show"--}}
{{--                    x-transition--}}
{{--                    x-init="setTimeout(() => show = false, 2000)"--}}
{{--                    class="text-sm text-gray-600"--}}
{{--                >{{ __('Saved.') }}</p>--}}
{{--            @endif--}}
