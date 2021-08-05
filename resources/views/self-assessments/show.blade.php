<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">My Assessments</div>
                    <div class="card-body container-fluid">
                        <div class="h5 text-center">
                            <p>Please select one of your previous assessments to view</p>
                        </div>
                        <br>

                        <ul class="list-group">
                            @foreach($responses as $response)
                                <li class="list-group-item border {{$loop->last ? '' : 'mb-4'}} p-4">
                                    <a class="stretched-link"
                                       href="">Assessment Submitted: {{ $response->created_at }}</a>
                                    @foreach($questionCategories as $questionCategory)
                                        @if($questionCategory->id === $response->question_category_id)
                                            <small id="question_type"
                                                   class="form-text text-muted">Question
                                                Type: {{$questionCategory->question_type}} </small>
                                            <small id="question_purpose"
                                                   class="form-text text-muted">Question
                                                Purpose: {{$questionCategory->purpose}} </small>
                                        @endif
                                    @endforeach

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
