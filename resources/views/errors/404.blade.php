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
                                <img src="{{ asset('images/logo/logo.svg') }}" width="100" alt="Convene Logo" class="mb-5">
                                <div class="error mx-auto" data-text="404">404</div>
                                <p class="lead text-gray-800 mb-5">That page doesn't exist</p>
                                <p class="text-gray-500 mb-0">It looks like the page you were looking for has moved or has been deleted!</p>
                                <a href="#">&larr; Back to Dashboard</a>
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
