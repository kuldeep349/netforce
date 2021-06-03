<script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/plugins/uploaders/fileinput.min.js"></script>
<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Product Management</span> - Edit Product</h4>
         </div>
         <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>admin"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="#">Product Management</li>
            <li class="active">Edit Product</li>
         </ul>
      </div>
   </div>
   <!-- /page header -->
   <!-- Content area -->
   <div class="content">
      <!-- Horizontal form options -->
      <div class="row">
         <div class="col-md-12">
            <!-- Basic layout-->
            <div class="panel panel-flat">
               <div class="panel-heading">
                  <h5 class="panel-title">Edit Product</h5>
                  <div class="heading-elements">
                     <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                     </ul>
                  </div>
                  <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
               </div>
               <?php 
                  echo form_open(site_url().$module_name."/eshop/editProduct",array('method'=>'post','class'=>'form-horizontal', 'enctype'=>'multipart/form-data'));
                  									?>
               <div class="panel-body">
                  <input type='hidden' value="<?php echo $product_data['id']; ?>" name='hidid' />					
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Select Product Main Category:</label>
                     <div class="col-lg-9">
                        <select id="parent_category_id" name='parent_category_id' class='form-control'>
                           <?php
						   if(!empty($all_category) && count($all_category)>0)
						   {
                              foreach($all_category as $cat)
                              {
								  if($cat['id']==$product_data['parent_category_id'])
								  {
							?>
							 <option selected value="<?php echo $cat['id']; ?>"><?php echo $cat['category_name']; ?></option>
							<?php 
								  }
								  else 
								  {
							 ?>
							  <option value="<?php echo $cat['id']; ?>"><?php echo $cat['category_name']; ?></option>
							 <?php 
								  }
                              }
						   }  
                           ?>
                        </select>
                     </div>
                  </div>
				  
				  
				  <div class="form-group">
                     <label class="col-lg-3 control-label">Select Product Sub Category:</label>
                     <div class="col-lg-9">
                        <select name='category_id' id="sub_category_id" class='form-control'>
                          <option value="">-Select Sub Category-</option>
						  <?php 
						  if(!empty($sub_category) && count($sub_category)>0)
						  {
							  foreach($sub_category as $sub_cat)
							  {
								if($product_data['category_id']==$sub_cat->id)
								{
						 ?>
						         <option selected value="<?php echo $sub_cat->id;?>"><?php echo $sub_cat->subcategory_name;?></option>
						 <?php 
								}
								else 
								{
						?>
								<option value="<?php echo $sub_cat->id;?>"><?php echo $sub_cat->subcategory_name;?></option>
						<?php 
								}
									
							  }
						  }
						  ?>
						</select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Title:</label>
                     <div class="col-lg-9">
                        <input type="text" value="<?php echo $product_data['title']; ?>" name="title" class="form-control" placeholder="Title">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Product Main Image:</label>
                     <div class="col-lg-9">
                        <img width='150' src="<?php echo base_url(); ?>product_images/<?php echo $product_data['product_image']; ?>" /><br><br>
                        <input name='product_image' type="file" class="file-input">
                        <input name='hidden_image' value="<?php echo $product_data['product_image']; ?>" type="hidden">
                     </div>
                  </div>
				  <?php 
				     //pr($sub_images);
					 if(!empty($sub_images) && count($sub_images)>0)
					 {
						 $total_row=ceil(count($sub_images)/3);
						 $total_product=0;
						
						 for($i=1;$i<=$total_row;$i++)
						 {
						  echo '<div class="form-group">';
						  echo '<label class="col-lg-3 control-label"></label>';
							 for($j=1;$j<=3;$j++)
							 {
								 $total_product++;
								 list($k,$v)=each($sub_images);
								 $img=$v['sub_img']; 
				   ?>
					 <!---------------->
                     <div class="col-md-3">
					  <div class="panel panel-flat">
								<div class="panel-heading">
									<div class="heading-elements">
										<ul class="icons-list">
					                		<li><a img_name="old_img_<?php echo $total_product;?>" class="remove_old_image"  data-action="close"></a></li>
					                	</ul>
				                	</div>
								</div>
								<div class="panel-body">
									<div class="thumbnail">
										<a href="assets/images/placeholder.jpg" data-popup="lightbox">
											<img src="<?php echo base_url();?>product_images/<?php echo $img;?>" alt="">
										</a>
									</div>
								</div>
							</div>
					  </div>	
					  <input id="old_img_<?php echo $total_product;?>" type="hidden" name="old_sub_images[]" value="<?php echo $img;?>">
					 <!------------------>
                  
				<?php 
								if($total_product==count($sub_images))
								 break;
							 }
							 echo '</div>';
						    
						 }
					 
					 }
				  ?>
				  

                  <div id="more_images">
				  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label"></label>
                     <div class="col-lg-9">
                        <span><a id="add_more_image" href="#">Add More Product Sub Images</a></span>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Old Price:</label>
                     <div class="col-lg-9">
                        <input type="text"  name="old_price" value="<?php echo $product_data['old_price']; ?>" class="form-control" placeholder="Product Old Price">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">New Price:</label>
                     <div class="col-lg-9">
                        <input type="text"  name="new_price" value="<?php echo $product_data['new_price']; ?>" class="form-control" placeholder="Product New Price">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Quantity:</label>
                     <div class="col-lg-9">
                        <input type="text"  name="qty" class="form-control" value="<?php echo $product_data['qty']; ?>" placeholder="Product Quantity">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Description:</label>
                     <div class="col-lg-9">
                        <textarea id="description" name="description" class="col-lg-3 control-label"><?php echo $product_data['description']; ?></textarea>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Active Status:</label>
                     <div class="col-lg-9">
                        <select class='form-control' name='status'>
                           <option <?php if($product_data['status']==1){ echo "selected"; } ?> value='1'>Active</option>
                           <option <?php if($product_data['status']==0){ echo "selected"; } ?> value='0'>Inctive</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Featured:</label>
                     <div class="col-lg-9">
                        <select class='form-control' name='featured'>
                           <option <?php if($product_data['featured']==1){ echo "selected"; } ?> value='1'>Yes</option>
                           <option <?php if($product_data['featured']==0){ echo "selected"; } ?> value='0'>No</option>
                        </select>
                     </div>
                  </div>
                  <div class="text-right">
                     <button type="submit" name="btn" value="updateproduct" class="btn btn-primary">Update<i class="icon-arrow-right14 position-right"></i></button>
                  </div>
               </div>
               <!--</form>-->
               <?php echo form_close();?>
            </div>
            <!-- /basic layout -->
         </div>
      </div>
      <!-- /vertical form options -->
      <!-- Footer -->
      <?php
         $this->load->view("common/footer-text");
         ?>
      <!-- /footer -->
   </div>
   <!-- /content area -->
</div>
<script>
   CKEDITOR.replace( 'description');
</script>
<script>
$(document).ready(function(){

   $("#parent_category_id").change(function(){
	  var parent_category_id=$(this).val();
	  jQuery.ajax({
                  type:'POST',
                  url:'<?php echo site_url();?>admin/eshop/getAjaxSubCategory',
				  data:{'parent_category_id':parent_category_id},
                  async:false,
                  beforeSend: function () {
                       $.loader("on", '<?php echo site_url();?>admin_assets/images/default.svg');
                     },
                  
				  success:function(res){
					
					var option='<option value="">-Select Sub Category-</option>';  
					
					$("#sub_category_id").children().remove();					 
					 $(res).each(function(key,obj){
						  
						  option +='<option value="'+obj.id+'">'+obj.subcategory_name+'</option>';
					  })
					$("#sub_category_id").append(option);  
                  },//end success
                  complete: function () {
                       $.loader("off", '<?php echo site_url();?>admin_assets/images/default.svg');
                   }
             });//end ajax
   });//end change	
});//end ready
   $(document).ready(function(){
   	<?php 
	if(!empty($sub_images) && count($sub_images))
	{
	?>
	var i='<?php echo count($sub_images);?>';
	<?php 
	}
	else 
	{
	?>
	var i=0;
	<?php 
	}
	?>
   	$("#add_more_image").click(function(){
   		i++;
   		var img='<div class="form-group" id="product_'+i+'">';
               img +='<label class="col-lg-3 control-label">Product Sub Image:</label>';
               img +='<div class="col-lg-9">';
               img +='<input name="sub_img[]" type="file" class="file-input1">';
   			img +='<span><a onclick="return remove_sub_image('+i+')" href="#">Remove</a></span>';
               img +='</div>';
   			img +='</div>';
   		
   		$("#more_images").append(img);		
   		set_type();
   		return false;
   	});
   	$(".remove_old_image").click(function(){
		var img_name=$(this).attr('img_name');
		alert(img_name);
		$("input#"+img_name).remove();
		return false;
			
	});
   });//end ready
   function remove_sub_image(ob)
   {
   	var obj="product_"+ob;
   	$("#"+obj).remove();
   	return false;
   }
   function set_type()
   {
   	////////////////
   // Basic example
       $('.file-input1').fileinput({
           browseLabel: '',
           browseClass: 'btn btn-primary btn-icon',
           removeLabel: '',
           uploadLabel: '',
           uploadClass: 'btn btn-default btn-icon',
           browseIcon: '<i class="icon-plus22"></i> ',
           uploadIcon: '<i class="icon-file-upload"></i> ',
           removeClass: 'btn btn-danger btn-icon',
           removeIcon: '<i class="icon-cancel-square"></i> ',
           layoutTemplates: {
               caption: '<div tabindex="-1" class="form-control file-caption {class}">\n' + '<span class="icon-file-plus kv-caption-icon"></span><div class="file-caption-name"></div>\n' + '</div>'
           },
           initialCaption: "No file selected"
       });
   
   
       // With preview
       $(".file-input-preview").fileinput({
           browseLabel: '',
           browseClass: 'btn btn-primary btn-icon',
           removeLabel: '',
           uploadLabel: '',
           uploadClass: 'btn btn-default btn-icon',
           browseIcon: '<i class="icon-plus22"></i> ',
           uploadIcon: '<i class="icon-file-upload"></i> ',
           removeClass: 'btn btn-danger btn-icon',
           removeIcon: '<i class="icon-cancel-square"></i> ',
           layoutTemplates: {
               caption: '<div tabindex="-1" class="form-control file-caption {class}">\n' + '<span class="icon-file-plus kv-caption-icon"></span><div class="file-caption-name"></div>\n' + '</div>'
           },
           initialPreview: [
               "<img src='assets/images/placeholder.jpg' class='file-preview-image' alt=''>",
               "<img src='assets/images/placeholder.jpg' class='file-preview-image' alt=''>",
           ],
           overwriteInitial: false,
           maxFileSize: 100
       });
   
   
       // Display preview on load
       $(".file-input-overwrite").fileinput({
           browseLabel: '',
           browseClass: 'btn btn-primary btn-icon',
           removeLabel: '',
           uploadLabel: '',
           uploadClass: 'btn btn-default btn-icon',
           browseIcon: '<i class="icon-plus22"></i> ',
           uploadIcon: '<i class="icon-file-upload"></i> ',
           removeClass: 'btn btn-danger btn-icon',
           removeIcon: '<i class="icon-cancel-square"></i> ',
           layoutTemplates: {
               caption: '<div tabindex="-1" class="form-control file-caption {class}">\n' + '<span class="icon-file-plus kv-caption-icon"></span><div class="file-caption-name"></div>\n' + '</div>'
           },
           initialPreview: [
               "<img src='assets/images/placeholder.jpg' class='file-preview-image' alt=''>",
               "<img src='assets/images/placeholder.jpg' class='file-preview-image' alt=''>",
           ],
           overwriteInitial: true
       });
   
   
       // Custom layout
       $('.file-input-custom').fileinput({
           previewFileType: 'image',
           browseLabel: 'Select',
           browseClass: 'btn bg-slate-700',
           browseIcon: '<i class="icon-image2 position-left"></i> ',
           removeLabel: 'Remove',
           removeClass: 'btn btn-danger',
           removeIcon: '<i class="icon-cancel-square position-left"></i> ',
           uploadClass: 'btn bg-teal-400',
           uploadIcon: '<i class="icon-file-upload position-left"></i> ',
           layoutTemplates: {
               caption: '<div tabindex="-1" class="form-control file-caption {class}">\n' + '<span class="icon-file-plus kv-caption-icon"></span><div class="file-caption-name"></div>\n' + '</div>'
           },
           initialCaption: "No file selected"
       });
   
   
       // Advanced example
       $('.file-input-advanced').fileinput({
           browseLabel: 'Browse',
           browseClass: 'btn btn-default',
           removeLabel: '',
           uploadLabel: '',
           browseIcon: '<i class="icon-plus22 position-left"></i> ',
           uploadClass: 'btn btn-primary btn-icon',
           uploadIcon: '<i class="icon-file-upload"></i> ',
           removeClass: 'btn btn-danger btn-icon',
           removeIcon: '<i class="icon-cancel-square"></i> ',
           initialCaption: "No file selected",
           layoutTemplates: {
               caption: '<div tabindex="-1" class="form-control file-caption {class}">\n' + '<span class="icon-file-plus kv-caption-icon"></span><div class="file-caption-name"></div>\n' + '</div>',
               main1: "{preview}\n" +
               "<div class='input-group {class}'>\n" +
               "   <div class='input-group-btn'>\n" +
               "       {browse}\n" +
               "   </div>\n" +
               "   {caption}\n" +
               "   <div class='input-group-btn'>\n" +
               "       {upload}\n" +
               "       {remove}\n" +
               "   </div>\n" +
               "</div>"
           }
       });
   
   
       // Disable/enable button
       $("#btn-modify").on("click", function() {
           $btn = $(this);
           if ($btn.text() == "Disable file input") {
               $("#file-input-methods").fileinput("disable");
               $btn.html("Enable file input");
               alert("Hurray! I have disabled the input and hidden the upload button.");
           }
           else {
               $("#file-input-methods").fileinput("enable");
               $btn.html("Disable file input");
               alert("Hurray! I have reverted back the input to enabled with the upload button.");
           }
       });
   
   
       // Custom file extensions
       $(".file-input-extensions").fileinput({
           browseLabel: 'Browse',
           browseClass: 'btn btn-primary',
           removeLabel: '',
           browseIcon: '<i class="icon-plus22 position-left"></i> ',
           uploadIcon: '<i class="icon-file-upload position-left"></i> ',
           removeClass: 'btn btn-danger btn-icon',
           removeIcon: '<i class="icon-cancel-square"></i> ',
           layoutTemplates: {
               caption: '<div tabindex="-1" class="form-control file-caption {class}">\n' + '<span class="icon-file-plus kv-caption-icon"></span><div class="file-caption-name"></div>\n' + '</div>'
           },
           initialCaption: "No file selected",
           maxFilesNum: 10,
           allowedFileExtensions: ["jpg", "gif", "png", "txt"]
       });	
   	
   	//////////////////
   }
</script>
<style>
   button.btn.btn-default.btn-icon.kv-fileinput-upload{
   display: none;
   }
   .file-preview-old {
   /*border-radius: 2px;
   border: 1px solid #ddd;*/
   width: 100%;
   margin-bottom: 20px;
   position: relative;
   }
</style>
<script>
   $(document).ready(function(){
   	$(".file-caption-name").text("No Profile Pic Selected");
   });//end ready
</script>