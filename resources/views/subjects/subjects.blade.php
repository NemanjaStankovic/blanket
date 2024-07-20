<x-app-layout>
    <x-slot name="header">
        <h2 class="page-title">
            {{ __('Predmeti') }}
        </h2>
    </x-slot>
    <x-slot name="path">
        <li class="breadcrumb-item active">
            Predmeti
        </li>
    </x-slot>
    <form method="GET" action="{{ route('addSubject') }}">
        @csrf
        <div class="ml-6">
            <button type="submit" class="btn btn-lg btn-primary waves-effect waves-light">
                {{ __('Dodaj') }}
            </button>
        </div>
    </form>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="card">
            <div class="card-body">
                @include('subjects.partials.tableView')
            </div>
        </div>
    </div>



    @include('subjects.partials.subject', $subjects)
    @include('plugins.sweetalert2')


{{--    <div class="container-fluid">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @include('profile.partials.update-profile-information-form')--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    @include('profile.partials.update-password-form')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</x-app-layout>
