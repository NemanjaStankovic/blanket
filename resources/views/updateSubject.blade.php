<x-app-layout>
    <x-slot name="header">
        <h2 class="page-title">
            {{ __('Izmeni predmet') }}
        </h2>
    </x-slot>
    <x-slot name="path">
        <li class="breadcrumb-item">
            <a href="{{route('subject.index')}}">Predmeti</a>
        </li>
        <li class="breadcrumb-item active">
            Azuriraj
        </li>
    </x-slot>
    <div class="container-fluid">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="card">
                <div class="card-body">
                    <section>

                        <form method="POST" action="{{ route('subject.update', ['oldId'=>$id]) }}" class="mt-6 space-y-6">
                            @csrf
                            @method('PATCH')

                            <!-- Identificator -->
                            <div class="col-lg-6">
                                <x-input-label for="subjectID" :value="__('ID predmeta')" />
                                <x-text-input id="subjectID" class="mt-1 block w-full mb-3" type="" name="subjectID" value={{$id}} required autofocus autocomplete="id" />
                                <x-input-error :messages="$errors->get('subjectID')" class="mt-2" />
                            </div>

                            <!-- Name -->
                            <div class="col-lg-6">
                                <x-input-label for="name" :value="__('Naziv predmeta')" />
                                <x-text-input id="name" class="mt-1 block w-full mb-3" type="text" name="name" value={{$name}} required autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <x-primary-button class="flex items-center gap-4">
                                {{ __('Izmeni predmet') }}
                            </x-primary-button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
