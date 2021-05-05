<script>
	CKEDITOR.replace('description');
	$(document).ready(function () {

        $.fn.modal.Constructor.prototype._enforceFocus = function() {
                var $modalElement = this.$element;
                $(document).on('focusin.modal',function(e) {
                    if ($modalElement.length > 0 && $modalElement[0] !== e.target
                        && !$modalElement.has(e.target).length
                        && $(e.target).parentsUntil('*[role="dialog"]').length === 0) {
                        $modalElement.focus();
                    }
                });
            };


		$('#add').on('show.bs.modal', function (e) {
			var data = $(e.relatedTarget).attr('data-catData');
			var baseUrl = `<?php echo base_url('admin/saveBlogs/');  ?>`;
            var result = '';
			if (data) {
				$('.categoryTitle').html('Edit Blog');
				$('#buttonTitle').html('Save Changes');
				result = JSON.parse(data);
				$("#title").val(result.title)
				$("#keywords").tagsinput('add', result.keywords)
                if(result.image!=null){
                    $("#img1 i").removeClass().addClass('fa fa-file-image-o');
                    $("#img1 i").css({
	    				'color': '#208440'
                    });
                    $("#img1 .title").css({
                        'color': '#208440'
                    });
                    $("#img1").css({
                        'border': ' 2px solid #208440'
                    });
                    $("#img1 .title").text(result.image.slice(0, 4) + '...');
                    $('#oldImage').removeClass('d-none').val(result.image);
                }
                CKEDITOR.instances['description'].setData(result.description);
				$('#blogs').attr('action', baseUrl + 'edit/' + result.id);

			} else {
				$('.categoryTitle').html('Add Blog');
				$('#buttonTitle').html('Save');
				$('#blogs').attr('action', baseUrl + 'add/new');
			}
		})

        $('#add').on('hidden.bs.modal', function () {
            $("#title").val('')
            $("#keywords").tagsinput('removeAll');
            $(".filelabel .title").text('Add Image 720 x 720');
            $(".filelabel i").removeClass().addClass('fas fa-paperclip');
            $(".filelabel, .filelabel i, .filelabel .title").removeAttr( 'style' );
            $('#oldImage').addClass('d-none').val('');
        });

		$(".file1").on('change', function (e) {
			var imgId = $(this).parent().attr('id');
			var labelVal = $(".title").text();
			var oldfileName = $(this).val();
			fileName = e.target.value.split('\\').pop();

			if (oldfileName == fileName) {
				return false;
			}

			if ($(this)[0].files[0].size > 502400) {
				$("#" + imgId + " i").css({
					'color': 'red'
				});
				$("#" + imgId + " .title").css({
					'color': 'red'
				});
				$("#" + imgId + " .title").text('Max size 5 MB');
				return false;
			}

			var extension = fileName.split('.').pop();

			if ($.inArray(extension, ['jpg', 'jpeg', 'png']) >= 0) {
				$("#" + imgId + " i").removeClass().addClass('fa fa-file-image-o');
				$("#" + imgId + " i").css({
					'color': '#208440'
				});
				$("#" + imgId + " .title").css({
					'color': '#208440'
				});
				$("#" + imgId).css({
					'border': ' 2px solid #208440'
				});
			} else {
				$("#" + imgId + " i").removeClass().addClass('fa fa-times');
				$("#" + imgId + " i").css({
					'color': 'red'
				});
				$("#" + imgId + " .title").css({
					'color': 'red'
				});
				$("#" + imgId + " i").css({
					'border': ' 2px solid black'
				});
				$("#" + imgId + " .title").text('Invalid file');
				return false;
			}

			if (fileName) {
				if (fileName.length > 10) {
					$("#" + imgId + " .title").text(fileName.slice(0, 4) + '...' + extension);
				} else {
					$("#" + imgId + " .title").text(fileName);
				}
			} else {
				$("#" + imgId + " .title").text(labelVal);
			}
		});
	});

    
</script>