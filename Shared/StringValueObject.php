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

namespace JacoBaldrich\Assets\Shared;

abstract class StringValueObject {

	protected $value;

	public function __construct( string $value ) {
		$this->validate( $value );
		$this->value = $value;
	}

	public function value(): string {
		return $this->value;
	}

	public function __toString() {
		return $this->value();
	}

	abstract protected function validate( string $value );
}
