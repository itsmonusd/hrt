<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="title">Itineray</h5>
				</div>
				<div class="card-body">
					<form id="settingForm" enctype="multipart/form-data" method="POST"
						action="<?php echo base_url('admin/saveitinerary'); ?>">

						<div class="row">
							<div class="col-md-3 pr-md-1">
								<div class="form-group">
									<label>Category <span class="text-danger">*</span> </label>
									<select name="category[]" id="category" class="form-control" multiple required>
										<?php foreach ($category as $catData) { ?>
											<option value="<?php echo $catData->id; ?>"><?php echo $catData->categoryName; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-2 d-flex justify-content-center align-items-center pr-md-1">
								<div class="form-group">
									<label class="filelabel add-image" id="img1">
										<i class="fas fa-paperclip"></i>
										<span class="title">
											Cover Image 400 x 500
										</span>
										<input class="FileUpload1 file1" name="coverImage" type="file" />
										<input type="hidden" name="oldCoverImage"
											value="<?php echo !empty($data[0]->logo) ? $data[0]->logo : '' ?>">
									</label>
								</div>
							</div>
							<div class="col-md-2 d-flex justify-content-center align-items-center px-md-1">
								<div class="form-group">
									<label class="filelabel add-image" id="img2">
										<i class="fas fa-paperclip"></i>
										<span class="title">
											Banner Image 1 1200 x 720
										</span>
										<input class="FileUpload1 file1" name="bannerSlider1" type="file" />
										<input type="hidden" name="oldBannerSlider1"
											value="<?php echo !empty($data[0]->bannerSlider1) ? $data[0]->bannerSlider1 : '' ?>">
									</label>
								</div>
							</div>
							<div class="col-md-2 d-flex justify-content-center align-items-center px-md-1">
								<div class="form-group">
									<label class="filelabel add-image" id="img3">
										<i class="fas fa-paperclip"></i>
										<span class="title">
											Banner Image 2 1200 x 720
										</span>
										<input class="FileUpload1 file1" name="bannerSlider2" type="file" />
										<input type="hidden" name="oldBannerSlider2"
											value="<?php echo !empty($data[0]->bannerSlider2) ? $data[0]->bannerSlider2 : '' ?>">
									</label>
								</div>
							</div>
							<div class="col-md-2 d-flex justify-content-center align-items-center pl-md-1">
								<div class="form-group">
									<label class="filelabel add-image" id="img4">
										<i class="fas fa-paperclip"></i>
										<span class="title">
											Banner Image 3 1200 x 720
										</span>
										<input class="FileUpload1 file1" name="bannerSlider3" type="file" />
										<input type="hidden" name="oldBannerSlider3"
											value="<?php echo !empty($data[0]->bannerSlider3) ? $data[0]->bannerSlider3 : '' ?>">
									</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 pr-md-1 ">
								<div class="form-group">
									<label>Title <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="title"
										placeholder="Enter Itineray Title"
										value="<?php echo !empty($data[0]->phone) ? $data[0]->phone : '' ?>" required>
								</div>
							</div>

							<div class="col-md-4 px-md-1 ">
								<div class="form-group">
									<label>Short Description <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="description"
										placeholder="Enter itineray short description"
										value="<?php echo !empty($data[0]->phone) ? $data[0]->phone : '' ?>" required>
								</div>
							</div>

							<div class="col-md-4 pl-md-1">
								<div class="form-group">
									<label for="price">Price <span class="text-danger">*</span></label>
									<input type="text " class="form-control" id="price" name="price"
										placeholder="Enter price here" required>
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-md-4 pr-md-1">
								<div class="form-group">
									<label for="duration">Duration <span class="text-danger">*</span></label>
									<input type="text " class="form-control" id="duration" name="duration"
										placeholder="Enter duration here" required>
								</div>
							</div>

							<div class="col-md-4 px-md-1">
								<div class="form-group">
									<label for="places">Places</label>
									<input type="text " class="form-control" id="places" name="places"
										placeholder="Enter Places here (Press Enter for sepration)"
										data-role="tagsinput">
								</div>
							</div>

							<div class="col-md-4 pl-md-1">
								<div class="form-group">
									<label for="keywords">Keywords</label>
									<input type="text " class="form-control" id="keywords" name="keywords"
										placeholder="Enter keywords here (Press Enter for sepration)"
										data-role="tagsinput">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="dayDescription">Day Description </label>
									<textarea name="dayDescription" id="dayDescription" cols="30" rows="10"
										class="ckeditor form-control" data-error-container="#editor2_error"
										required></textarea>
									<div id="editor2_error"> </div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="inclusion">Inclusion</label>
									<input type="text " class="form-control" id="inclusion" name="inclusion"
										placeholder="Enter inclusion here (Press Enter for sepration)"
										data-role="tagsinput">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="exclusion">Exclusion</label>
									<input type="text " class="form-control" id="exclusion" name="exclusion"
										placeholder="Enter exclusion here (Press Enter for sepration)"
										data-role="tagsinput">
								</div>
							</div>
						</div>
						<hr class="my-4">
							<div class="hightlight-wrapper-block">
								<div class="col-md-12 parent-block">
									<div class="row hightlight-row">
										<div class="col-md-1">
											<h5 class="title">Highlights</h5>
										</div>
										<div class="col-md-5">
											<span class="limit-reach text-danger"></span>
										</div>
										<div class="col-md-6">
											<a href="javascript:void(0);" class="dynamicBtn add_button float-right" title="Add highlight"><i class="fas fa-plus"></i></a>
										</div>
									</div>
									<div class="row">
										<div class="col-md-5 pr-md-1">
											<div class="form-group">
												<label for="highlightTitle">Title</label>
												<input type="text " class="form-control highlightTitle" id="highlightTitle" name="highlightTitle[]"
													placeholder="Enter highligh title here">
											</div>
										</div>

										<div class="col-md-2 d-flex justify-content-center align-items-center pr-md-1">
											<div class="form-group">
												<label class="filelabel add-image" id="img5">
													<i class="fas fa-paperclip"></i>
													<span class="title">
														Choose Image 200 x 300
													</span>
													<input class="FileUpload1 file1" name="highlightImg[]"  type="file" />
													<input type="hidden" name="oldLogo"
														value="<?php echo !empty($data[0]->logo) ? $data[0]->logo : '' ?>">
												</label>
											</div>
										</div>

										<div class="col-md-4 pr-md-1">
											<div class="form-group">
												<label for="highlightDescription">Short Description</label>
												<input type="text " class="form-control highlightDescription" id="highlightDescription"
													name="highlightDescription[]" placeholder="Enter highligh description here">
											</div>
										</div>
									</div>
								</div>
							</div>
						
						<hr class="my-4" />
						<div class="form group">
							<input type="hidden" name="id"
								value="<?php echo !empty($data[0]->id) ? $data[0]->id : '' ?>">
							<button type="submit" name="submit" id="buttonTitle" class="btn btn-info">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>

<script>
	$(document).ready(function () {
		$(document).on('change',".file1", function (e) {
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

		

		//================================= Append input feilds=========================

		var maxField = 5; //Input fields increment limitation
		var x = 1; //Initial field counter is 1
		var imgCounter = 6;

		//Once add button is clicked
		$(document).on('click','.add_button',function () {
			
			var addButton = $('.add_button'); //Add button selector
			var wrapper = $('.hightlight-wrapper-block'); //Input field wrapper
			
			// check if value is not equal to 0 so add one more
			if (($('.highlightTitle').last().val()!='') && ($('.highlightDescription').last().val()!=''))
			{
				//Check maximum number of input fields
				if (x < maxField) {
					x++; //Increment field counter
					imgCounter++;
					$(wrapper).append(`<div class="col-md-12 child-block">
								<div class="row hightlight-row">
									<div class="col-md-6">
										<h5 class="title">Highlights ${x}</h5>
									</div>
									<div class="col-md-6">
										<a href="javascript:void(0);" class="dynamicBtn remove_button float-right" title="remove highlight"><i class="fas fa-minus"></i></a>
									</div>
								</div>
								<div class="row">
									<div class="col-md-5 pr-md-1">
										<div class="form-group">
											<label for="highlightTitle">Title</label>
											<input type="text " class="form-control highlightTitle" id="highlightTitle" name="highlightTitle[]"
												placeholder="Enter highligh title here">
										</div>
									</div>

									<div class="col-md-2 d-flex justify-content-center align-items-center pr-md-1">
										<div class="form-group">
											<label class="filelabel add-image" id="img${imgCounter}">
												<i class="fas fa-paperclip"></i>
												<span class="title">
													Choose Image 200 x 300
												</span>
												<input class="FileUpload1 file1" name="highlightImg[]" type="file" />
												<input type="hidden" name="oldLogo"
													value="">
											</label>
										</div>
									</div>

									<div class="col-md-4 pr-md-1">
										<div class="form-group">
											<label for="highlightDescription">Short Description</label>
											<input type="text " class="form-control highlightDescription" id="highlightDescription"
												name="highlightDescription[]" placeholder="Enter highligh description here">
										</div>
									</div>
								</div>
							</div>`);
				}else{
					$('.limit-reach').append('limit reached');
				}
			}
			else
			{
				alert('Before Continue, please fill highlight feilds first');
			}

		});

		$(document).on('click', '.remove_button', function (e) {
			e.preventDefault();
			$(this).parent().parent().parent('div').remove(); //Remove field html
			x--; //Decrement field counter
    	});
	});
</script>