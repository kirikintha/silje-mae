<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    <link rel="shortcut icon" href="images/brand/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Bungee+Shade" rel="stylesheet">

    <title>Silje Mae{{{ isset($pageTitle) ? ' - ' . $pageTitle : '' }}}</title>

    @yield('styles')
</head>