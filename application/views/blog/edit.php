
	<h3>Edit Blog</h3>
	<a href="<?php echo base_url('blog/index'); ?>" class="btn btn-default">Back</a>
	<form action="<?php echo base_url('blog/update') ?>" method="post" class="form-horizontal">
		<input type="hidden" name="txt_hidden" value="<?php echo $blog->id; ?>">
		<div class="form-group">
			<label for="title" class="col-md-2 text-right">Title</label>
			<div class="col-md-10">
				<input type="text" value="<?php echo $blog->title; ?>" name="txt_title" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label for="description" class="col-md-2 text-right">Description</label>
			<div class="col-md-10">
				<textarea name="txt_description" class="form-control"><?php echo $blog->description; ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 text-right"></label>
			<div class="col-md-10">
				<input type="submit" name="btnUpdate" class="btn btn-primary" value="Update">
			</div>
		</div>
	</form>
	
