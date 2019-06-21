<?php 	


	$ewf_page_id = ewf_get_page_relatedID();
	
	$ewf_header_image_id = ewf_getHeaderImageID($ewf_page_id);
	$ewf_header_image = wp_get_attachment_image_src($ewf_header_image_id,'page-header');  
	
	if ($ewf_header_image_id){
		echo '
		<div id="page-header">
			<img src="'.$ewf_header_image[0].'" width="1000" height="180" alt="" />
		</div>';
	}else{
		echo '<div class="hr-header"></div>';
	}
	
	
?>