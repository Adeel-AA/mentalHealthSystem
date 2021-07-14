<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Assessments') }}</div>

                    <div class="card-body">
                        <a class="btn btn-dark" href="/assessments/{{ $assessment->id }}/questions/create">Add New Question</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
