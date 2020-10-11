<script>
    var resizefunc = [];
</script>
{{-- jQuery --}}
{{-- <script src="{{ asset('material')}}/assets/js/jquery.min.js"></script> --}}
<script src="{{ asset('custom/jquery')}}/dist/jquery.min.js"></script>
<script src="{{ asset('custom/popperJs')}}/dist/umd/popper.min.js"></script> {{-- Popper for Bootstrap --}}
<script src="{{ asset('custom/bootstrap4')}}/dist/js/bootstrap.min.js"></script>
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
<script src="{{ asset('custom/morris')}}/morris.min.js"></script>
<script src="{{ asset('material')}}/plugins/counterup/jquery.counterup.min.js"></script>
<script src="{{ asset('material')}}/plugins/raphael/raphael-min.js"></script>
<script src="{{ asset('material')}}/plugins/jquery-knob/jquery.knob.js"></script>
<script src="{{ asset('custom/jquery-dashboard')}}/dist/jquery.dashboard.core.min.js"></script>
<script src="{{ asset('material')}}/plugins/bootstrap-table/js/bootstrap-table.js"></script>
<script src="{{ asset('material')}}/assets/pages/jquery.bs-table.js"></script>

{{-- Required datatable js --}}
<script src="{{ asset('material')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('material')}}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
{{-- Buttons examples --}}
<script src="{{ asset('material')}}/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="{{ asset('material')}}/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('material')}}/plugins/datatables/jszip.min.js"></script>
<script src="{{ asset('material')}}/plugins/datatables/vfs_fonts.js"></script>
<script src="{{ asset('material')}}/plugins/datatables/buttons.html5.min.js"></script>
<script src="{{ asset('material')}}/plugins/datatables/buttons.print.min.js"></script>
{{-- Key Tables --}}
<script src="{{ asset('material')}}/plugins/datatables/dataTables.keyTable.min.js"></script>
{{-- Responsive examples --}}
<script src="{{ asset('material')}}/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="{{ asset('material')}}/plugins/datatables/responsive.bootstrap4.min.js"></script>
{{-- Selection table --}}
<script src="{{ asset('material')}}/plugins/datatables/dataTables.select.min.js"></script>
{{-- jQuery --}}
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
@stack('script')
