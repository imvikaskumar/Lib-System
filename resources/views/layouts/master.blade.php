<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Admin | Theme</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    @include('includes.head')
</head>

<body>
    <div id="wrapper">
        @include('includes.header')
        @include('includes.sidebar')
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    @include('includes.settings')
                    @yield('content')
                </div>
            </div>
        </div>
        @include('includes.footer')
        @include('includes.footer-script')
    </div>
    @include('includes.flash')
</body>

</html>