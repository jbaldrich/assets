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

use InvalidArgumentException;
use JacoBaldrich\Assets\Shared\StringValueObject;

final class AssetFileName extends StringValueObject {

	protected function validate( string $value ) {
		$extension = strrchr( '.', $value );
		if ( false === $extension ) {
			throw new InvalidArgumentException( 'The string must be a valid file name with extension.' );
		}
		if ( 'css' !== $extension || 'js' !== $extension ) {
			throw new InvalidArgumentException( 'The string must be a valid CSS or JavaScript file.' );
		}
	}
}
