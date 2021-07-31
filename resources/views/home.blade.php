<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Home Page</div>

                    <div class="card-body">

                        <a href="/questionCategories/create" class="btn btn-dark">Create New Question Category</a>

                        <a href="/questionCategories/create" class="btn btn-dark">Start Question Category</a>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($questionCategories as $questionCategory)
                                    <li class="list-group-item">
                                        <a href="{{ $questionCategory->path() }}">{{ $questionCategory->question_type }}</a>

                                        <small id="purpose" class="form-text text-muted">{{ $questionCategory->purpose }}</small>

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


</x-app>
