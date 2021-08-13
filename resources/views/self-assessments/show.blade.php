<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-blue-5">My Assessments</div>
                    <div class="card-body container-fluid">
                        @if($responses->isEmpty())
                            <div class="h5 text-center">
                                <p>You dont have any assessments</p>
                            </div>
                        @endif
                        <div class="h5 text-center">
                            <p>Please select one of your previous assessments to view</p>
                        </div>
                        <br>

                        <ul class="list-group">
                            @foreach($responses as $response)
                                <li class="list-group-item border {{$loop->last ? '' : 'mb-4'}} p-4">
                                    @foreach($questionCategories as $questionCategory)
                                        @if($questionCategory->id === $response->question_category_id)
                                            <a class="stretched-link"
                                               href="{{ route('my-self-assessment',$questionCategory->id) }}">Assessment
                                                Submitted: {{ \Carbon\Carbon::parse($response->created_at)->toRfc7231String() }}</a>
                                            <small id="question_type"
                                                   class="form-text text-muted">Question
                                                Type: {{$questionCategory->question_type}} </small>
                                            <small id="question_purpose"
                                                   class="form-text text-muted">Question
                                                Purpose: {{$questionCategory->purpose}} </small>
                                        @endif
                                    @endforeach
                                    @if($response->notes)
                                        <small id="question_type"
                                               class="form-text text-muted">Notes: {{$response->notes}} </small>
                                    @endif

                                </li>
                            @endforeach
                            {{--                                    <div class="btn btn-dark btn-lg">--}}
                            {{--                                        <a href="/surveys/{{ $questionCategory->id}}-{{ Str::slug($questionCategory->question_type) }}">Start--}}
                            {{--                                            Self-Assessment</a>--}}
                            {{--                                    </div>--}}
                        </ul>

                    </div>

                </div>


                <br>
            </div>
        </div>
    </div>
</x-app>
