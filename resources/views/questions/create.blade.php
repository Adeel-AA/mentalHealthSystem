<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Question') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/question-categories/{{ $questionCategory->id }}/questions">
                            @csrf
                            @method('POST')

                            <div class="form-group">
                                <label for="question">Question</label>
                                <input name="question[question]" type="text" class="form-control"
                                       value="{{ old('question.question')  }}"
                                       id="question"
                                       aria-describedby="question_help"
                                       placeholder="Enter Question">
                                <small id="question_help" class="form-text text-muted">Please enter a question</small>

                                @error('question.question')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <fieldset>
                                    <legend>Choices</legend>

                                    <small id="choices_help" class="form-text text-muted">Please provide choices</small>

                                    <div>
                                        <div class="form-group">
                                            <label for="answer1">Choice 1</label>
                                            <input name="answers[][answer]" type="text"
                                                   value="{{ old('answers.0.answer')  }}"
                                                   class="form-control"
                                                   id="answer1"
                                                   aria-describedby="choices_help"
                                                   placeholder="Enter Choice 1">


                                            @error('answers.0.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <div class="form-group">
                                            <label for="answer2">Choice 2</label>
                                            <input name="answers[][answer]" type="text"
                                                   value="{{ old('answers.1.answer')  }}"
                                                   class="form-control"
                                                   id="answer2"
                                                   aria-describedby="choices_help"
                                                   placeholder="Enter Choice 2">

                                            @error('answers.1.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <div class="form-group">
                                            <label for="answer3">Choice 3</label>
                                            <input name="answers[][answer]" type="text"
                                                   value="{{ old('answers.2.answer')  }}"
                                                   class="form-control"
                                                   id="answer3"
                                                   aria-describedby="choices_help"
                                                   placeholder="Enter Choice 3">


                                            @error('answers.2.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <div class="form-group">
                                            <label for="answer4">Choice 4</label>
                                            <input name="answers[][answer]" type="text"
                                                   value="{{ old('answers.3.answer')  }}"
                                                   class="form-control"
                                                   id="answer4"
                                                   aria-describedby="choices_help"
                                                   placeholder="Enter Choice 4">


                                            @error('answers.3.answer')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                </fieldset>
                            </div>


                            @error('purpose')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <button type="submit" class="btn btn-primary">Add Question</button>
                            <button class="btn btn-secondary">Add Input</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
