
		<?php $this->load->view('admin/header1');?>
		<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Edit Home About</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Edit Home About</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
							<div class="row">
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<form action="<?php echo base_url();?>admin/addevent_blessings" method="POST" class="form-horizontal form-bordered" id="myForm" enctype="multipart/form-data">
												<div class="form-body">
													<div class="form-group row">
														<label class="control-label text-right col-md-3">Image</label>
														<div class="col-md-9">
															<input type="file" name="image" class="form-control" required>
														</div>
													</div>
												</div>
												<div class="form-body">
													<div class="form-group row">
														<label class="control-label text-right col-md-3">Title</label>
														<div class="col-md-9">
															<textarea  id="editor1" name="title"  required="" rows="5" cols="10" ></textarea>
														</div>
													</div>
												</div>
												<div class="form-body">
													<div class="form-group row">
														<label class="control-label text-right col-md-3">Desc</label>
														<div class="col-md-9">
															<textarea  id="editor2" name="desc"  required="" rows="5" cols="10" ></textarea>
														</div>
													</div>
												</div>
												<div class="form-actions">
													<div class="row">
														<div class="col-md-12">
															<div class="row">
																<div class="offset-sm-3 col-md-9">
																	<button type="submit" class="btn btn-success"> Add</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
                
						</div>
                    </div>
                </div>
            </div>
        </div>
<!-- CK Editor -->
<script src="<?php echo base_url();?>assets_admin/ck/bower_components/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url();?>assets_admin/ck/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		
		<script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
      })
    </script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor2')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
      })
    </script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor3')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
      })
    </script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor4')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
      })
    </script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor5')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
      })
    </script>
	<script>
	    function resetForm() {
	    	document.getElementById("myForm").reset();
	    }
	</script>
	<?php $this->load->view('admin/footer1');?>