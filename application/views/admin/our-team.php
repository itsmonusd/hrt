<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card ">
				<div class="card-header">
					<div class="row">
						<div class="col-md-10">
							<h4 class="card-title"> Our Team</h4>
						</div>
						<div class="col-md-2">
							<button type="button" class="btn btn-info" data-catData='' data-toggle="modal"
								data-target="#add">Add</button>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-striped table-bordered responsive nowrap" style="width:100%"
							id="tableData">
							<thead class=" text-primary">
								<tr>
									<th> S.no. </th>
									<th> Name </th>
									<th> Staff Image </th>
									<th> Speciality </th>
									<th> Social Media Url </th>
									<th> CreatedAt </th>
									<th> Status </th>
									<th class="text-center"> Action </th>
								</tr>
							</thead>
							<tbody>
								<?php
                                if(!empty($data))
                                {
                                    $i=1;
								foreach ($data as $team) {
								?>
								<tr>
									<td>
										<?php echo $i++; ?>
									</td>
									<td>
										<?php echo $team->name; ?>
									</td>
                                    <td>
										<img data-enlargeable style="cursor: zoom-in;object-fit:cover;height:100px;width:100px;" src="<?php echo $team->staffImage !=null ? base_url('assets/uploads/teams/').$team->staffImage : base_url('assets/uploads/uploads.png') ?>" alt="team image" srcset="">
									</td>
									<td>
										<?php echo $team->speciality; ?>
									</td>
									<td>
										<a href="<?php echo $team->socialMediaLink ?>" target="blank"><i class="fas fa-link"></i></a>
									</td>
									<td>
										<?php echo $team->createdAt; ?>
									<td>
										<?php $status = $team->status ? 0 : 1; ?>
										<a
											href="<?php echo base_url('common/changeStatus/ourteam/').$team->id.'/'.$status ?>"><?php echo $team->status ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger" ></i>'; ?></a>
									</td>
									<td class="text-center">
										<a data-toggle="modal" data-catData='<?php echo json_encode($team); ?>'
											data-target="#add">
											<i class="fas fa-edit" style="padding-right: 50px; color:darkgreen"></i></a>
										<a href='<?php echo base_url('common/deletedata/ourteam/').$team->id ?>'><i
												class="fa fa-trash text-danger" aria-hidden="true"></i></a>
									</td>
								</tr>
								<?php }
                                } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title teamTitle" id="teamTitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id='ourTeam' action=" <?php echo base_url('admin/saveOurTeam/add/new'); ?>" method="post"  enctype="multipart/form-data" >
					<div class="form-group">
						<label for="name">Name  <span class="text-danger">*</span> </label>
						<input type="text " class="form-control" id="name" name="name" placeholder="Enter name here" required>
					</div>
					<div class="form-group">
						<label for="speciality">Speciality <span class="text-danger">*</span> </label>
						<input type="text " class="form-control" id="speciality" name="speciality"
							placeholder="Enter Speciality here" data-role="tagsinput" >
					</div>
					<div class="form-group">
						<label class="filelabel add-image" id="img1">
							<i class="fas fa-paperclip"></i>
							<span class="title">
								Staff Image 720 x 720
							</span>
							<input class="FileUpload1 file1" id="file" name="file" type="file" />
						</label>
					</div>
                    <input class="d-none" type="hidden" name="oldImage" id="oldImage">
                    <div class="form-group">
						<label for="socialMediaLink">Socail Media Link </label>
						<input type="url" name="socialMediaLink" id="socialMediaLink" class="form-control" placeholder="https://example.com" pattern="https://.*" size="30" >
					</div>
					<div class="form group">
						<button type="submit" name="submit" id="buttonTitle" class="btn btn-info"></button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>

<script>
	$(document).ready(function () {

        // add tagsinput validation 
        $("#ourTeam").submit(function(){
            if($('#speciality').val()==''){
                $('#speciality').parent().find('.bootstrap-tagsinput').addClass('border-red');
                return false;
            }else{
                $('#speciality').parent().find('.bootstrap-tagsinput').removeClass('border-red');
                return true
            }
        });

		$('#add').on('show.bs.modal', function (e) {
			var data = $(e.relatedTarget).attr('data-catData');
			var baseUrl = `<?php echo base_url('admin/saveourteam/');  ?>`;
            var result = '';
			if (data) {
				$('.teamTitle').html('Edit Our Team');
				$('#buttonTitle').html('Save Changes');
				result = JSON.parse(data);
				$("#name").val(result.name)
				$("#speciality").tagsinput('add', result.speciality)
                if(result.staffImage!=null){
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
                    $("#img1 .title").text(result.staffImage.slice(0, 4) + '...');
                    $('#oldImage').removeClass('d-none').val(result.staffImage);
                }
				$("#socialMediaLink").val(result.socialMediaLink)
				$('#ourTeam').attr('action', baseUrl + 'edit/' + result.id);

			} else {
				$('.teamTitle').html('Add Our Team');
				$('#buttonTitle').html('Save');
				$('#ourTeam').attr('action', baseUrl + 'add/new');
			}
		})

        $('#add').on('hidden.bs.modal', function () {
            $("#name").val('')
            $("#speciality").tagsinput('removeAll');
            $("#socialMediaLink").val('')
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