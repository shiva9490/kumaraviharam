
		<?php $this->load->view('admin/header1');?>
		<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Add Blog</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Add Blog</li>
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
										    <center><?php echo $this->session->flashdata('added_blog');?></center>
											<form action="<?php echo base_url();?>admin/added_blog" method="POST" class="form-horizontal form-bordered" id="myForm" enctype="multipart/form-data">
												<div class="form-body">
													<div class="form-group row">
														<label class="control-label text-right col-md-3">Blog Title</label>
														<div class="col-md-9">
															<input type="text" placeholder="Blog Title "  class="form-control" name="blog_title">
														</div>
													</div>
													<div class="form-group row">
														<label class="control-label text-right col-md-3">Blog Images</label>
														<div class="col-md-9">
															<input type="file" name="image" placeholder="" class="form-control" required>
														</div>
													</div>
													<div class="form-group row">
														<label class="control-label text-right col-md-3">Blog Public Date</label>
														<div class="col-md-9">
															<input type="date" name="blog_datetime" placeholder="" class="form-control" required>
														</div>
													</div>
													<div class="form-group row">
														<label class="control-label text-right col-md-3">Blog Desc</label>
														<div class="col-md-9">
															<textarea  id="editor1" name="blog_desc"  required="" rows="5" cols="10" ></textarea>
														</div>
													</div>
												</div>
												<div class="form-actions">
													<div class="row">
														<div class="col-md-12">
															<div class="row">
																<div class="offset-sm-3 col-md-9">
																	<button type="submit" class="btn btn-success"> Submit</button>
																	<button type="button" class="btn btn-inverse">Reset</button>
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