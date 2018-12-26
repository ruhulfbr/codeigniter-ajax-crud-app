<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<section id="main">
		<div class="container">
			<h1>User Form</h1><hr>
			<div style="display: none;" class="alert alert-success"></div>
			<div style="display: none;" class="alert alert-danger"></div>
			<form style="width: 400px; margin:0 auto;" class="center" action="" method="post" id="contact_form">
				<div class="form-group">
					<input type="text" id="name" name="name" placeholder="Enter Name" class="form-control" required="">
				</div>
				<input type="hidden" name="id" id="id" value="">
				<div class="form-group">
					<input type="text" id="email" name="email" placeholder="Enter Email" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" id="phone" name="phone" placeholder="Enter Phone" class="form-control">
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-success update" id="submit">Save User</button>
				</div>
			</form><hr>
			<h1>User list List</h1><hr>
			<table class="table table-bordered">
			    <thead>
			      <tr>
			        <th>Sl No</th>
			        <th>Name</th>
			        <th>Email</th>
			        <th>Phone</th>
			        <th>Date & time</th>
			        <th>Actions</th>
			      </tr>
			    </thead>
			    <tbody id="showdata">
			      <tr>
			        <td>1</td>
			        <td>Ruhul</td>
			        <td>john@example.com</td>
			        <td>01749769449</td>
			        <td>28/12/2018</td>
			        <td>
			        	<button class="btn btn-sm btn-warning">Edit</button>
			        	<button class="btn btn-sm btn-danger">Delete</button>
			        </td>
			      </tr>
			    </tbody>
			</table>
		</div>
	</section>





<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
        	Do you want to delete this record?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<?php  
	$this->load->view('js');
?>
</script>
</body>
</html>