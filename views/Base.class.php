<?php

/**
 * Base class
 *
 * @since 3.0.0
 */

// Load library classes
require_once( EWD_UWCF_PLUGIN_DIR . '/views/View.class.php' );
require_once( EWD_UWCF_PLUGIN_DIR . '/views/View.Filtering.class.php' );
require_once( EWD_UWCF_PLUGIN_DIR . '/views/View.ProductFilters.class.php' );

class ewduwcfBase {

	public $id = null;

	// Collect errors during processing
	public $errors = array();


	/**
	 * Initialize the class
	 * @since 3.0.0
	 */
	public function __construct( $args ) {

		// Parse the values passed
		$this->parse_args( $args );

	}

	/**
	 * Parse the arguments passed in the construction and assign them to
	 * internal variables.
	 * @since 3.0.0
	 */
	public function parse_args( $args ) {
		foreach ( $args as $key => $val ) {
			switch ( $key ) {

				case 'id' :
					$this->{$key} = esc_attr( $val );

				default :
					$this->{$key} = $val;

			}
		}
	}

	/**
	 * Set an error
	 * @since 3.0.0
	 */
	public function set_error( $error ) {
		$this->errors[] = array_merge(
			$error,
			array(
				'class'		=> get_class( $this ),
				'id'		=> $this->id,
				'backtrace'	=> debug_backtrace()
			)
		);
	}

}
