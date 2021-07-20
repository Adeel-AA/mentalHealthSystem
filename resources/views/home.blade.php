<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($assessments as $assessment)
                                    <li class="list-group-item">
                                        <a href="{{ $assessment->path() }}">{{ $assessment->question_type }}</a>

                                        <small id="purpose" class="form-text text-muted">{{ $assessment->purpose }}</small>

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        @can('create-assessment', $assessments)
                            <a href="/assessments/create" class="btn btn-dark">Create New Assessment</a>
                        @endcan
                        <a href="/assessments/create" class="btn btn-dark">Start Assessment</a>
                    </div>
                </div>


            </div>
        </div>
    </div>


</x-app>
