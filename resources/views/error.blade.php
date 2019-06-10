@extends('layouts.app')

@section('content')

    <!-- Page Wrapper -->
    <div id="wrapper" class="vh-100">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column align-items-center">

            <!-- Main Content -->
            <div id="content d-flex align-items-center">

                <!-- Begin Page Content -->
                <div class="container d-flex align-items-center vh-100">

                    <div class="row">
                        <div class="col-12">

                            <!-- 404 Error Text -->
                            <div class="text-center">
                                <div class="error mx-auto" data-text="500">500</div>
                                <p class="lead text-gray-800 mb-5">An Error Occured</p>
                                <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                                <a href="#">&larr; Back to Dashboard</a>
                                <br><hr><br>
                                <a href="#" onclick="openGitHubReport();" class="btn btn-primary">Report</a>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

@endsection
