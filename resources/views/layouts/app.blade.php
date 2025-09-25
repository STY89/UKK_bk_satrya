<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.header')
</head>
<body>
    @include('layouts.partials.navbar')

    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                @include('layouts.partials.sidebar')
            </div>
            <div class="col-10">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    @include('layouts.partials.footer')
</body>
</html>
