<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add New Question Category') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/question-categories">
                            @csrf
                            @method('POST')

                            <div class="form-group">
                                <label for="question_type">Question Type</label>
                                <input name="question_type" type="text" class="form-control" id="question_type"
                                       aria-describedby="question_type_help"
                                       placeholder="Enter Question Type">
                                <small id="question_type_help" class="form-text text-muted">What is the type of question?</small>

                                @error('question_type')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="purpose">Purpose</label>
                                <input name="purpose" type="text" class="form-control" id="purpose"
                                       aria-describedby="purpose_help"
                                       placeholder="Enter Purpose">
                                <small id="purpose_help" class="form-text text-muted">What is the purpose of this
                                    question?</small>
                            </div>

                            @error('purpose')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <button type="submit" class="btn btn-primary">Create Question Category</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
