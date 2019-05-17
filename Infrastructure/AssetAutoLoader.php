<?php declare( strict_types=1 );

/**
 * Assets.
 *
 * @package   JacoBaldrich\Assets
 * @author    Jaco Baldrich <hello@jacobaldrich.com>
 * @license   MIT
 * @link      https://jacobaldrich.com
 * @copyright 2019 Jaco Baldrich
 */

namespace JacoBaldrich\Assets\Infrastructure;

use DateTime;
use RegexIterator;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use JacoBaldrich\Assets\Domain\AssetURL;
use JacoBaldrich\Assets\Domain\AssetHandle;
use JacoBaldrich\Assets\Domain\AssetVersion;
use JacoBaldrich\Assets\Application\AssetCreator;

final class AssetAutoLoader {

	private $asset_creator;

	public function __construct( AssetCreator $asset_creator ) {
		$this->asset_creator = $asset_creator;
	}

	public function load( string $directory ): void {
		$dir_iterator = new RecursiveDirectoryIterator( $directory );
		$iterator     = new RecursiveIteratorIterator( $dir_iterator );
		$this->add_styles( $iterator );
		$this->add_scripts( $iterator );
	}

	private function add_styles( \Iterator $iterator ): void {
		$css_files = new RegexIterator( $iterator, '/\.css$/i' );
		foreach ( $css_files as $file ) {
			// Get data from file.
			$handle      = $this->get_handle( $file );
			$url         = $this->get_url( $file );
			$version     = $this->get_version( $file );
			$is_minified = $this->check_is_minified( $file );
			// Call the use case.
			$this->asset_creator->create_style( $handle, $url, $version, $is_minified );
			/* $asset = new Style( $handle, $url, $version, $is_minified );
			$this->creator->add( $asset ); */
		}
	}

	private function add_scripts( \Iterator $iterator ): void {
		$js_files = new RegexIterator( $iterator, '/\.js$/i' );
		foreach ( $js_files as $file ) {
			// Get data from file.
			$handle      = $this->get_handle( $file );
			$url         = $this->get_url( $file );
			$version     = $this->get_version( $file );
			$is_minified = $this->check_is_minified( $file );
			// Call the use case.
			$this->asset_creator->create_script( $handle, $url, $version, $is_minified );
			/* $asset = new Script( $handle, $url, $version, $is_minified );
			$this->creator->add( $asset ); */
		}
	}

	private function get_handle( \SplFileInfo $file ): AssetHandle {
		$name   = explode( '.', $file->getBasename() );
		$handle = $name[0];
		return new AssetHandle( $handle );
	}

	private function get_url( \SplFileInfo $file ): AssetURL {
		$url = plugin_dir_url( $file->getRealPath() ) . $file->getBasename();
		return new AssetURL( $url );
	}

	private function get_version( \SplFileInfo $file ): AssetVersion {
		$date = ( new DateTime() )->setTimestamp( $file->getMTime() );
		return new AssetVersion( $date->format( 'Y-m-d' ) );
	}

	private function check_is_minified( \SplFileInfo $file ): bool {
		$file_name = $file->getBasename();
		return ( false === strpos( $file_name, '.min.' ) ) ? false : true;
	}
}
