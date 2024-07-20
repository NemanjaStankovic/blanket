<section>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="card">
                <div class="card-body">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Spisak predmeta') }}
                        </h2>
                    </header>
                    <table class="table table-borderless table-hover table-nowrap table-centered m-0">
                        <thead class="table-light">
                        <tr>
                            <th>Sifra</th>
                            <th>Naziv predmeta</th>
                            <th>Akcija</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($subjects as $subject)
                            {{--            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">--}}
                            {{--                <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>--}}

                            {{--            </a>--}}
                            <tr>
                                <td>
                                    {{$subject['subjectID']}}
                                </td>
                                <td>
                                    {{$subject['name']}}
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('subject.destroy', ['id' => $subject->subjectID]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('updateSubject', ['id' => $subject->subjectID, 'name'=>$subject->name])}}" type="btn btn-primary"><i class="mdi mdi-pencil"></i></a>
                                        <a class="potvrdaBrisanja" type='btn btn-primary' href="{{ route('subject.destroy', ['id' => $subject->subjectID]) }}"><i class="mdi mdi-delete"></i></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
