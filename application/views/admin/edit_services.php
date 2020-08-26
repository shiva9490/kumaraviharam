
		<?php $this->load->view('admin/header1');?>
		<div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Edit services</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Edit services</li>
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
											<center><?php echo $this->session->flashdata('add_services');?></center>
											<?php foreach($edit_services as $row){?>
											<form action="<?php echo base_url();?>admin/updateservices/<?php echo $row->ser_id;?>" method="POST" class="form-horizontal form-bordered" id="myForm" enctype="multipart/form-data">
												<div class="form-body">
													
													<div class="form-group row">
														<label class="control-label text-right col-md-3">Services Name</label>
														<div class="col-md-9">
															<input type="text" placeholder="Services Name"  id="ser_title" class="form-control" name="ser_title" value="<?php echo $row->ser_title;?>">
														</div>
													</div>
													<div class="form-group row">
														<label class="control-label text-right col-md-3">Services Image</label>
														<div class="col-md-9">
															<input type="file" placeholder="Services Image" class="form-control" name="image">
														</div>	
													</div>
													<div class="form-group row">
														<label class="control-label text-right col-md-3">Product Description</label>
														<div class="col-md-9">
															<textarea  id="editor2" name="ser_desc"  required="" rows="5" cols="10" ><?php echo $row->ser_desc;?></textarea>
														</div>
													</div>
												</div>
												<div class="form-actions">
													<div class="row">
														<div class="col-md-12">
															<div class="row">
																<div class="offset-sm-3 col-md-9">
																	<button type="submit" class="btn btn-success"> Update</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</form>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
                
						</div>
                    </div>
                </div>
            </div>
        </div>
<script src="<?php echo base_url();?>assets_admin/ck/bower_components/jquery/dist/jquery.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets_admin/ck/dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="<?php echo base_url();?>assets_admin/ck/bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>assets_admin/ck/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets_admin/assets/node_modules/switchery/dist/switchery.min.js"></script>
<script src="<?php echo base_url();?>assets_admin/assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets_admin/assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets_admin/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url();?>assets_admin/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets_admin/assets/node_modules/dff/dff.js" type="text/javascript"></script>
<script type="text/javascript" src="../assets/node_modules/multiselect/js/jquery.multi-select.js"></script>
		<script>
            $(document).ready(function(){
                $("#prod_code").keyup(function(){
                  var code = $('#prod_code').val();
                  $.ajax({
						type: "POST",
						data: {'code':code},
						url : "<?php echo base_url();?>admin/prod_Codecheck",
						dataType:"json",
						success: function(data){
							var viewhtml ='';
							if(data.status ==1){
							    alert("Product Code Already existed");
							    $('#prod_code').val('');
							}
						}
					});
                });
            });
        </script>
		<script>
            function deletecatogry(id){
				var a = confirm("Do you want to really delete?");
				if(a == true){
					$.ajax({
						type: "POST",
						data: {'id':id},
						url : "<?php echo base_url();?>admin/delete_qtytype",
						dataType:"json",
						success: function(data){
							var viewhtml ='';
							if(data.status > 0){
								$('#old'+id).css('display','none');
								var view = '<div class="alert">Record Delete Succfully...</div>';
								$('#msg').html(view);
								msg();
							}
						}
					});
				}
            }
		</script>
		<script>
			function inactive(id){
				$.ajax({
					type: "POST",
					data: {'id':id},
					url : "<?php echo base_url();?>admin/inactive_qtytype",
					dataType:"json",
					success: function(data){
						var viewhtml ='';
						if(data.status > 0){
							$('#active'+id).css('display','none');
							var view = '<button class="btn btn-warning shi" onclick="active('+id+')">Inactive</button>';
							$('#view'+id).html(view);
						}
					}
				});
			}
		</script>		
		<script>
			function active(id){
				$.ajax({
					type: "POST",
					data: {'id':id},
					url : "<?php echo base_url();?>admin/active_qtytype",
					dataType:"json",
					success: function(data){
						var viewhtml ='';
						if(data.status > 0){
							$('#active'+id).css('display','none');
							var view = '<button class="btn btn-info shi" onclick="inactive('+id+')">Active</button>';
							$('#view'+id).html(view);
						}
					}
				});
			}
        </script>
		<script>
			function msg(){
				$("#msg").show();
				setTimeout(function() { $("#msg").hide(); }, 5000);
			}
		</script>
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
	
    <script>
        $(function () {
            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function () {
                new Switchery($(this)[0], $(this).data());
            });
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }
            $("input[name='tch1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
            $("input[name='tch2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
                prefix: '$'
            });
            $("input[name='tch3']").TouchSpin();
            $("input[name='tch3_22']").TouchSpin({
                initval: 40
            });
            $("input[name='tch5']").TouchSpin({
                prefix: "pre",
                postfix: "post"
            });
            // For multiselect
            $('#pre-selected-options').multiSelect();
            $('#optgroup').multiSelect({
                selectableOptgroup: true
            });
            $('#public-methods').multiSelect();
            $('#select-all').click(function () {
                $('#public-methods').multiSelect('select_all');
                return false;
            });
            $('#deselect-all').click(function () {
                $('#public-methods').multiSelect('deselect_all');
                return false;
            });
            $('#refresh').on('click', function () {
                $('#public-methods').multiSelect('refresh');
                return false;
            });
            $('#add-option').on('click', function () {
                $('#public-methods').multiSelect('addOption', {
                    value: 42,
                    text: 'test 42',
                    index: 0
                });
                return false;
            });
            $(".ajax").select2({
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function (markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 1,
                //templateResult: formatRepo, // omitted for brevity, see the source of this page
                //templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
            });
        });
    </script>
    
    
	<?php $this->load->view('admin/footer1');?>