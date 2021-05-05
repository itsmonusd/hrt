<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card ">
				<div class="card-header">
					<div class="row">
						<div class="col-md-10">
							<h4 class="card-title"> Itineray</h4>
						</div>
						<div class="col-md-2">
							<a href="<?php echo base_url('admin/actionitinerary/add/new') ?>" class="btn btn-info" >Add</a>
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
								if(!empty($data)){
								foreach ($data as $cat) {
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
								<?php } }
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<script>
	$(document).ready(function () {

	});
</script>