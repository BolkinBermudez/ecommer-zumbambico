<footer class="main-footer">
	<div class="float-right d-none d-sm-block">
		<b>2022</b>
	</div>
	<strong>Copyright &copy; <a href="#">Zumbambico</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="Admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="Admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="Admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="Admin/dist/js/demo.js"></script>

<script src="Admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="Admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="Admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="Admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="Admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="Admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="Admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="Admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="Admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="Admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="Admin/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
	$(function() {
		$("#example1").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		
	});
</script>
<script>
	$(document).ready(function(){
		$(".borrar").click(function(e){
			e.preventDefault();
			var res= confirm("¿Desea Borrar el usuarío?");
			if(res==true){
				var link=$(this).attr("href");
				window.location=link;
			}
		});
	});
</script>
</body>

</html>