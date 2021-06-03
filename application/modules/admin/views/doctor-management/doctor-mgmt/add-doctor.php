 <script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/plugins/uploaders/fileinput.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>admin_assets/assets/js/pages/uploader_bootstrap.js"></script>
<div class="content-wrapper">
   <!-- Page header -->
   <div class="page-header">
      <div class="page-header-content">
         <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Product Management</span> - Add New Product</h4>
         </div>
         <a class="heading-elements-toggle"><i class="icon-menu"></i></a>
      </div>
      <div class="breadcrumb-line">
         <ul class="breadcrumb">
            <li><a href="<?php echo site_url();?>admin"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="#">Doctor Management</li>
            <li class="active">Add New Doctor</li>
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
                  <h5 class="panel-title">Add New Doctor</h5>
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
                  echo form_open(site_url().$module_name."/Doctor_Management/addNewDoctor",array('method'=>'post','class'=>'form-horizontal', 'enctype'=>'multipart/form-data'));
                  									?>
               <div class="panel-body">
                <div class="form-group">
                     <label class="col-lg-3 control-label">Select Product Main Category <span class="required-field">*</span>:</label>
                     <div class="col-lg-9">
                        <select id="parent_category_id" name='parent_category_id' class='form-control'>
                           <option value="">-Select Category-</option>
						      <?php
                              foreach($all_category as $cat)
                              {
                              ?>
                                <option value="<?php echo $cat['cat_id']; ?>"><?php echo $cat['category_name']; ?></option>
                              <?php														
                              }
                              ?>
                        </select>
                     </div>
                  </div>
				         <div class="form-group">
                     <label class="col-lg-3 control-label">Select Product Sub Category <span class="required-field">*</span>:</label>
                     <div class="col-lg-9">
                        <select name='category_id' id="sub_category_id" class='form-control'>
                          <option value="">-Select Sub Category-</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Doctor Name <span class="required-field">*</span>:</label>
                     <div class="col-lg-9">
                        <input type="text" name="doctor_name" class="form-control" placeholder="Doctor Name">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Doctor Email <span class="required-field">*</span>:</label>
                     <div class="col-lg-9">
                        <input type="email" name="doctor_email" class="form-control" placeholder="Doctor Email">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Doctor Phone <span class="required-field">*</span>:</label>
                     <div class="col-lg-9">
                        <input type="text" name="doctor_phone" class="form-control" placeholder="Doctor Phone">
                     </div>
                  </div>
                   <div class="form-group">
                     <label class="col-lg-3 control-label">Doctor Specialty <span class="required-field">*</span>:</label>
                     <div class="col-lg-9">
                        <input type="text" name="doctor_specialty" class="form-control" placeholder="Doctor Specialty">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Doctor Image<span class="required-field">*</span>:</label>
                     <div class="col-lg-9">
                        <input name='doctor_image' type="file" class="file-input">
                     </div>
					 
                  </div>
				  <div id="more_images">
				   
				  
				  </div>
				  <!---div class="form-group">
				   <label class="col-lg-3 control-label"></label>
                     <div class="col-lg-9">
						<span><a id="add_more_image" href="#">Add Product Sub Images</a></span>
                     </div>
					 
                  </div--->
				  
				  
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Doctor Fee:</label>
                     <div class="col-lg-9">
                        <input type="text"  name="doctor_fee" class="form-control" placeholder="Doctor Fee">
                     </div>
                  </div>
                  
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Doctor Time Detail<span class="required-field">*</span>:</label>
                     <div class="col-lg-9">
                        <div class='input-group date-time' id='datetimepicker1'>
                         <input type='text' name="DoctorTime[]" class="form-control" />
                         <span class="input-group-addon">
                         <span class="glyphicon glyphicon-calendar"></span>
                         </span>
                      </div>
                        
                     </div>
                  </div>
                  <div id="add-doctor-time">

                   </div> 
                   <div class="form-group">
                     <div class="row">
                      <div class="col-lg-3"> 
                       </div> 
                      <div class="col-lg-9"> 
                        <span><a id="add_doctor_time" href="#">Add Doctor Time</a></span>
                      </div>
                     </div>
                   </div>
				          <div class="form-group">
                     <label class="col-lg-3 control-label">Description:</label>
                     <div class="col-lg-9">
                        <textarea id="description" name="long_description" class="col-lg-3 control-label"></textarea>
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
                     <button type="submit" name="btn" value="addNewProduct" class="btn btn-primary">Add <i class="icon-arrow-right14 position-right"></i></button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
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
                  url:'<?php echo site_url();?>admin/Doctor_Management/getAjaxSubCategory',
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
$(document).ready(function(){
	var i=1;
	$("#add_doctor_time").click(function(){
		////$(this).text("Add More Product Sub Images")
		i++;
		var time='<div class="form-group" id="date-time-'+i+'">';
            time +='<label class="col-lg-3 control-label">Doctor Time Detail:</label>';
            time +='<div class="col-lg-9">';
            time +='<div class="input-group date-time" id="datetimepicker'+i+'">';
            time +=' <input type="text" name="DoctorTime[]" class="form-control" placeholder="Doctor Fee">';
            time +='<span class="input-group-addon">';
            time +='<span class="glyphicon glyphicon-calendar"></span>';
            time +='</span>';
            time +='</div>';
			time +='<span><a onclick="return remove_sub_image('+i+')" href="#">Remove</a></span>';
            time +='</div>';
			time +='</div>';
		
		$("#add-doctor-time").append(time);		
		set_type();
		return false;
	});
	
});
function remove_sub_image(ob)
{
	var obj="date-time-"+ob;
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
  $(document).on('click','.date-time',function(e)
  {
    var dateTextId=$(this).attr("id");
    $('#'+dateTextId).datetimepicker();
  });
</script>	
<script>
   var level=1;
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

