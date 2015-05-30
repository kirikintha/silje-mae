<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    <link rel="shortcut icon" href="images/brand/favicon.ico">

    <title>Silje Mae{{{ isset($pageTitle) ? ' - ' . $pageTitle : '' }}}</title>

    <link href="/css/sandstone.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
    @yield('styles')
</head>