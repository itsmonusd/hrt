<div class="content">

	<div class="row">
		<div class="col-md-12">
			<div class="card">



				<!-- <div class="card-header">
					<div class="row">
						<div class="col-md-10">
							<h5 class="title">Basic Settings</h5>
						</div>
						<div class="col-md-2">
							<a class="btn btn-sm btn-info text-white">Policies</a>
						</div>
					</div>

				</div> -->

				<div class="card-body">
					<section id="tabs" class="project-tab">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<nav id="myTab">
										<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
											<a class="nav-item nav-link active" id="basic-tab" data-toggle="tab"
												href="#basic" role="tab" aria-controls="basic"
												aria-selected="true">Basic</a>
											<a class="nav-item nav-link" id="terms-tab" data-toggle="tab"
												href="#terms" role="tab" aria-controls="terms"
												aria-selected="false">Terms & Condition</a>
											<a class="nav-item nav-link" id="privacy-tab" data-toggle="tab"
												href="#privacy" role="tab" aria-controls="privacy"
												aria-selected="false">Privacy Policy</a>
											<a class="nav-item nav-link" id="cancel-tab" data-toggle="tab"
												href="#cancel" role="tab" aria-controls="cancel"
												aria-selected="false">Cancellation Policy</a>
											<a class="nav-item nav-link" id="covid-tab" data-toggle="tab"
												href="#covid" role="tab" aria-controls="covid"
												aria-selected="false">Covid Policy</a>
										</div>
									</nav>
									<div class="tab-content py-4" id="nav-tabContent" >
										<div class="tab-pane fade show active" id="basic" role="tabpanel"
											aria-labelledby="basic-tab">
											<form id="settingForm" enctype="multipart/form-data" method="POST"
												action="<?php echo base_url('admin/saveSettings'); ?>">

												<div class="row">
													<div class="col-md-5 pr-md-1">
														<div class="form-group">
															<label>Company Name</label>
															<input type="text" class="form-control" name="companyName"
																placeholder="Company Name"
																value="<?php echo !empty($data[0]->companyName) ? $data[0]->companyName : '' ?>">
														</div>
													</div>
													<div class="col-md-3 px-md-1">
														<div class="form-group">
															<label>Phone</label>
															<input type="text" class="form-control" name="phone"
																placeholder="99xxxxxx01"
																value="<?php echo !empty($data[0]->phone) ? $data[0]->phone : '' ?>">
														</div>
													</div>
													<div class="col-md-4 pl-md-1">
														<div class="form-group">
															<label for="exampleInputEmail1">Email address</label>
															<input type="email" class="form-control" name="email"
																placeholder="example@gmail.com"
																value="<?php echo !empty($data[0]->email) ? $data[0]->email : '' ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label>Address</label>
															<input type="text" class="form-control" name="address"
																placeholder="Office Address"
																value="<?php echo !empty($data[0]->address) ? $data[0]->address : '' ?>">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label>Google Address Link</label>
															<input type="text" class="form-control"
																name="googleAddressLink" placeholder="Google Address"
																value="<?php echo !empty($data[0]->googleAddressLink) ? $data[0]->googleAddressLink : '' ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-3 d-flex justify-content-center pr-md-1">
														<div class="form-group">
															<label class="filelabel add-image" id="img1">
																<i class="fas fa-paperclip"></i>
																<span class="title">
																	Logo Image 720 x 720
																</span>
																<input class="FileUpload1 file1" name="logo"
																	type="file" />
																<input type="hidden" name="oldLogo"
																	value="<?php echo !empty($data[0]->logo) ? $data[0]->logo : '' ?>">
															</label>
														</div>
													</div>
													<div class="col-md-3 d-flex justify-content-center px-md-1">
														<div class="form-group">
															<label class="filelabel add-image" id="img2">
																<i class="fas fa-paperclip"></i>
																<span class="title">
																	Slider 1 Image 720 x 720
																</span>
																<input class="FileUpload1 file1" name="bannerSlider1"
																	type="file" />
																<input type="hidden" name="oldBannerSlider1"
																	value="<?php echo !empty($data[0]->bannerSlider1) ? $data[0]->bannerSlider1 : '' ?>">
															</label>
														</div>
													</div>
													<div class="col-md-3 d-flex justify-content-center px-md-1">
														<div class="form-group">
															<label class="filelabel add-image" id="img3">
																<i class="fas fa-paperclip"></i>
																<span class="title">
																	Slider 2 Image 720 x 720
																</span>
																<input class="FileUpload1 file1" name="bannerSlider2"
																	type="file" />
																<input type="hidden" name="oldBannerSlider2"
																	value="<?php echo !empty($data[0]->bannerSlider2) ? $data[0]->bannerSlider2 : '' ?>">
															</label>
														</div>
													</div>
													<div class="col-md-3 d-flex justify-content-center pl-md-1">
														<div class="form-group">
															<label class="filelabel add-image" id="img4">
																<i class="fas fa-paperclip"></i>
																<span class="title">
																	Slider 3 Image 720 x 720
																</span>
																<input class="FileUpload1 file1" name="bannerSlider3"
																	type="file" />
																<input type="hidden" name="oldBannerSlider3"
																	value="<?php echo !empty($data[0]->bannerSlider3) ? $data[0]->bannerSlider3 : '' ?>">
															</label>
														</div>
													</div>
												</div>
												<hr class="my-4" />
												<h5 class="title">Social Media's</h5>
												<div class="row">
													<div class="col-md-4 pr-md-1">
														<div class="form-group">
															<label>Facebook</label>
															<input type="url" class="form-control" name="facebook"
																placeholder="https://www.facebook.com/example"
																pattern="https://.*"
																value="<?php echo !empty($data[0]->facebook) ? $data[0]->facebook : '' ?>">
														</div>
													</div>
													<div class="col-md-4 px-md-1">
														<div class="form-group">
															<label>Instagram</label>
															<input type="url" class="form-control" name="insta"
																placeholder="https://www.instagram.com/example"
																pattern="https://.*"
																value="<?php echo !empty($data[0]->insta) ? $data[0]->insta : '' ?>">
														</div>
													</div>
													<div class="col-md-4 pl-md-1">
														<div class="form-group">
															<label>Twitter</label>
															<input type="url" class="form-control" name="twitter"
																placeholder="https://twitter.com/example"
																pattern="https://.*"
																value="<?php echo !empty($data[0]->twitter) ? $data[0]->twitter : '' ?>">
														</div>
													</div>
												</div>
												<div class="form group">
													<input type="hidden" name="id"
														value="<?php echo !empty($data[0]->id) ? $data[0]->id : '' ?>">
													<button type="submit" name="submit" id="buttonTitle"
														class="btn btn-info">Save</button>
												</div>
											</form>
										</div>
										<div class="tab-pane fade" id="terms" role="tabpanel"
											aria-labelledby="terms-tab">
											<?php echo form_open('admin/policysave/terms') ?>
											<div class="form-group">
												<label for="policy">Terms & Condition </label>
												<textarea name="policy" id="policy" cols="30" rows="10" class="ckeditor form-control"
													data-error-container="#editor2_error" required><?php foreach ($policy as $value) {
														if($value->policyName=='terms'){
															echo $value->description;
														}
													} ?></textarea>
												<div id="editor2_error"> </div>
											</div>
											<div class="form group">
												<button type="submit" name="submit" id="buttonTitle" class="btn btn-info">Save</button>
											</div>
											<?php echo form_close(); ?>
										</div>
										<div class="tab-pane fade" id="privacy" role="tabpanel"
											aria-labelledby="privacy-tab">
											<?php echo form_open('admin/policysave/privacy') ?>
											<div class="form-group">
												<label for="exampleInputPassword1">Privacy Policy </label>
												<textarea name="policy" id="policy" cols="30" rows="10" class="ckeditor form-control"
													data-error-container="#editor2_error" required><?php foreach ($policy as $value) {
														if($value->policyName=='privacy'){
															echo $value->description;
														}
													} ?></textarea>
												<div id="editor2_error"> </div>
											</div>
											<div class="form group">
												<button type="submit" name="submit" id="buttonTitle" class="btn btn-info">Save</button>
											</div>
											<?php echo form_close(); ?>
										</div>
										<div class="tab-pane fade" id="cancel" role="tabpanel"
											aria-labelledby="cancel-tab">
											<?php echo form_open('admin/policysave/cancel') ?>
											<div class="form-group">
												<label for="policy">Cancellation Policy </label>
												<textarea name="policy" id="policy" cols="30" rows="10" class="ckeditor form-control"
													data-error-container="#editor2_error" required><?php foreach ($policy as $value) {
														if($value->policyName=='cancel'){
															echo $value->description;
														}
													} ?></textarea>
												<div id="editor2_error"> </div>
											</div>
											<div class="form group">
												<button type="submit" name="submit" id="buttonTitle" class="btn btn-info">Save</button>
											</div>
											<?php echo form_close(); ?>
										</div>
										<div class="tab-pane fade" id="covid" role="tabpanel"
											aria-labelledby="covid">
											<?php echo form_open('admin/policysave/covid') ?>
											<div class="form-group">
												<label for="policy">Covid Policy </label>
												<textarea name="policy" id="policy" cols="30" rows="10" class="ckeditor form-control"
													data-error-container="#editor2_error" required><?php foreach ($policy as $value) {
														if($value->policyName=='covid'){
															echo $value->description;
														}
													} ?></textarea>
												<div id="editor2_error"> </div>
											</div>
											<div class="form group">
												<button type="submit" name="submit" id="buttonTitle" class="btn btn-info">Save</button>
											</div>
											<?php echo form_close(); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>

				</div>
			</div>
		</div>

	</div>
</div>

<script>
	$(document).ready(function () {

		
		$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
			localStorage.setItem('activeTab', $(e.target).attr('href'));
		});
		var activeTab = localStorage.getItem('activeTab');
		console.log(activeTab);
		if(activeTab){
			$('#myTab a[href="' + activeTab + '"]').tab('show');
		}


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