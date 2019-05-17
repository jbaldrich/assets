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

namespace JacoBaldrich\Assets\Application;

use JacoBaldrich\Assets\Domain\AssetURL;
use JacoBaldrich\Assets\Domain\AssetHandle;
use JacoBaldrich\Assets\Domain\Style\Style;
use JacoBaldrich\Assets\Domain\AssetVersion;
use JacoBaldrich\Assets\Domain\Script\Script;
use JacoBaldrich\Assets\Domain\AssetRepository;

final class AssetCreator {

	private $repository;

	public function __construct( AssetRepository $repository ) {
		$this->repository = $repository;
	}

	public function create_style(
		AssetHandle $handle,
		AssetURL $url,
		AssetVersion $version,
		bool $is_minified
	): void {
		$style = new Style( $handle, $url, $version, $is_minified );
		$this->repository->add( $style );
		var_dump($this->repository->get_all());
	}

	public function create_script(
		AssetHandle $handle,
		AssetURL $url,
		AssetVersion $version,
		bool $is_minified
	): void {
		$script = new Script( $handle, $url, $version, $is_minified );
		$this->repository->add( $script );
		var_dump($this->repository->get_all());
	}
}
