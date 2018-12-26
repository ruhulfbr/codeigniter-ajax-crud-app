

<script type="text/javascript">
	$(function(){

		ShowAllUser();


		$('#showdata').on('click', '.item-delete', function(){
			$('#deleteModal').modal('show');
			var id = $(this).attr('data');

			$('#btnDelete').unbind().click(function(){

				var url = "<?php echo base_url(); ?>User/DeleteUser";

				$.ajax({
					type : 'ajax',
					url : url,
					method:'get',
					data:{id:id},
					dataType : 'json',
					async : false,
					success : function(response){
						if(response.success){
							$('#deleteModal').modal('hide');
							$('.alert-success').html('success').fadeIn().delay(4000).fadeOut();
							ShowAllUser();
						}
					},
					error: function(){
						alert('Error Delleting');
					}
				});
			});


		});


		$('.item-edit').click(function(){
			var id = $(this).attr('data');
			$('#submit').text('Update User');
			var url = "<?php echo base_url(); ?>User/EditUser/" + id;
			$.ajax({
				type : 'ajax',
				url : url,
				dataType : 'json',
				async : false,
				success : function(data){
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



		$('#submit').click(function(){
			 var btnTxt = $(this).text();
			if(btnTxt == 'Update User'){
				var url = "<?php echo base_url('User/UpdateUser'); ?>";
			}else if(btnTxt == 'Save User'){
				var url = "<?php echo base_url('User/SaveUser'); ?>";
			}

			var data = $('#contact_form').serialize();
			$.ajax({
				type : 'ajax',
				method: 'post',
				url : url,
				data:data,
				dataType:'json',
				async : false,
				success: function(response){
					if(response.success){
						$('#contact_form')[0].reset();
						ShowAllUser();
						$('.alert-success').html('Successfull').fadeIn().delay(4000).fadeOut();
					}					
				},
				error : function(){
					alert('Error');
				}
			});
		});

		function ShowAllUser(){
			var url = "<?php echo base_url('User/GetAllUser'); ?>";

			$.ajax({
				type:'ajax',
				url:url,
				async: false,
				dataType:'json',
				success: function(data){
					var i;
					var html = '';
					var sl = 1;
					for (i = 0; i<data.length; i++) {
						html += '<tr>'+
									'<td>'+ sl++ +'</td>'+
									'<td>'+ data[i].name + '</td>'+
									'<td>'+ data[i].email + '</td>'+
									'<td>'+ data[i].phone + '</td>'+
									'<td>'+ data[i].date_time + '</td>'+
									'<td>'+ 
										'<a href="javascript:;" class="btn btn-xs btn-warning item-edit" data="'+ data[i].id +'"> Edit</a>'+ 
										'<a href="javascript:;" class="btn btn-xs btn-danger item-delete" data="'+ data[i].id +'"> Delete</a>'+
									'</td>'+
								'</tr>';
						$('#showdata').html(html);
					}

				},
				error:function(){
					alert('Data painai...');
				}
			});
		}
	});


</script>