<script>
    var resizefunc = [];
</script>
{{-- jQuery --}}
<script src="{{ asset('material')}}/assets/js/jquery.min.js"></script>
<script src="{{ asset('material')}}/assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
<script src="{{ asset('material')}}/assets/js/bootstrap.min.js"></script>
<script src="{{ asset('material')}}/assets/js/detect.js"></script>
<script src="{{ asset('material')}}/assets/js/fastclick.js"></script>
<script src="{{ asset('material')}}/assets/js/jquery.slimscroll.js"></script>
<script src="{{ asset('material')}}/assets/js/jquery.blockUI.js"></script>
<script src="{{ asset('material')}}/assets/js/waves.js"></script>
<script src="{{ asset('material')}}/assets/js/wow.min.js"></script>
<script src="{{ asset('material')}}/assets/js/jquery.nicescroll.js"></script>
<script src="{{ asset('material')}}/assets/js/jquery.scrollTo.min.js"></script>
<script src="{{ asset('material')}}/plugins/peity/jquery.peity.min.js"></script>
<script src="{{ asset('material')}}/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="{{ asset('material')}}/plugins/counterup/jquery.counterup.min.js"></script>
<script src="{{ asset('material')}}/plugins/morris/morris.min.js"></script>
<script src="{{ asset('material')}}/plugins/raphael/raphael-min.js"></script>
<script src="{{ asset('material')}}/plugins/jquery-knob/jquery.knob.js"></script>
<script src="{{ asset('material')}}/assets/pages/jquery.dashboard.js"></script>
<script src="{{ asset('material')}}/assets/js/jquery.core.js"></script>
<script src="{{ asset('material')}}/assets/js/jquery.app.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
        $(".knob").knob();
    });
</script>
{{-- Custom Script --}}
@yield('script')
