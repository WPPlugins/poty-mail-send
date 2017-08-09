<div class="inner-sidebar">

			<div class="postbox">
				<h3><span><?php _e('Users');?></span></h3>
				<div class="inside">
					<?php
						global $wpdb;
   						$table_name = $wpdb->prefix."users";
						$results="SELECT * from ".$table_name;
						$results=mysql_query($results);
					//$row=mysql_fetch_array($results);
					
					if(mysql_num_rows($results)>0)
					{
					echo '<ul class="users">';
					while($row=mysql_fetch_assoc($results))
					{
					echo '<li title="'.$row['user_email'].'">'.$row['user_login'].' ('.$row['user_email'].')</li>';
					}
					echo '</ul>';
					}
						?>
				</div>
			</div>

			<div class="postbox">
				<h3><span><?php _e('Info'); ?></span></h3>
				<div class="inside">
					<p><a href="https://twitter.com/jmmupl" class="twitter-follow-button" data-show-count="false" data-lang="en" data-size="large">Follow @jmmupl</a></p>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                    <p><?php _e('Have an idea?'); ?> <a class="button" href="mailto:dev.jmmunozpl@gmail.com"><?php _e('Tell us about it!'); ?></a></p>
				</div>
			</div>
            
            
            
            

			<!-- ... more boxes ... -->

		</div>