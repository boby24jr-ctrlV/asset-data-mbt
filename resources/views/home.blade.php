<!DOCTYPE html>
<html lang="en">

{{-- HEAD --}}
@include('partials.head')

<body>

    <!-- ======= Wrapper ======= -->
    <div id="wrapper">

        {{-- SIDEBAR --}}
        @include('partials.sidebar')

        <!-- ======= Content Wrapper ======= -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- ======= Main Content ======= -->
            <div id="content">

                {{-- HEADER / TOPBAR --}}
                @include('partials.header')

                <!-- ======= Page Content ======= -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- ======= CONTENT MULAI ======= -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <h4>Welcome, {{ auth()->user()->name ?? 'Admin' }}</h4>
                                    <p>
                                        Ini halaman dashboard Laravel yang sudah
                                        <strong>convert dari HTML ke Blade</strong>.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ======= CONTENT SELESAI ======= -->

                </div>
                <!-- End container-fluid -->

            </div>
            <!-- End Main Content -->

            {{-- FOOTER --}}
            @include('partials.footer')

        </div>
        <!-- End Content Wrapper -->

    </div>
    <!-- End Wrapper -->

    {{-- SCRIPTS --}}
    @include('partials.scripts')

</body>
</html>
