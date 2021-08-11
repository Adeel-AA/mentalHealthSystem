<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-blue-5">Question Categories</div>

                    <div class="card-body container-fluid">

                        <div class="h5 text-center">
                            <p>Please select a category which you'd like to add questions to</p>
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

                <br>
            </div>
        </div>
    </div>


</x-app>
