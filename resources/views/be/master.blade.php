<!DOCTYPE html>
<html lang="en">
<head>
    @include('be-partials.head')
</head>

<body style="min-height:100vh; display:flex; flex-direction:column;">

    {{-- Sidebar --}}
    @include('back-end.sidebar')

    {{-- Navbar --}}
    @include('back-end.navbar')

    <!-- Main Content Wrapper -->
    <div class="main-wrapper" id="mainWrapper" style="flex:1; display:flex; flex-direction:column;">
        @include('be-partials.header')

        <!-- Main Content -->
        <main class="dashboard-content" id="main-content" style="flex:1;">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>

        {{-- Footer --}}
        @include('be-partials.footer')
    </div>

    {{-- Scripts --}}
    @include('be-partials.scripts')

</body>
</html>
