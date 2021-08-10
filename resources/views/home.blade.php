<x-app>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header bg-blue-10  border-0">Home Page</div>

                    <div class="card-body container-fluid">
                        <div class="h2">
                            <p>Hello {{ auth()->user()->name }}, what would you like to do today?</p>
                        </div>
                        <br>
                        <div class="">

                            <div class="btn btn-dark btn-lg">
                                <a href="/question-categories/create">Start New Assessment</a>
                            </div>
                            <div class="btn btn-dark btn-lg">
                                <a href="/self-assessments/show">View My Assessments</a>
                            </div>

                        </div>


                    </div>
                </div>
            </div>


        </div>
    </div>
    </div>


</x-app>
