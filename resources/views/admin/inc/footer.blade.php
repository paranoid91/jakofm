</div> <!-- END container -->
</div> <!-- END wrapper -->
<script type="text/javascript" src="{{asset('admin/js/functions.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/menu/jquery.domenu-0.48.53.js')}}"></script>
<script type="text/javascript" src="{{asset('lib/TabStylesInspiration/js/cbpFWTabs.js')}}"></script>
@yield('js')
<script>
    (function() {

        [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
            new CBPFWTabs( el );
        });

        $('.hide-me-item').closest('a').hide();

    })();
</script>
</body>
</html>