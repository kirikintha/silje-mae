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

@yield('scripts')