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

namespace JacoBaldrich\Assets\Domain;

abstract class Asset {

	protected $is_minified;
	protected $handle;
	protected $url;
	protected $dependencies;
	protected $version;

	public function __construct(
		AssetHandle $handle,
		AssetURL $url,
		AssetVersion $version,
		bool $is_minified = null,
		AssetDependencies $dependencies = null
	) {
		$this->handle       = $handle;
		$this->url          = $url;
		$this->version      = $version;
		$this->is_minified  = $is_minified ?? false;
		$this->dependencies = $dependencies ?? [];
	}
}
