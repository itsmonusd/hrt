<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card ">
				<div class="card-header">
					<div class="row">
						<div class="col-md-10">
							<h4 class="card-title"> Blogs</h4>
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
									<th> Title </th>
									<th> Keywords </th>
									<th> Image </th>
									<th> Description </th>
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
								foreach ($data as $blog) {
								?>
								<tr>
									<td>
										<?php echo $i++; ?>
									</td>
									<td>
										<?php echo $blog->title; ?>
									</td>
									<td>
										<?php echo $blog->keywords; ?>
									</td>
                                    <td>
										<img data-enlargeable style="cursor: zoom-in;object-fit:cover;height:100px;width:100px;" src="<?php echo $blog->image !=null ? base_url('assets/uploads/blogs/').$blog->image : base_url('assets/uploads/uploads.png') ?>" alt="blog image" srcset="">
									</td>
									<td>
										<?php echo $blog->description; ?>
									</td>
									<td>
										<?php echo $blog->createdAt; ?>
									<td>
										<?php $status = $blog->status ? 0 : 1; ?>
										<a
											href="<?php echo base_url('common/changeStatus/blogs/').$blog->id.'/'.$status ?>"><?php echo $blog->status ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger" ></i>'; ?></a>
									</td>
									<td class="text-center">
										<a data-toggle="modal" data-catData='<?php echo json_encode($blog); ?>'
											data-target="#add">
											<i class="fas fa-edit" style="padding-right: 50px; color:darkgreen"></i></a>
										<a href='<?php echo base_url('common/deletedata/blogs/').$blog->id ?>'><i
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
				<h5 class="modal-title categoryTitle" id="categoryTitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id='blogs' action=" <?php echo base_url('admin/saveBlogs/add/new'); ?>" method="post"  enctype="multipart/form-data" >
					<div class="form-group">
						<label for="exampleInputEmail1">Tittle  <span class="text-danger">*</span> </label>
						<input type="text " class="form-control" id="title" name="title" placeholder="Enter title here" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Keywords</label>
						<input type="text " class="form-control" id="keywords" name="keywords"
							placeholder="Enter keywords here" data-role="tagsinput">
					</div>
					<div class="form-group">
						<label class="filelabel add-image" id="img1">
							<i class="fas fa-paperclip"></i>
							<span class="title">
								Add Image 720 x 720
							</span>
							<input class="FileUpload1 file1" id="file" name="file" type="file" />
						</label>
					</div>
                    <input class="d-none" type="hidden" name="oldImage" id="oldImage">
					<div class="form-group">
						<label for="exampleInputPassword1">Description <span class="text-danger">*</span> </label>
						<textarea name="description" id="description" cols="30" rows="10" class="form-control" required></textarea>
						<div id="editor2_error"> </div>
					</div>
					<div class="form group">
						<button type="submit" name="submit" id="buttonTitle" class="btn btn-info"></button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>


