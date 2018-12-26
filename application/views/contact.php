<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<section id="main">
		<div class="container">
			<h1>Contact Form</h1><hr>
			<div style="display: none;" class="alert alert-success"></div>
			<div style="display: none;" class="alert alert-danger"></div>
			<form style="width: 400px; margin:0 auto;" class="center" action="" method="post" id="contact_form">
				<div class="form-group">
					<input type="text" id="name" name="name" placeholder="Enter Name" class="form-control">
				</div>
				<input type="hidden" name="id" id="id" value="">
				<div class="form-group">
					<input type="text" id="email" name="email" placeholder="Enter Email" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" id="phone" name="phone" placeholder="Enter Phone" class="form-control">
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-success update" id="submit">Save Contact</button>
				</div>
			</form><hr>
			<h1>Contact List</h1><hr>
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


<script type="text/javascript">
	$(function(){
		ShowContact();


		/*$('.update').click(function(){

		});*/
		$('.item-delete').click(function(){
			$('#deleteModal').modal('show');
			var id = $('this').attr('data');

			$('#btnDelete').unbind().click(function(){
				$('#deleteModal').modal('hide');
				
				var url = "<?php echo base_url(); ?>Contact/DeleteContact/"+id;

				$.ajax({
					type: 'ajax',
					url : url,
					async: false,
					dataType:'json',
					success: function(response){
						if(response.ok){
							$('.alert-success').html('success').fadeIn().delay(4000).fadeOut('slow');
							ShowContact();
						}
					},
					error: function(){
						alert('Error Deleting');
					}
				});
			});
			
		});


		$('#showdata').on('click', '.item-edit', function(){
			var id = $(this).attr('data');
			var url = "<?php echo base_url('Contact/EditContact'); ?>"+"/"+id;
			$.ajax({
				type: 'ajax',
				url :url,
				method: 'get',
				data:{id:id},
				async:false,
				dataType:'json',
				success: function(data){
					$('#submit').text('Update Contact');
					$('#name').val(data.name);
					$('#email').val(data.email);
					$('#phone').val(data.phone);
					$('#id').val(data.id);
				},
				error: function(){
					alert('Error');
				}
			});
		});
		$('#contact_form').submit(function(e){
			e.preventDefault();
			var sumbitTxt = $('#submit').text();
			if(sumbitTxt == 'Save Contact'){
				var url = "<?php echo base_url('Contact/SaveContact'); ?>";
			}else if(sumbitTxt == 'Update Contact'){
				var url = "<?php echo base_url('Contact/UpdateContact'); ?>";
			}else{
				alert('Error');
			}
			
			var data = $('#contact_form').serialize();
 			$.ajax({
					type: 'ajax',
					method: 'post',
					url: url,
					data: data,
					async: false,
					dataType: 'json',
					success: function(response){
						if(response.ok){
							$('#contact_form')[0].reset();
							$('.alert-success').html('success').fadeIn().delay(4000).fadeOut('slow');
							ShowContact();
						}else{
							alert('Error');
						}
					},
					error: function(){
						alert('Could not add data');
					}
				});
		});

		function ShowContact(){
			$.ajax({
				type: 'ajax',
				url : "<?php echo base_url('Contact/ShowAll'); ?>",
				async : false,
				dataType:'json',

				success : function(data){
					var html='';
					var i;
					var sl=1;
					for(i=0;i<data.length;i++){
						html +='<tr>'+
								'<td>'+sl++ +'</td>'+
								'<td>'+data[i].name + '</td>'+
								'<td>'+data[i].email + '</td>'+
								'<td>'+data[i].phone + '</td>'+
								'<td>'+data[i].date_time + '</td>'+
								'<td>'+
									'<a href="javascript:;" class="btn btn-info item-edit" id="editContact" data="'+data[i].id+'">Edit</a>'+
									'<a href="javascript:;" class="btn btn-danger item-delete" id="deleteContact" data="'+data[i].id+'">Delete</a>'+
								'</td>'+
							'</tr>';
						$('#showdata').html(html);
					}
				},
				error: function(){
					alert('Could not get Data from Database');
				}
			});
		}
	});

</script>








dns22.centriohost.com
dns23.centriohost.com



</body>
</html>