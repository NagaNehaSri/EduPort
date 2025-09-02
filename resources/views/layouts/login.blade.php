</html>
<!DOCTYPE html>
<html lang="en">

<head>
    @php
        $site_settings = \App\Models\Setting::find(1);
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login @if ($site_settings != '')
            {{ $site_settings->site_name }}
        @endif
    </title>
    <link rel="shortcut icon"
        href="@if ($site_settings != '') {{ asset('site_settings') . '/' . $site_settings->favicon }} @endif">


    <link href="{{ asset('admin_assets') . '/css/login.css' }}" rel="stylesheet" type="text/css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


</head>

<body>

        @yield('content')






    @yield('jscode')
</body>

</html>
