<footer>
    <div class="text-center">
        <p>&copy; 2014 - {{ date('Y', strtotime('now')) }} | All Rights Reserved | Please do not share Silje's Images on the internet!</p>
    </div>
</footer>
<!--App Javascript-->
<script type="text/javascript">
    //<![CDATA[ 
    var App = {{ isset($jsSettings) ? $jsSettings : '{}' }}
    //]]>
</script>
<script src="/js/vendor/jquery.min.js"></script>
<script src="/js/vendor/bootstrap.min.js" ></script>
<script src="/js/vendor/angular.min.js"></script>
<script src="/js/vendor/angular-animate.min.js"></script>
<script src="/js/vendor/angular-resource.min.js"></script>
<script src="/js/vendor/angular-route.min.js"></script>
<script src="/js/vendor/dotjem-angular-tree.min.js"></script>
<script src="/js/vendor/ng-lodash.min.js"></script>
@yield('scripts')
<script src="/js/app.js"></script> <!-- load our application last -->