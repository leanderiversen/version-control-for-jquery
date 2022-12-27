<?php

namespace ICN\VCFJ;

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Helpers {

	public static function is_disabled( string $option ): bool {
		$options = get_option( 'vcfj_settings' );
		$option  = sprintf( 'vcfj_%s_disable', $option );

		return isset( $options[ $option ] ) && '1' === $options[ $option ];
	}

	public static function get_version( string $option ): string {
		$options = get_option( 'vcfj_settings' );
		$option  = sprintf( 'vcfj_%s_version', $option );

		return ! isset( $options[ $option ] ) || empty( $options[ $option ] ) ? constant( 'VCFJ_LATEST_' . strupper( $option ) ) : $options[ $option ];
	}

	public static function get_cdn(): string {
		$options = get_option( 'vcfj_settings' );

		return ! isset( $options['vcfj_cdn'] ) || empty( $options['vcfj_cdn'] ) ? constant( 'VCFJ_DEFAULT_CDN' ) : $options['vcfj_cdn'];
	}

}