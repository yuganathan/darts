<?php
class Dam_Plugin {
	protected $loader;
	protected $plugin_name;
	protected $version;

	public function __construct() {
		$this->plugin_name = 'dam-plugin';
		$this->version = DAM_PLUGIN_VERSION;
	}

	public function run() {
		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_public_styles' ) );
	}

	public function add_admin_menu() {
		add_menu_page(
			'Dam Plugin',
			'Dam Plugin',
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_plugin_admin_page' ),
			'dashicons-format-image',
			6
		);
	}

	public function display_plugin_admin_page() {
		include_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/dam-plugin-admin-display.php';
	}

	public function enqueue_admin_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( dirname( __FILE__ ) ) . 'admin/css/dam-plugin-admin.css', array(), $this->version, 'all' );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( dirname( __FILE__ ) ) . 'admin/js/dam-plugin-admin.js', array( 'jquery' ), $this->version, false );
	}

	public function enqueue_public_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( dirname( __FILE__ ) ) . 'public/css/dam-plugin-public.css', array(), $this->version, 'all' );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( dirname( __FILE__ ) ) . 'public/js/dam-plugin-public.js', array( 'jquery' ), $this->version, false );
	}
}