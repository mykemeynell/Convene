@extends('layouts.app')

@section('body_class', 'page-top')

@section('content')
    <div id="wrapper" @if(isset($wrapper_classes)) class="{{ $wrapper_classes }}" @endif>

    @if(! isset($show_sidebar) || $show_sidebar === true)
        @include('layouts.components._sidebar')
    @endif

    <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column @if(isset($content_wrapper_classes)) {{ $content_wrapper_classes }} @endif">

            <!-- Main Content -->
            <div id="content">

            @if(! isset($show_topbar) || $show_topbar === true)
                @include('layouts.components._topbar')
            @endif

            <!-- Begin Page Content -->
                <div class="container-fluid">

                    @if(isset($page_title))
                        @include('layouts.components._page-title', ['title' => $page_title])
                    @endif

                    <div class="my-4"></div>

                    @yield('body')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; {{ config('app.name') }} {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
@endsection
