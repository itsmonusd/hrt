<style>
	.gallery {
		display: flex;
		flex-wrap: wrap;
		/* Compensate for excess margin on outer gallery flex items */
		margin: -1rem -1rem;
	}

	.gallery-item {
		/* Minimum width of 24rem and grow to fit available space */
		flex: 1 1 9rem;
		/* Margin value should be half of grid-gap value as margins on flex items don't collapse */
		margin: 1rem;
		box-shadow: 0.3rem 0.4rem 0.4rem rgba(0, 0, 0, 0.4);
		overflow: hidden;
		position: relative;
	}

	.gallery-image {
		display: block;
		width: 100%;
		height: 100%;
		object-fit: cover;
		transition: transform 400ms ease-out;
	}

	.gallery-image:hover {
		transform: scale(1.15);
	}

	.icon {
		display: flex;
		position: absolute;
		justify-content: center;
		align-items: center;
		bottom: 0;
		right: 0;
		/* width: 100%; */
	}
</style>
<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card ">
				<div class="card-header">
					<div class="row">
						<div class="col-md-10">
							<h4 class="card-title"> Gallery Image Upload</h4>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class='content'>
						<!-- Dropzone -->

						<SECTION>
							<DIV id="dropzone">
								<FORM class="dropzone needsclick" id="preferenceImageUpload"
									action="<?php echo base_url('admin/galleryimageupload') ?>">
									<DIV class="dz-message needsclick">
										Drop files here or click to upload.<BR>
										<SPAN class="note needsclick">( Selected
											files are <STRONG></STRONG> actually uploaded.)</SPAN>
									</DIV>
								</FORM>
							</DIV>
						</SECTION>

						<DIV id="preview-template" style="display: none;">
							<DIV class="dz-preview dz-file-preview">
								<DIV class="dz-image"><IMG data-dz-thumbnail=""></DIV>
								<DIV class="dz-details">
									<DIV class="dz-size"><SPAN data-dz-size=""></SPAN></DIV>
									<DIV class="dz-filename"><SPAN data-dz-name=""></SPAN></DIV>
								</DIV>
								<DIV class="dz-progress"><SPAN class="dz-upload" data-dz-uploadprogress=""></SPAN></DIV>
								<DIV class="dz-error-message"><SPAN data-dz-errormessage=""></SPAN></DIV>
								<div class="dz-success-mark">
									<svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1"
										xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
										xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
										<title>Check</title>
										<desc>Created with Sketch.</desc>
										<defs></defs>
										<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
											sketch:type="MSPage">
											<path
												d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"
												id="Oval-2" stroke-opacity="0.198794158" stroke="#747474"
												fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup">
											</path>
										</g>
									</svg>
								</div>
								<div class="dz-error-mark">
									<svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1"
										xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
										xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
										<title>error</title>
										<desc>Created with Sketch.</desc>
										<defs></defs>
										<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
											sketch:type="MSPage">
											<g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474"
												stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
												<path
													d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z"
													id="Oval-2" sketch:type="MSShapeGroup"></path>
											</g>
										</g>
									</svg>
								</div>

							</div>
						</div>

					</div>
                    <div class="container">

                        <div class="gallery">
                        </div>

                    </div>
				</div>
			</div>
		</div>

	</div>
</div>


<script>
	Dropzone.autoDiscover = false;
	$(document).ready(function () {

        getGalleryImages().then(function(res) {
                renderGalleryImages(res);
        });

		var dropzone = new Dropzone('#preferenceImageUpload', {
			url: `<?php echo base_url('admin/galleryimageupload') ?>`,
			previewTemplate: document.querySelector('#preview-template').innerHTML,
			acceptedFiles: 'image/*',
			parallelUploads: 2,
			thumbnailHeight: 120,
			thumbnailWidth: 120,
			maxFilesize: 2,
			filesizeBase: 1000,
        });

        dropzone.on("complete", function(file) {
            getGalleryImages().then(function(res) {
                renderGalleryImages(res);
            });
        });
        

        $(document).on('click','span[role="deleteMenuImage"]',function () {
        let id = $(this).attr('data-id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url : `<?php echo base_url('common/deleteData/gallery') ?>/${id}`,
                    type : 'delete',
                    success : function (data) {
						dropzone.removeAllFiles();
						getGalleryImages().then(function(res) {
                                renderGalleryImages(res);
                        });
                    },
                    // error: function (xhr) {
                    //     toastr.remove()
                    //     toastr.error(xhr.responseJSON.msg)
                    // }
                });
        }
    })
    })
	});

	function getGalleryImages() {
        return $.ajax({
            url : `<?php echo base_url('admin/getgalleryimages') ?>`,
            type:'get',
        })
    }

    function renderGalleryImages(res) {
        var response = JSON.parse(res);
        var gridTemplate = '';
        var baseUrl = `<?php echo base_url('assets/uploads/gallery/') ?>`;
                $.each(response.data,function (index,value) {
                    gridTemplate += 
                    `<div class="gallery-item">
                        <img data-enlargeable class="gallery-image" src="${baseUrl}${value.image}" >
                        <div class="icon">
                            <span role="deleteMenuImage" class="text-danger pointer" data-id="${value.id}" ><i class="fas fa-trash"></i></span>
                        </div>
                        
                    </div>`
                })
        $('.gallery').html(gridTemplate);
    }
</script>
