<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo htmlspecialchars(($seoTitle !== "") ? $seoTitle : ""); ?></title>
	<base href="{{base_url}}" />
			<meta name="viewport" content="width=992" />
		<meta name="description" content="<?php echo htmlspecialchars(($seoDescription !== "") ? $seoDescription : ""); ?>" />
	<meta name="keywords" content="<?php echo htmlspecialchars(($seoKeywords !== "") ? $seoKeywords : ""); ?>" />
		<!-- Facebook Open Graph -->
	<meta property="og:title" content="<?php echo htmlspecialchars(($seoTitle !== "") ? $seoTitle : ""); ?>" />
	<meta property="og:description" content="<?php echo htmlspecialchars(($seoDescription !== "") ? $seoDescription : ""); ?>" />
	<meta property="og:image" content="<?php echo htmlspecialchars(($seoImage !== "") ? "{{base_url}}".$seoImage : ""); ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="{{curr_url}}" />
	<!-- Facebook Open Graph end -->
		
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/main.js?v=20200929135742" type="text/javascript"></script>

	<link href="css/font-awesome/font-awesome.min.css?v=4.7.0" rel="stylesheet" type="text/css" />
	<link href="css/site.css?v=20200929135740" rel="stylesheet" type="text/css" id="wb-site-stylesheet" />
	<link href="css/common.css?ts=1603144399" rel="stylesheet" type="text/css" />
	<link href="css/1.css?ts=1603144399" rel="stylesheet" type="text/css" id="wb-page-stylesheet" />
	<ga-code/>
	<script type="text/javascript">
	window.useTrailingSlashes = true;
</script>
	
	<link href="css/flag-icon-css/css/flag-icon.min.css" rel="stylesheet" type="text/css" />	
	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<![endif]-->

	</head>


<body class="site <?php if (isset($wbPopupMode) && $wbPopupMode) echo ' popup-mode'; ?> " <?php if (isset($wbLandingPage) && $wbLandingPage) echo ' data-landing-page="'.$wbLandingPage.'"'; ?>><div class="root"><div class="vbox wb_container" id="wb_header">
	
<div class="wb_cont_inner"><div id="wb_element_instance0" class="wb_element wb_text_element" style=" line-height: normal;"><h4 class="wb-stl-custom11">This Weekend!</h4>
</div><div id="wb_element_instance3" class="wb_element wb-elm-orient-horizontal"><div class="wb-elm-line"></div></div></div><div class="wb_cont_outer"></div><div class="wb_cont_bg"></div></div>
<div class="vbox wb_container" id="wb_main">
	
<div class="wb_cont_inner"><div id="wb_element_instance1" class="wb_element wb_element_picture" title=""><img alt="gallery/xb" src="gallery_gen/d1029f0c883d670a97ce7f4207183b60_3000x2486.3304534726.jpg"></div><div id="wb_element_instance4" class="wb_element wb_text_element" style=" line-height: normal;"><h5 class="wb-stl-subtitle" style="text-align: center;"><span style="color:rgba(255,255,255,1);">Website Coming Soon!</span></h5>
</div><div id="wb_element_instance5" class="wb_element wb_text_element" style=" line-height: normal;"><p class="wb-stl-normal" style="text-align: center;">Xbulon Health &amp; Wealth Community is a social community where people from all parts of the globe meet, with the sole purpose of transacting and acquiring wealth while attaining healthy living.</p>

<p class="wb-stl-normal" style="text-align: center;">We are an online community where people from all parts of the globe, live, meet and transact goods and services through mutual networking.</p>
</div><div id="wb_element_instance6" class="wb_element wb_element_picture" title=""><img alt="gallery/xbulon main logo" src="gallery_gen/8d6d1188448149d803d8f8e4618c8d36_1020x515.40636042403.png"></div><div id="wb_element_instance7" class="wb_element"><form class="wb_form" method="post" enctype="multipart/form-data"><input type="hidden" name="wb_form_id" value="4dd4fdad"><textarea name="message" rows="3" cols="20" class="hpc" autocomplete="off"></textarea><table><tr><th class="wb-stl-custom4">Name&nbsp;&nbsp;</th><td><input type="hidden" name="wb_input_0" value="Name"><input class="form-control form-field" type="text" value="" name="wb_input_0" required="required"></td></tr><tr><th class="wb-stl-custom4">E-mail&nbsp;&nbsp;</th><td><input type="hidden" name="wb_input_1" value="E-mail"><input class="form-control form-field" type="text" value="" name="wb_input_1" required="required"></td></tr><tr class="area-row"><th class="wb-stl-custom4">Message&nbsp;&nbsp;</th><td><input type="hidden" name="wb_input_2" value="Message"><textarea class="form-control form-field form-area-field" rows="3" cols="20" name="wb_input_2" required="required"></textarea></td></tr><tr><th class="wb-stl-custom4">Attachments&nbsp;&nbsp;</th><td><div class="form-file-wrapper"><input class="form-field form-control" type="file" multiple name="wb_input_3[]"></div></td></tr><tr class="form-footer"><td colspan="2"><button type="submit" class="btn btn-default">Submit</button></td></tr></table><input type="hidden" name="MAX_FILE_SIZE" value="2097152"><?php if (isset($wbPopupMode) && $wbPopupMode): ?><input type="hidden" name="wb_popup_mode" value="1" /><?php endif; ?></form><script type="text/javascript">
			<?php $wb_form_id = popSessionOrGlobalVar("wb_form_id"); if ($wb_form_id == "4dd4fdad") { ?>
				<?php $wb_form_send_success = popSessionOrGlobalVar("wb_form_send_success"); ?>
				var formValues = <?php echo json_encode(popSessionOrGlobalVar("post")); ?>;
				var formErrors = <?php echo json_encode(popSessionOrGlobalVar("formErrors")); ?>;
				wb_form_validateForm("4dd4fdad", formValues, formErrors);
				<?php if (($wb_form_send_state = popSessionOrGlobalVar("wb_form_send_state"))) { ?>
					<?php if (($wb_form_popup_mode = popSessionOrGlobalVar("wb_form_popup_mode"))) { ?>
					if (window !== window.parent && window.parent.postMessage) {
						var data = {
							event: "wb_contact_form_sent",
							data: {
								state: "<?php echo str_replace('"', '\"', $wb_form_send_state); ?>",
								type: "<?php echo $wb_form_send_success ? "success" : "danger"; ?>"
							}
						};
						window.parent.postMessage(data, "<?php echo str_replace('"', '\"', popSessionOrGlobalVar("wb_target_origin")); ?>");
					}
					<?php } else { ?>
					wb_show_alert("<?php echo str_replace(array('"', "\r", "\n"), array('\"', "", "<br/>"), $wb_form_send_state); ?>", "<?php echo $wb_form_send_success ? "success" : "danger"; ?>");
					<?php } ?>
					<?php $wb_form_send_success = false; $wb_form_send_state = null; $wb_form_popup_mode = false; ?>
				<?php } ?>
			<?php } ?>
			</script></div><div id="wb_element_instance8" class="wb_element wb_text_element" style=" line-height: normal;"><h1 class="wb-stl-custom5" style="text-align: left;"><span style="color:rgba(255,255,255,1);">Contacts</span></h1></div><div id="wb_element_instance9" class="wb_element wb_text_element" style=" line-height: normal;"><p class="wb-stl-custom4">Address:</p>

<p class="wb-stl-custom4">1730 Main Street, Moncton, NB</p>

<p class="wb-stl-custom4">NB E1E 1G Canada</p>

<p class="wb-stl-custom4"> </p>

<p class="wb-stl-custom4">West Africa</p>

<p class="wb-stl-custom4">Km 22 Alpha Hydrocarbon</p>

<p class="wb-stl-custom4">Abijo GRA Ajah. Lagos. Nigeria </p>
</div><div id="wb_element_instance10" class="wb_element wb_text_element" style=" line-height: normal;"><p class="wb-stl-custom4"> </p>

<p class="wb-stl-custom4">E-mail:</p>

<p class="wb-stl-custom4">info@xbulon.com</p>
</div><div id="wb_element_instance11" class="wb_element wb_text_element" style=" line-height: normal;"><h2 class="wb-stl-custom6"><span style="color:rgba(255,255,255,1);">Get in Touch</span></h2></div><div id="wb_element_instance12" class="wb_element wb_element_picture" title=""><i class="fa fa-envelope-o" style="color:#b0db53"></i></div></div><div class="wb_cont_outer"><div id="wb_element_instance13" class="wb_element wb_element_shape"><a class="wb_shp"></a></div></div><div class="wb_cont_bg"></div></div>
<div class="vbox wb_container" id="wb_footer">
	
<div class="wb_cont_inner" style="height: 155px;"><div id="wb_element_instance2" class="wb_element wb_element_picture" title=""><img alt="gallery/eb6b9f776a4d4ba5802445cd6854d56d.lock" src="gallery_gen/ffad1189f31c72bb56bf71ba120e4a89.png"></div><div id="wb_element_instance14" class="wb_element" style="text-align: center; width: 100%;"><div class="wb_footer"></div><script type="text/javascript">
			$(function() {
				var footer = $(".wb_footer");
				var html = (footer.html() + "").replace(/^\s+|\s+$/g, "");
				if (!html) {
					footer.parent().remove();
					footer = $("#wb_footer, #wb_footer .wb_cont_inner");
					footer.css({height: ""});
				}
			});
			</script></div></div><div class="wb_cont_outer"></div><div class="wb_cont_bg"></div></div><div class="wb_sbg"></div></div>{{hr_out}}</body>
</html>
