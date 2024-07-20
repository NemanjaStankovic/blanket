<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Pretraga') }}
        </h2>
    </header>
    <form method="GET" action="{{ route('subject.getAll') }}" class="mt-6 space-y-6">
        @csrf

        <!-- Identificator -->
        <div class="row align-items-center">
            <div class="col-auto">
                <x-input-label for="subjectID" :value="__('ID predmeta')" />
            </div>
            <div class="col-auto">
                <x-text-input id="subjectIDFilter" class="mt-1 block w-full mb-3" type="" name="subjectID" :value="old('subjectID')" />
                <x-input-error :messages="$errors->get('subjectID')" class="mt-2" />
            </div>
            <div class="col-auto">
                <x-input-label for="name" :value="__('Naziv predmeta')" />
            </div>
            <div class="col-auto">
                <x-text-input id="nameFilter" class="mt-1 block w-full mb-3" type="text" name="name" :value="old('name')"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class = "col-auto">
                <x-primary-button class="mb-2">
                    {{ __('Pretrazi') }}
                </x-primary-button>
            </div>
            <div class="col-auto">
                <a href="{{ route('subject.index') }}" class="btn btn-outline-primary waves-effect waves-light mb-2">
                    {{ __('Ponisti filter') }}
                </a>
            </div>

        </div>
    </form>
</section>
