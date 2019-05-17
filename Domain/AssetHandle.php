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

use JacoBaldrich\Assets\Shared\StringValueObject;

final class AssetHandle extends StringValueObject {

	protected function validate( string $value ) {
	}
}
