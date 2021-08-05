<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ $questionCategory->question_type }}</div>
                    <div class="card-body">{{ $questionCategory->purpose }}</div>
                </div>
                <form method="POST"
                      action="/surveys/{{ $questionCategory->id }}">
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
                    <button class="btn btn-primary" type="submit">Complete Survey</button>
                    <button class="btn btn-secondary float-right" type="reset">Clear Form</button>
                </form>

           <br>
            </div>
        </div>
    </div>
</x-app>
