<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ $questionCategory->question_type }}</div>
                    <div class="card-body">{{ $questionCategory->purpose }}</div>
                </div>
                <form method="POST"
                      action="/surveys/{{ $questionCategory->id }}-{{Str::slug($questionCategory->question_type)}}">
                    @csrf
                    @method('POST')

                    @foreach($questionCategory->questions as $key => $question)
                        <div class="card mt-4">
                            <div class="card-header">{{ $key + 1 }}. {{ $question->question }}</div>

                            <div class="card-body">

                                @error('responses.' . $key . '.answer_id')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <ul class="list-group">
                                    @foreach($question->answers as $answer)
                                        <label for="answer{{ $answer->id }}">
                                            <li class="list-group-item">
                                                <input type="radio" name="responses[{{ $key }}][answer_id]"
                                                       id="answer{{ $answer->id }}"
                                                       {{ (old('responses.' . $key . '.answer_id') == $answer->id) ? 'checked' : '' }}
                                                       class="mr-2" value="{{ $answer->id }}">
                                                {{ $answer->answer }}

                                                <input type="hidden" name="responses[{{ $key }}][question_id]"
                                                       value="{{ $question->id }}">
                                            </li>
                                        </label>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                    <br>
                    <button class="btn btn-lg btn-dark" type="submit">Complete Survey</button>
                </form>

                {{--                <div class="card">--}}
                {{--                    <div class="card-header">Personal Details</div>--}}
                {{--                    <div class="card-body">--}}


                {{--                        <div class="form-group">--}}
                {{--                            <label for="question_type">Question Type</label>--}}
                {{--                            <input name="question_type" type="text" class="form-control" id="question_type"--}}
                {{--                                   aria-describedby="question_type_help"--}}
                {{--                                   placeholder="Enter Question Type">--}}
                {{--                            <small id="question_type_help" class="form-text text-muted">Please enter a question type--}}
                {{--                                such as health...</small>--}}

                {{--                            @error('question_type')--}}
                {{--                            <small class="text-danger">{{ $message }}</small>--}}
                {{--                            @enderror--}}
                {{--                        </div>--}}

                {{--                        <div class="form-group">--}}
                {{--                            <label for="purpose">Purpose</label>--}}
                {{--                            <input name="purpose" type="text" class="form-control" id="purpose"--}}
                {{--                                   aria-describedby="purpose_help"--}}
                {{--                                   placeholder="Enter Purpose">--}}
                {{--                            <small id="purpose_help" class="form-text text-muted">What is the purpose of this--}}
                {{--                                question?</small>--}}
                {{--                        </div>--}}

                {{--                        @error('purpose')--}}
                {{--                        <small class="text-danger">{{ $message }}</small>--}}
                {{--                        @enderror--}}

                {{--                       --}}

                {{--                    </div>--}}
                {{--                </div>--}}

            </div>
        </div>
    </div>
</x-app>
