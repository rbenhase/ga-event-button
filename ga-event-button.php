<?php
/**
 * Google Analytics Event Tracking Button Module
 *
 * Intended for use with the Beaver Builder plugin,
 * along with the Beaver Brewer addon plugin.
 * See link below for more details.
 *
 * @author Ryan Benhase
 * @link http://beaverbrewer.com
 */

/**
 * @class GAEventButton
 */
class GAEventButton extends FLBuilderModule {

	/**
	 * @method __construct
	 */
	public function __construct()
	{
		parent::__construct(array(
			'name'          	=> __('Button with GA Event Tracking', 'fl-builder'),
			'description'   	=> __('A button that triggers a Google Analytics event.', 'fl-builder'),
			'category'      	=> __('Basic Modules', 'fl-builder'),
			'partial_refresh'	=> true
		));
	}

	/**
	 * @method get_classname
	 */
	public function get_classname()
	{
		$classname = 'fl-button-wrap';

		if(!empty($this->settings->width)) {
			$classname .= ' fl-button-width-' . $this->settings->width;
		}
		if(!empty($this->settings->align)) {
			$classname .= ' fl-button-' . $this->settings->align;
		}
		if(!empty($this->settings->icon)) {
			$classname .= ' fl-button-has-icon';
		}

		return $classname;
	}
}

/**
 * Register the module and its form settings.
 */
FLBuilder::register_module('GAEventButton', array(
	'general'       => array(
		'title'         => __('General', 'fl-builder'),
		'sections'      => array(
			'general'       => array(
				'title'         => '',
				'fields'        => array(
					'text'          => array(
						'type'          => 'text',
						'label'         => __('Text', 'fl-builder'),
						'default'       => __('Click Here', 'fl-builder'),
						'preview'         => array(
							'type'            => 'text',
							'selector'        => '.fl-button-text'
						)
					),
					'icon'          => array(
						'type'          => 'icon',
						'label'         => __('Icon', 'fl-builder'),
						'show_remove'   => true
					),
					'icon_position' => array(
						'type'          => 'select',
						'label'         => __('Icon Position', 'fl-builder'),
						'default'       => 'before',
						'options'       => array(
							'before'        => __('Before Text', 'fl-builder'),
							'after'         => __('After Text', 'fl-builder')
						)
					),
					'icon_animation' => array(
						'type'          => 'select',
						'label'         => __('Icon Visibility', 'fl-builder'),
						'default'       => 'disable',
						'options'       => array(
							'disable'        => __('Always Visible', 'fl-builder'),
							'enable'         => __('Fade In On Hover', 'fl-builder')
						)
					)
				)
			),
			'link'          => array(
				'title'         => __('Link', 'fl-builder'),
				'fields'        => array(
					'link'          => array(
						'type'          => 'link',
						'label'         => __('Link', 'fl-builder'),
						'placeholder'   => __( 'http://www.example.com', 'fl-builder' ),
						'preview'       => array(
							'type'          => 'none'
						)
					),
					'link_target'   => array(
						'type'          => 'select',
						'label'         => __('Link Target', 'fl-builder'),
						'default'       => '_self',
						'options'       => array(
							'_self'         => __('Same Window', 'fl-builder'),
							'_blank'        => __('New Window', 'fl-builder')
						),
						'preview'       => array(
							'type'          => 'none'
						)
					)
				)
			)
		)
	),
	'style'         => array(
		'title'         => __('Style', 'fl-builder'),
		'sections'      => array(
			'colors'        => array(
				'title'         => __('Colors', 'fl-builder'),
				'fields'        => array(
					'bg_color'      => array(
						'type'          => 'color',
						'label'         => __('Background Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true
					),
					'bg_hover_color' => array(
						'type'          => 'color',
						'label'         => __('Background Hover Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'none'
						)
					),
					'text_color'    => array(
						'type'          => 'color',
						'label'         => __('Text Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true
					),
					'text_hover_color' => array(
						'type'          => 'color',
						'label'         => __('Text Hover Color', 'fl-builder'),
						'default'       => '',
						'show_reset'    => true,
						'preview'       => array(
							'type'          => 'none'
						)
					)
				)
			),
			'style'         => array(
				'title'         => __('Style', 'fl-builder'),
				'fields'        => array(
					'style'         => array(
						'type'          => 'select',
						'label'         => __('Style', 'fl-builder'),
						'default'       => 'flat',
						'options'       => array(
							'flat'          => __('Flat', 'fl-builder'),
							'gradient'      => __('Gradient', 'fl-builder'),
							'transparent'   => __('Transparent', 'fl-builder')
						),
						'toggle'        => array(
							'transparent'   => array(
								'fields'        => array('bg_opacity', 'bg_hover_opacity', 'border_size')
							)
						)
					),
					'border_size'   => array(
						'type'          => 'text',
						'label'         => __('Border Size', 'fl-builder'),
						'default'       => '2',
						'description'   => 'px',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '0'
					),
					'bg_opacity'    => array(
						'type'          => 'text',
						'label'         => __('Background Opacity', 'fl-builder'),
						'default'       => '0',
						'description'   => '%',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '0'
					),
					'bg_hover_opacity'    => array(
						'type'          => 'text',
						'label'         => __('Background Hover Opacity', 'fl-builder'),
						'default'       => '0',
						'description'   => '%',
						'maxlength'     => '3',
						'size'          => '5',
						'placeholder'   => '0'
					),
					'button_transition'         => array(
						'type'          => 'select',
						'label'         => __('Transition', 'fl-builder'),
						'default'       => 'disable',
						'options'       => array(
							'disable'        => __('Disabled', 'fl-builder'),
							'enable'         => __('Enabled', 'fl-builder')
						)
					)
				)  
			),
			'formatting'    => array(
				'title'         => __('Structure', 'fl-builder'),
				'fields'        => array(
					'width'         => array(
						'type'          => 'select',
						'label'         => __('Width', 'fl-builder'),
						'default'       => 'auto',
						'options'       => array(
							'auto'          => _x( 'Auto', 'Width.', 'fl-builder' ),
							'full'          => __('Full Width', 'fl-builder'),
							'custom'        => __('Custom', 'fl-builder')
						),
						'toggle'        => array(
							'auto'          => array(
								'fields'        => array('align')
							),
							'full'          => array(),
							'custom'        => array(
								'fields'        => array('align', 'custom_width')
							)
						)
					),
					'custom_width'  => array(
						'type'          => 'text',
						'label'         => __('Custom Width', 'fl-builder'),
						'default'       => '200',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'align'         => array(
						'type'          => 'select',
						'label'         => __('Alignment', 'fl-builder'),
						'default'       => 'left',
						'options'       => array(
							'center'        => __('Center', 'fl-builder'),
							'left'          => __('Left', 'fl-builder'),
							'right'         => __('Right', 'fl-builder')
						)
					),
					'font_size'     => array(
						'type'          => 'text',
						'label'         => __('Font Size', 'fl-builder'),
						'default'       => '16',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'padding'       => array(
						'type'          => 'text',
						'label'         => __('Padding', 'fl-builder'),
						'default'       => '12',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					),
					'border_radius' => array(
						'type'          => 'text',
						'label'         => __('Round Corners', 'fl-builder'),
						'default'       => '4',
						'maxlength'     => '3',
						'size'          => '4',
						'description'   => 'px'
					)
				)
			)
		)
	),
	'event'       => array(
		'title'         => __('Event Tracking', 'fl-builder'),
		'sections'      => array(
			'event'       => array(
				'title'         => 'Data to Send to Google Analytics',
				'fields'        => array(
					'ga_category'          => array(
						'type'          => 'text',
						'label'         => __('Category', 'fl-builder'),
						'default'       => __('Button', 'fl-builder'),
						'description'   => 'Required. Tells Analytics what object was interacted with.',
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'ga_action'          => array(
						'type'          => 'text',
						'label'         => __('Action', 'fl-builder'),
						'default'       => __('click', 'fl-builder'),
						'description'   => 'Required. Tells analytics what sort of interaction took place.',
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'ga_label'          => array(
						'type'          => 'text',
						'label'         => __('Label', 'fl-builder'),
						'default'       => __('', 'fl-builder'),
						'placeholder'   => __('e.g., Fall Campaign', 'fl-builder'),
						'description'   => 'Optional. Helps distinguish between this event and other events in Analytics.',
						'preview'         => array(
							'type'            => 'none'
						)
					),
					'ga_value'          => array(
						'type'          => 'text',
						'label'         => __('Value', 'fl-builder'),
						'default'       => __('', 'fl-builder'),
						'description'   => 'Optional. Can be used to pass a numeric value with the event. Must be an integer.',
						'preview'         => array(
							'type'            => 'none'
						)
					),
				)
			)
		)
	)
));