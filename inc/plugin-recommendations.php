<?php

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'landzai_register_required_plugins' );

function landzai_register_required_plugins() {

	$plugins = array(

		array(
			'name' => esc_attr__('Landzai Addon','landzai'),
			'slug' => 'landzai-addon',
			'source' => get_template_directory_uri() . '/plugin/landzai-addon.zip',
			'required' => true,
			'version' => '1.0.0',
			'force_activation' => false,
			'force_deactivation' => false, 
			'external_url' => '',
		),
		array(
			'name' => esc_attr__('Contact Form 7','landzai'),
			'slug'=> 'contact-form-7', 
			'required' => true, 
			'force_activation'=> false,
			'force_deactivation' => false,
		),
        array(
			'name' => esc_attr__('Landzai Demo Importer','landzai'),
			'slug'=> 'one-click-demo-import',
			'required' => true,
			'force_activation'=> false,
			'force_deactivation' => false,
		),

		array(
			'name' => esc_attr__('Elementor','landzai'),
			'slug' => 'elementor', 
			'required' => true, 
			'version' => '', 
			'force_activation' => false, 
			'force_deactivation' => false,
			'external_url' => '',
		),
        array(
			'name' => esc_attr__('WooCommerce','landzai'),
			'slug' => 'woocommerce',
			'required' => true,
			'version' => '',
			'force_activation' => false,
			'force_deactivation' => false,
			'external_url' => '',
		),
	);

    $config = array(
        'default_path' => '',
        'menu' => 'tgmpa-install-plugins',
        'has_notices' => true, 
        'dismissable' => true,
        'dismiss_msg' => '',
        'is_automatic' => true,
        'message'=> '',
    );

    tgmpa( $plugins, $config );

}