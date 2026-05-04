<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PIXEL POP - Amministrazione</title>

@vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="admin-shell min-vh-100">
        <div class="container-fluid">
            <div class="row min-vh-100">

                @include('admin.partials.sidebar')

                <main class="admin-main col-12 col-md-9 col-lg-10 px-0">

                    @include('admin.partials.header')

                    <section class="admin-content p-3 p-md-4">
                        @yield('dashboard')
                    </section>
                    @include('admin.partials.footer')
                </main>

            </div>
        </div>
    </div>
</body>
</html>