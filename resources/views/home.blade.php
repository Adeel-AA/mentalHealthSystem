<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header bg-blue-5">Home Page</div>

                    <div class="card-body container-fluid text-center">
                        <div class="h4">
                            @guest()
                                <p>Welcome!</p>
                                <br>
                                <p>Please Login or Register</p>
                            @else
                                <p>Hello {{ auth()->user()->name }}, what would you like to do today?</p>
                        </div>
                        <br>
                        <div class="h3">
                            <p>Here are some quick actions</p>
                        </div>

                        <br>
                        <div class="mx-auto">

                            <div class="btn btn-dark btn-lg">
                                <a href="{{ route('self-assessments') }}">Start New Assessment</a>
                            </div>
                            <div class="btn btn-dark btn-lg">
                                <a href="{{ route('show-self-assessments') }}">My Assessments</a>
                            </div>
                            <div class="btn btn-dark btn-lg">
                                <a href="{{ route('my-appointments') }}">My Calendar</a>
                            </div>

                        </div>

                        @endguest
                    </div>
                </div>
            </div>


        </div>
    </div>


</x-app>
