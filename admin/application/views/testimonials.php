<style>
.center{
	text-align:center;
}
</style>
<link href="<?php echo base_url()?>externals/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url()?>externals/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url()?>externals/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
	<div class="row wrapper border-bottom white-bg page-heading">
		<div class="col-sm-4">
			<h2>Testimonials</h2>
			<ol class="breadcrumb">
				<li>
					<a href="<?php echo base_url()?>">Dashboard</a>
				</li>
				<li class="active">
					<strong>Testimonials</strong>
				</li>
			</ol>
		</div>
		<div class="col-sm-4 pull-right">
			<h2>
				<a href="<?php echo base_url()?>index.php/home/createTestimonial" class="btn btn-w-m btn-primary pull-right">Add Testimonial</a>
			</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="wrapper wrapper-content">
				<div class="row">
					<div class="ibox">                        
						<div class="ibox-content">
						<?php
						if(@$this->session->userdata("success") != '')
						{
						?>
							<div class="alert alert-success alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <?php
								echo @$this->session->userdata("success");
								@$this->session->unset_userdata("success");
								?>
                            </div>
						<?php
						}
						if(@$this->session->userdata("fail") != '')
						{
						?>
							<div class="alert alert-danger alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <?php
								echo @$this->session->userdata("fail");
								@$this->session->unset_userdata("fail");
								?>
                            </div>
						<?php
						}
						?>
							<table class="table table-striped table-bordered table-hover " id="editable" >
								<thead>
									<tr>
										<th class="center" style="width:7%;">S.No</th>
										<th class="center" style="width:30%;">Message</th>
										<th class="center" style="width:20%;">Alt</th>
										<th class="center">Image</th>										
										<th class="center" style="width:10%;">Actions</th>
									</tr>
								</thead>
								<tbody>
								<?php
								if(@sizeOf($items) > 0)
								{
									for($i=0;$i<sizeOf($items);$i++)
									{
								?>
									<tr class="gradeX">
										<td class="center"><?php echo ($i+1)?></td>
										<td class="center"><?php echo @$items[$i]->tTitle?></td>
										<td class="center"><?php echo @$items[$i]->altTitle?></td>
										<td class="center"><img style="width:100px" src="<?php echo base_url();?>uploads/files/<?php echo @$items[$i]->tImage?>"></td>
										<td class="center">
											<a href="<?php echo base_url()?>index.php/home/editTestimonial/<?php echo @$items[$i]->id;?>"><i class="fa fa-edit"></i></a> &nbsp; | &nbsp;
											<a href="<?php echo base_url()?>index.php/home/deleteItemWithImage/<?php echo @$items[$i]->id;?>/testimonials/tImage/files/testimonials"><i class="fa fa-trash"></i></a>
										</td>
									</tr>
								<?php
									}
								}
								?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="<?php echo base_url()?>externals/js/plugins/jeditable/jquery.jeditable.js"></script>
<script src="<?php echo base_url()?>externals/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>externals/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url()?>externals/js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="<?php echo base_url()?>externals/js/plugins/dataTables/dataTables.tableTools.min.js"></script>
<script>
$(document).ready(function() {
	$('.dataTables-example').dataTable({
		responsive: true,
		"dom": 'T<"clear">lfrtip',
		"tableTools": {
			"sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
		}
	});

	/* Init DataTables */
	var oTable = $('#editable').dataTable();

	/* Apply the jEditable handlers to the table */
	/*oTable.$('td').editable( '../example_ajax.php', {
		"callback": function( sValue, y ) {
			var aPos = oTable.fnGetPosition( this );
			oTable.fnUpdate( sValue, aPos[0], aPos[1] );
		},
		"submitdata": function ( value, settings ) {
			return {
				"row_id": this.parentNode.getAttribute('id'),
				"column": oTable.fnGetPosition( this )[2]
			};
		},

		"width": "90%",
		"height": "100%"
	} );*/


});

function fnClickAddRow() {
	$('#editable').dataTable().fnAddData( [
		"Custom row",
		"New row",
		"New row",
		"New row",
		"New row" ] );

}
</script>