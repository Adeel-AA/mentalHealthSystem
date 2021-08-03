<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Self-Assessments</div>

                    <div class="card-body container-fluid">
                        <div class="h3">
                            <p>Choose which area you'd like to focus on</p>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($questionCategories as $questionCategory)
                                <li class="list-group-item p-4">
                                    <a href="{{ $questionCategory->path() }}">{{ $questionCategory->question_type }}</a>
                                    <small id="purpose"
                                           class="form-text text-muted">{{ $questionCategory->purpose }}</small>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>


</x-app>
