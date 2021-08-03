<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-blue">Self-Assessments</div>

                    <div class="card-body container-fluid">
                        <div class="">

                            <div class="btn btn-dark btn-lg">
                                <a href="/question-categories/create">Add New Question Category</a>
                            </div>
                            <div class="btn btn-dark btn-lg">
                                <a href="">View My Assessments</a>
                            </div>


                        </div>
                        <div class="h3">
                            <p>Choose which area you'd like to focus on...</p>

                        </div>
                        <div class="h4">
                            <p>To begin an assessment please select...</p>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($questionCategories as $questionCategory)
                                    <li class="list-group-item border {{$loop->last ? '' : 'mb-4'}} p-4">
                                        <a class="stretched-link"
                                           href="{{ $questionCategory->path() }}">{{ $questionCategory->question_type }}</a>
                                        <small id="purpose"
                                               class="form-text text-muted">{{ $questionCategory->purpose }}</small>
                                    </li>
                                @endforeach
                                {{--                                    <div class="btn btn-dark btn-lg">--}}
                                {{--                                        <a href="/surveys/{{ $questionCategory->id}}-{{ Str::slug($questionCategory->question_type) }}">Start--}}
                                {{--                                            Self-Assessment</a>--}}
                                {{--                                    </div>--}}
                            </ul>
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>


</x-app>
