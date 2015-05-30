<!DOCTYPE html>
<html lang="en" ng-app="PhotoApp" ng-controller="MainCtrl as main">
    @include('layouts.common.head')

    <body>

        @include('layouts.common.navbar')

        <div class="container">
            <div ng-view ng-class="main.viewAnimate()"></div>
        </div><!-- /.container -->

        @include('layouts.common.foot')
    </body>
</html>
