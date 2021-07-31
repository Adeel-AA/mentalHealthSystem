<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                        <a class="btn btn-dark" href="/questionCategories/{{ $questionCategory->id }}/questions/create">Add New
                            Question</a>
                        <a class="btn btn-dark"
                           href="/surveys/{{ $questionCategory->id}}-{{ Str::slug($questionCategory->question_type) }}">Take
                            questionCategory</a>

                        <h1 class="card-header">{{ $questionCategory->question_type }}</h1>
                        <small id="purpose" class="form-text text-muted">{{ $questionCategory->purpose }}</small>

                    </div>
                </div>

                @foreach($questionCategory->questions as $question)
                    <div class="card mt-4">
                        <div class="card-header">{{ $question->question }}</div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                                    <li class="list-group-item d-flex justify-content-between">
                                        <div>{{ $answer->answer }}</div>
                                        @if($question->responses->count())
                                            <div>{{ intval(($answer->responses->count() * 100) / $question->responses->count()) }}
                                                %
                                            </div>
                                        @endif

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-footer">
                            <form method="POST"
                                  action="/questionCategories/{{ $questionCategory->id }}/questions/{{ $question->id }}">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete Question</button>
                            </form>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app>
