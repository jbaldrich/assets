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

use JacoBaldrich\Assets\Domain\AssetRepository;
use JacoBaldrich\Assets\Domain\Asset;

final class AssetContainer implements AssetRepository {

	private $collection;

	public function __construct() {
		$this->reset();
	}

	public function get_all(): array {
		return $this->collection;
	}

	public function add( Asset $asset ): void {
		$this->collection[] = $asset;
	}

	private function reset() {
		$this->collection = [];
	}
}
