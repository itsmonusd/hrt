<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card ">
				<div class="card-header">
					<div class="row">
						<div class="col-md-10">
							<h4 class="card-title"> Categories</h4>
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
									<th>
										S.no.
									</th>
									<th>
										Category Name's
									</th>
									<th>
										Created Date
									<th>
										status
									</th>
									<th class="text-center">
										Action
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($num as $cat) {
									$i++
								?>
								<tr>
									<td>
										<?php echo $i; ?>
									</td>
									<td>
										<?php echo $cat->categoryName; ?>
									</td>
									<td>
										<?php echo $cat->createdAt; ?>
									<td>
										<?php $status = $cat->status ? 0 : 1; ?>
										<a href="<?php echo base_url('common/changeStatus/category/').$cat->id.'/'.$status ?>"><?php echo $cat->status ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger" ></i>'; ?></a>
									</td>
									<td class="text-center">
										<a data-toggle="modal" data-catData='<?php echo json_encode($cat); ?>'
											data-target="#add">
											<i class="fas fa-edit" style="padding-right: 50px; color:darkgreen"></i></a>
										<a href='<?php echo base_url('common/deletedata/category/').$cat->id ?>'><i
												class="fa fa-trash text-danger" aria-hidden="true"></i></a>
									</td>
								</tr>
								<?php }
								?>
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
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title categoryTitle" id="categoryTitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id='category' action=" <?php echo base_url('admin/save_category/') . "add"; ?>" method="post">
					<div class="form-group">
						<label for="exampleInputEmail1">Category's Name</label>
						<input type="text " class="form-control" id="cateName" name="category" placeholder="Enter here">
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

		$('#add').on('show.bs.modal', function (e) {
			var data = $(e.relatedTarget).attr('data-catData');
			var baseUrl = `<?php echo base_url('admin/save_category/');  ?>`;
			if (data) {
				$('.categoryTitle').html('Edit Category');
				$('#buttonTitle').html('Save Changes');
				var result = JSON.parse(data);
				$("#cateName").val(result.categoryName)
				$("#cateId").val(result.id)
				$('#category').attr('action', baseUrl + 'edit/' + result.id);

			} else {
				$('.categoryTitle').html('Add Category');
				$('#buttonTitle').html('Save');
				$('#category').attr('action', baseUrl + 'add/new');
				$("#cateName").val('')
				$("#cateId").val('')
			}
		})
	});
</script>