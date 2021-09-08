<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-blue-5">Assessment</div>
                    <div class="card-body container-fluid">


                        <div class="card mt-4">
                            {{--                            @foreach($questionCategories as $questionCategory)--}}
                            @foreach($questionCategories as $questionCategory)
                                <h1 class="card-header bg-blue-5">Question
                                    Type: {{ $questionCategory->question_type }}</h1>
                                <div class="card-body">

                                    <small id="purpose"
                                           class="form-text text-muted">Question
                                        Purpose: {{ $questionCategory->purpose }}</small>
                                    @endforeach
                                </div>
                        </div>
                    </div>
                </div>
                @foreach($questionCategory->questions as $question)
                    <div class="card mt-4">
                        <div class="card-header bg-blue-5">{{ $question->question }}</div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                                    {{--                                    @if($answer->id === $question->id)--}}
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>{{ $answer->answer }}</div>
                                        @if($question->responses->count())
                                            <div>{{ intval(($answer->responses->count() * 100) / $question->responses->count()) }}
                                                %
                                            </div>
                                        @endif

                                    </li>
                                    {{--                                    @endif--}}
                                @endforeach
                            </ul>
                        </div>


                    </div>
                @endforeach
                @foreach($responses as $response)
                    @if($response->notes)
                        <div class="card mt-4">
                            <div class="card-header bg-blue-5">Notes</div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach($responses as $response)
                                        @if($questionCategories->id === $response->question_category_id)

                                            <li class="list-group-item d-flex justify-content-between">
                                                <div>{{ $response->notes }}</div>


                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>


                        </div>
                    @endif
                @endforeach
                <br>
            </div>
        </div>
    </div>
</x-app>
