	
	<footer class="footer">
            Designed & Developed BY <a href="<?php echo base_url();?>">PWOG</a>
        </footer>
    </div>
	
    
    <script src="<?php echo base_url();?>assets_admin/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="<?php echo base_url();?>assets_admin/assets/node_modules/popper/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets_admin/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url();?>assets_admin/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url();?>assets_admin/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url();?>assets_admin/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url();?>assets_admin/dist/js/custom.min.js"></script>
    <!--morris JavaScript -->
    <script src="<?php echo base_url();?>assets_admin/assets/node_modules/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url();?>assets_admin/assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="<?php echo base_url();?>assets_admin/assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Popup message jquery -->
    <script src="<?php echo base_url();?>assets_admin/assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- Chart JS -->
    <script src="<?php echo base_url();?>assets_admin/assets/node_modules/toast-master/js/jquery.toast.js"></script>
	<!--This page plugins -->
    <script src="<?php echo base_url();?>assets_admin/assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets_admin/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="<?php echo base_url();?>assets_admin/cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>assets_admin/cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>assets_admin/cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="<?php echo base_url();?>assets_admin/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>assets_admin/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>assets_admin/cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>assets_admin/cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url();?>assets_admin/dist/js/pages/jquery.PrintArea.js" type="text/JavaScript"></script>
    <script src="<?php echo base_url();?>assets_admin/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
	<script src="<?php echo base_url();?>assets_admin/node_modules/moment/moment.js"></script>
    <script src="<?php echo base_url();?>assets_admin/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets_admin/node_modules/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets_admin/node_modules/jquery-asColor/dist/jquery-asColor.js"></script>
    <script src="<?php echo base_url();?>assets_admin/node_modules/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="<?php echo base_url();?>assets_admin/node_modules/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets_admin/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets_admin/node_modules/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets_admin/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script>
            $(document).ready(function() {
                $("#print").click(function() {
                    var mode = 'iframe'; //popup
                    var close = mode == "popup";
                    var options = {
                        mode: mode,
                        popClose: close
                    };
                    $("div.printableArea").printArea(options);
                });
            });
        </script>
	<script>
        $(function () {
            $('#myTable').DataTable();
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
            // responsive table
            $('#config-table').DataTable({
                responsive: true
            });
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
        });

    </script>
    <script>
        // MAterial Date picker    
        $('#mdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
        $('#timepicker').bootstrapMaterialDatePicker({ format: 'HH:mm', time: true, date: false });
        $('#date-format').bootstrapMaterialDatePicker({ format: 'dddd DD MMMM YYYY - HH:mm' });
    
        $('#min-date').bootstrapMaterialDatePicker({ format: 'DD/MM/YYYY HH:mm', minDate: new Date() });
        // Clock pickers
        $('#single-input').clockpicker({
            placement: 'bottom',
            align: 'left',
            autoclose: true,
            'default': 'now'
        });
        $('.clockpicker').clockpicker({
            donetext: 'Done',
        }).find('input').change(function() {
            console.log(this.value);
        });
        $('#check-minutes').click(function(e) {
            // Have to stop propagation here
            e.stopPropagation();
            input.clockpicker('show').clockpicker('toggleView', 'minutes');
        });
        if (/mobile/i.test(navigator.userAgent)) {
            $('input').prop('readOnly', true);
        }
        // Colorpicker
        $(".colorpicker").asColorPicker();
        $(".complex-colorpicker").asColorPicker({
            mode: 'complex'
        });
        $(".gradient-colorpicker").asColorPicker({
            mode: 'gradient'
        });
        // Date Picker
        jQuery('.mydatepicker, #datepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        jQuery('#date-range').datepicker({
            toggleActive: true
        });
        jQuery('#datepicker-inline').datepicker({
            todayHighlight: true
        });
        // -------------------------------
    	// Start Date Range Picker
    	// -------------------------------
    
        // Basic Date Range Picker
        $('.daterange').daterangepicker();
    
        // Date & Time
        $('.datetime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY h:mm A'
            }
        });
    
        //Calendars are not linked
        $('.timeseconds').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            timePicker24Hour: true,
            timePickerSeconds: true,
            locale: {
                format: 'MM-DD-YYYY h:mm:ss'
            }
        });
    
        // Single Date Range Picker
        $('.singledate').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true
        });
    
        // Auto Apply Date Range
        $('.autoapply').daterangepicker({
            autoApply: true,
        });
    
        // Calendars are not linked
        $('.linkedCalendars').daterangepicker({
            linkedCalendars: false,
        });
    
        // Date Limit
        $('.dateLimit').daterangepicker({
            dateLimit: {
                days: 7
            },
        });
    
        // Show Dropdowns
        $('.showdropdowns').daterangepicker({
            showDropdowns: true,
        });
    
        // Show Week Numbers
        $('.showweeknumbers').daterangepicker({
            showWeekNumbers: true,
        });
    
         $('.dateranges').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        });
    
        // Always Show Calendar on Ranges
        $('.shawCalRanges').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            alwaysShowCalendars: true,
        });
    
        // Top of the form-control open alignment
        $('.drops').daterangepicker({
            drops: "up" // up/down
        });
    
        // Custom button options
        $('.buttonClass').daterangepicker({
            drops: "up",
            buttonClasses: "btn",
            applyClass: "btn-info",
            cancelClass: "btn-danger"
        });
    
    	jQuery('#date-range').datepicker({
            toggleActive: true
        });
        jQuery('#datepicker-inline').datepicker({
            todayHighlight: true
        });
    
        // Daterange picker
        $('.input-daterange-datepicker').daterangepicker({
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-danger',
            cancelClass: 'btn-inverse'
        });
        $('.input-daterange-timepicker').daterangepicker({
            timePicker: true,
            format: 'MM/DD/YYYY h:mm A',
            timePickerIncrement: 30,
            timePicker12Hour: true,
            timePickerSeconds: false,
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-danger',
            cancelClass: 'btn-inverse'
        });
        $('.input-limit-datepicker').daterangepicker({
            format: 'MM/DD/YYYY',
            minDate: '06/01/2015',
            maxDate: '06/30/2015',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-danger',
            cancelClass: 'btn-inverse',
            dateLimit: {
                days: 6
            }
        });
    </script>
	<script>
		$(document).ready(function(){
			msg();
		});
		function msg(){
			$(".alert").show();
			setTimeout(function() { $(".alert").hide(); }, 3000);
		}
	</script>
</body>
</html>