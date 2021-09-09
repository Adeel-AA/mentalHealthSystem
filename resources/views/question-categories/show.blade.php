<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-blue-5">Questions</div>
                    <div class="card-body container-fluid">

                        <div class="btn btn-dark btn-lg">
                            <a href="/question-categories/{{ $questionCategory->id }}/questions/create">Add New
                                Question</a>

                        </div>


                        <div class="card mt-4">
                            <h1 class="card-header bg-blue-5">Question Type: {{ $questionCategory->question_type }}</h1>
                            <div class="card-body">

                                <small id="purpose"
                                       class="form-text text-muted">Question
                                    Purpose: {{ $questionCategory->purpose }}</small>
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
                                  action="/question-categories/{{ $questionCategory->id }}/questions/{{ $question->id }}">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn btn-sm btn-outline-danger float-right">Delete
                                    Question
                                </button>
                            </form>
                        </div>

                    </div>
                @endforeach
                <br>
            </div>
        </div>
    </div>
</x-app>
