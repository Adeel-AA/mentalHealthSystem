<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $assessment->question_type }}</div>

                    <div class="card-body">
                        <a class="btn btn-dark" href="/assessments/{{ $assessment->id }}/questions/create">Add New
                            Question</a>
                        <a class="btn btn-dark"
                           href="/surveys/{{ $assessment->id}}-{{ Str::slug($assessment->question_type) }}">Take
                            Assessment</a>

                    </div>
                </div>

                @foreach($assessment->questions as $question)
                    <div class="card mt-4">
                        <div class="card-header">{{ $question->question }}</div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                                    <li class="list-group-item">{{ $answer->answer }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app>
