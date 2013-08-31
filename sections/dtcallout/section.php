<?php
/*
	Section: Details Callout
	Author: James Giroux
	Author URI: http://jamesgiroux.ca
	Description: A quick call to action for your users
	Class Name: dtCallout
	Filter: component
	Loading: active
*/

class dtCallout extends PageLinesSection {

	var $tabID = 'highlight_meta';


	function section_opts(){
		$opts = array(
			array(
				'type' 			=> 'select',
				'title' 		=> 'Select Format',
				'key'			=> 'dtcallout_format',
				'label' 		=> __( 'Callout Format', 'pagelines' ),
				'opts'=> array(
					'top'			=> array( 'name' => __( 'Text on top of button', 'pagelines' ) ),
					'inline'	 	=> array( 'name' => __( 'Text/Button Inline', 'pagelines' ) )
				),
			),
			array(
				'type' 			=> 'multi',
				'title' 		=> __( 'Callout Text', 'pagelines' ),
				'opts'	=> array(
					array(
						'key'			=> 'dtcallout_text',
						'type' 			=> 'text',
						'label' 		=> __( 'Callout Text', 'pagelines' ),
					),

				)
			),
			array(
				'type' 			=> 'multi',
				'title' 		=> 'Link/Button',
				'opts'	=> array(

					 array(
						'key'			=> 'dtcallout_link',
						'type' 			=> 'text',
						'label'			=> __( 'URL', 'pagelines' )
					),
					array(
						'key'			=> 'dtcallout_link_text',
						'type' 			=> 'text',
						'label'			=> __( 'Text on Button', 'pagelines' )
					),
					array(
						'key'			=> 'dtcallout_btn_theme',
						'type' 			=> 'select_button',
						'default'		=> 'details',
						'label'			=> __( 'Button Color', 'pagelines' ),
					),

				)
			)

		);

		return $opts;

	}

	function section_template() {

		$text = $this->opt('dtcallout_text');
		$format = ( $this->opt('dtcallout_format') ) ? 'format-'.$this->opt('dtcallout_format') : 'format-inline';
		$link = $this->opt('dtcallout_link');
		$theme = ($this->opt('dtcallout_btn_theme')) ? $this->opt('dtcallout_btn_theme') : 'btn-details';
		$link_text = ( $this->opt('dtcallout_link_text') ) ? $this->opt('dtcallout_link_text') : 'Learn More <i class="icon-angle-right"></i>';

		if(!$text && !$link){
			$text = __("Call to action!", 'pagelines');
		}

		?>
		<div class="dtcallout-container <?php echo $format;?>">

			<h2 class="dtcallout-head" data-sync="dtcallout_text"><?php echo $text; ?></h2>
			<a class="dtcallout-action btn <?php echo $theme;?> btn-large" href="<?php echo $link; ?>"  data-sync="dtcallout_link_text"><?php echo $link_text; ?></a>

		</div>
	<?php

	}
}