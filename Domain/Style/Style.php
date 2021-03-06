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

namespace JacoBaldrich\Assets\Domain\Style;

use JacoBaldrich\Assets\Domain\Asset;
use JacoBaldrich\Assets\Domain\AssetURL;
use JacoBaldrich\Assets\Domain\AssetHandle;
use JacoBaldrich\Assets\Domain\AssetVersion;
use JacoBaldrich\Assets\Domain\AssetDependencies;

final class Style extends Asset {

	private $media;

	public function __construct(
		AssetHandle $handle,
		AssetURL $url,
		AssetVersion $version,
		bool $is_minified = null,
		AssetDependencies $dependencies = null,
		StyleMedia $media = null
	) {
		parent::__construct(
			$handle,
			$url,
			$version,
			$is_minified,
			$dependencies
		);
		$this->media = $media ?? 'all';
	}
}
