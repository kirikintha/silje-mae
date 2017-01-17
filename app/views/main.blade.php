@extends('layouts.common.html')

@section('styles')

<link href="/css/paper.bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css"> <!-- load fontawesome -->
<link href="//vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">
<link href="/css/video-styles.css" rel="stylesheet">
<link rel="stylesheet" href="/lib/slick.css">
<link rel="stylesheet" href="/lib/slick-theme.css">
<link href="/css/animate.css" rel="stylesheet">
<link href="/css/animations.css" rel="stylesheet">
<link href="/css/styles.css" rel="stylesheet">

@stop

@section('scripts')

<!--NG Dependencies-->
<script src="//vjs.zencdn.net/4.12/video.js"></script>
<script src="/lib/jquery.min.js"></script>
<script src="/lib/bootstrap.min.js" ></script>
<script src="/lib/angular.min.js"></script>
<script src="/lib/angular-animate.min.js"></script>
<script src="/lib/angular-resource.min.js"></script>
<script src="/lib/angular-route.min.js"></script>
<script src="/lib/dotjem-angular-tree.min.js"></script>
<script src="/lib/ng-lodash.min.js"></script>
<script src="/lib/slick.min.js"></script>
<script src="/lib/slick.js"></script>
<!--NG App-->
@foreach($assets as $asset)
<script src="{{ $asset }}"></script>
@endforeach

@stop