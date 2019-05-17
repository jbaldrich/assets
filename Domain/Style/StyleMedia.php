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

final class StyleMedia extends StringValueObject {

	protected function validate( string $value ) {
		$valid_values = [
			'all',
			'print',
			'screen',
		];
		if ( ! in_array( $value, $valid_values, true ) ) {
			throw new InvalidArgumentException( "The string must be 'all', 'print' or 'screen'." );
		}
	}
}
