
jQuery(document).ready(function() {
   jQuery(".users li").click(

  				function () {
					$tmp_para=jQuery("#to").attr("value");
				
					
					if($tmp_para.indexOf(jQuery(this).attr("title"))<0){
					
						if($tmp_para!=""){
								$tmp_para=$tmp_para+","+jQuery(this).attr("title");
						}else{
								$tmp_para=$tmp_para+jQuery(this).attr("title");
						}		
							jQuery("#to").attr("value",$tmp_para);
							
					}
							
																
  				}

			);
});