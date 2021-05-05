<script src="<?php echo base_url('assets/js/core/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/core/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/ckeditor/') ?>ckeditor.js" type="text/javascript"></script>
<script src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<!--  Google Maps Plugin    -->
<!-- Place this tag in your head or just before your close body tag. -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
<!-- Chart JS -->
<script src="<?php echo base_url('assets/js/plugins/chartjs.min.js')?>"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js')?>"></script>
<!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->

<script src="<?php echo base_url('assets/js/datatable/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/datatable/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/datatable/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/datatable/responsive.bootstrap4.min.js') ?>"></script>


<script src="<?php echo base_url('assets/js/sweetalert2.js') ?>"></script>
<script src="<?php echo base_url('assets/js/toastr/toastr.js') ?>"></script>
<script src="<?php echo base_url('assets/demo/demo.js')?>"></script>


<script>
	$(document).ready(function () {
		$('#tableData').DataTable({
			responsive: {
				details: {
					renderer: function (api, rowIdx, columns) {
						var data = $.map(columns, function (col, i) {
							return col.hidden ?
								'<tr data-dt-row="' + col.rowIndex + '" data-dt-column="' + col
								.columnIndex + '">' +
								'<td>' + col.title + ':' + '</td> ' +
								'<td>' + col.data + '</td>' +
								'</tr>' :
								'';
						}).join('');

						return data ?
							$('<table/>').append(data) :
							false;
					}
				}
			}
		});


		setTimeout(function () {
			$('.hiddenalert').fadeOut();
		}, 3000);

		$(document).on('click', 'img[data-enlargeable]', function () {
			$(this).addClass('img-enlargeable');
			console.log('abc');
			var src = $(this).attr('src');
			var modal;

			function removeModal() {
				modal.remove();
				$('body').off('keyup.modal-close');
			}
			modal = $('<div>').css({
				background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
				backgroundSize: 'contain',
				width: '100%',
				height: '100%',
				position: 'fixed',
				zIndex: '10000',
				top: '0',
				left: '0',
				cursor: 'zoom-out'
			}).click(function () {
				removeModal();
			}).appendTo('body');
			//handling ESC
			$('body').on('keyup.modal-close', function (e) {
				if (e.key === 'Escape') {
					removeModal();
				}
			});
		});

	});
</script>

</body>

</html>