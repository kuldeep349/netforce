 <script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/plugins/uploaders/fileinput.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/pages/uploader_bootstrap.js"></script>
<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Property Management</span> - Edit Property</h4>
         </div>
         <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>admin"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="#">Property Management</li>
            <li class="active">Edit Property</li>
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
                  <h5 class="panel-title">Edit Property</h5>
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
                  echo form_open(site_url().$module_name."/Property_management/editProperty",array('method'=>'post','class'=>'form-horizontal', 'enctype'=>'multipart/form-data'));
                  									?>
               <div class="panel-body">
               	<?php ///print_r($product_data); ?>
                  
				  <div class="form-group">
                     <label class="col-lg-3 control-label">Select Property Type <span class="required-field">*</span>:</label>
                     <div class="col-lg-9">
                     	<input type='hidden' value="<?php echo $product_data['prop_id']; ?>" name='hidid' />
                        <select id="property_type" name='property_type' class='form-control'>
                           <option value="">-Select Property Type-</option>
						      <?php
                              foreach($property_type as $protype)
                              {
                              	 if($protype['prop_type_id']==$product_data['property_type_id'])
                              	 {
                                    $selected='selected=""';
                              	 }else
                              	 {
                              	 	$selected='';
                              	 }
                              ?>
                                <option <?php echo $selected; ?> value="<?php echo $protype['prop_type_id']; ?>"><?php echo $protype['prop_type_name']; ?></option>
                              <?php														
                              }
                              ?>
                        </select>
                     </div>
                  </div>
				  
				  
				  <div class="form-group">
                     <label class="col-lg-3 control-label">Select Furnishing Type <span class="required-field">*</span>:</label>
                     <div class="col-lg-9">
                        <select name='furnishing_type' id="furnishing_type" class='form-control'>
                          <option value="">-Select Furnishing Type-</option>
                           <?php
                              foreach($furnishing_type as $furnishtype)
                              {
                              	if($furnishtype['furnishing_type_id']==$product_data['furnishing_type_id'])
                              	 {
                                    $selected='selected=""';
                              	 }else
                              	 {
                              	 	$selected='';
                              	 }
                              ?>
                                <option <?php echo $selected; ?> value="<?php echo $furnishtype['furnishing_type_id']; ?>"><?php echo $furnishtype['furnishing_type_name']; ?></option>
                              <?php														
                              }
                              ?>
						</select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Title <span class="required-field">*</span>:</label>
                     <div class="col-lg-9">
                        <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo $product_data['property_name']; ?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Property Main Image<span class="required-field">*</span>:</label>
                     <div class="col-lg-9">
                      <img width='150' src="<?php echo base_url(); ?>property_images/<?php echo $product_data['property_image']; ?>" /><br><br>
                        <input name='property_image' type="file" class="file-input">
                        <input name='hidden_image' value="<?php echo $product_data['property_image']; ?>" type="hidden">
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
											<img src="<?php echo base_url();?>property_images/<?php echo $img;?>" alt="">
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
						<span><a id="add_more_image" href="#">Add Property Sub Images</a></span>
                     </div>

                     <input id="old_img_<?php echo $total_product;?>" type="hidden" name="old_sub_images[]" value="<?php echo $img;?>">
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Price:</label>
                     <div class="col-lg-9">
                        <input type="text" name="price" class="form-control" placeholder="Property Price" value="<?php echo $product_data['budget']; ?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Short Description<span class="required-field">*</span>:</label>
                     <div class="col-lg-9">
                        <textarea id="description" name="description" class="col-lg-3 control-label">
                        	<?php echo $product_data['short_description']; ?>
                        </textarea>
                     </div>
                  </div>
				  <div class="form-group">
                     <label class="col-lg-3 control-label">Long Description:</label>
                     <div class="col-lg-9">
                        <textarea id="description1" name="long_description" class="col-lg-3 control-label">
                        	<?php echo $product_data['long_description']; ?>
                        </textarea>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Active Status:</label>
                     <div class="col-lg-9">
                        <select class='form-control' name='status'>
                           <option value='1'>Active</option>
                           <option value='0'>Inctive</option>
                        </select>
                     </div>
                  </div>
                  <div class="text-right">
                     <button type="submit" name="btn" value="addNewProduct" class="btn btn-primary">Update <i class="icon-arrow-right14 position-right"></i></button>
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
<style>
.required-field
{
	color:red;font-weight:bold;font-size:16px
}
</style>
<script>
   CKEDITOR.replace( 'description');
   CKEDITOR.replace( 'description1');

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
                       //$.loader("on", '<?php echo site_url();?>admin_assets/images/default.svg');
                     },
                  
				  success:function(res){
					
					var option='<option value="">-Select Sub Category-</option>';  
					$("#sub_category_id").children().remove();
					//alert(res);
					/*$("#sub_category_id").children().remove();					 
					 $(res).each(function(key,obj){
						  var obj1 = JSON.parse(obj);
						  option +='<option value="'+obj.id+'">'+obj.subcategory_name+'</option>';
					  })
					  alert(option);
					$("#sub_category_id").append(option); */ 
					$("#sub_category_id").html(res);
                  },//end success
                  complete: function () {
                       $.loader("off", '<?php echo site_url();?>admin_assets/images/default.svg');
                   }
             });//end ajax
   });//end change	
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
		//alert(img_name);
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
<script>
   <?php 
   if(!empty($all_level_commission) && count($all_level_commission)>0)
   {
   ?>
   var level='<?php echo count($all_level_commission);?>';
   <?php    
   }
   else 
   {
   ?>
   var level='1';
   <?php    
   }
   ?>
   function remove_level(levels)
   {
     $("#level_"+levels).remove();
     /////////////////
     level=1; 
     $('.level_label').each(function(){
       level++;
       $(this).html("level"+level+":");
     });
     ////////////////
     level=1;
     $(".level_group").each(function(){
       level++;
       $(this).attr('id',"level_"+level);
     });
     //////////////////
     level=1;
     $(".level_input").each(function(){
        level++;
        $(this).attr("placeholder","Level "+level+" Commission");
     });
     ////////////////////
     level=1;
     $(".remove_level_click").each(function(){
      level++;
      $(this).attr('onclick',"return remove_level("+level+")");
     });
     return false;
   }
   $(document).ready(function(){
      /////////Level type code start from here/////////////////////
      $("input[class=level_type]").click(function(){
         var level_type=$(this).val();
         //level_type==0=>unlimited, level_type==1=>limited 
         if(level_type==0)
         {
            var unlimited_level_div='<div class="form-group">';
            unlimited_level_div +='<label class="col-lg-3 control-label">Commission:</label>';
            unlimited_level_div +='<div class="col-lg-9">';
            unlimited_level_div +='<input required type="text" name="commission" id="commission" class="form-control" placeholder="Commission">';
            unlimited_level_div +='</div>';
            unlimited_level_div +='</div>';
            $("#unlimited_level_div").html(unlimited_level_div);
            $("#add_more_group").css('display','none');
            $("#limited_level_div").children().remove();
            level=1;
         }
         else 
         {
            var limited_level_div='<div class="form-group">';
            limited_level_div +='<label class="col-lg-3 control-label">Level1:</label>';
            limited_level_div +='<div class="col-lg-9">';
            limited_level_div +='<input required type="text" name="level_commission[]" class="form-control" placeholder="Level 1 Commission">';
            limited_level_div +='</div>';
            limited_level_div +='</div>';
            $("#limited_level_div").html(limited_level_div);
            $("#add_more_group").css('display','');
            $("#unlimited_level_div").children().remove();
         }
      })//end of level type click 
      
      $("#add_more_level").click(function(){
            level++;
            var limited_level_div='<div class="form-group level_group" id="level_'+level+'">';
            limited_level_div +='<label class="col-lg-3 control-label level_label">Level '+level+':</label>';
            limited_level_div +='<div class="col-lg-9">';
            limited_level_div +='<input required type="text" name="level_commission[]" class="form-control level_input" placeholder="Level '+level+' Commission">';
            limited_level_div +='<a href="#" class="remove_level_click" onclick="return remove_level('+level+')">Remove</a></div>';
            limited_level_div +='</div>';
            $("#limited_level_div").append(limited_level_div);
            return false;
      });//end add more level click here
      /////////////////////////////////////////////////////////////
   });//end ready
</script>