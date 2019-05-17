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

abstract class ArrayValueObject {

	protected $value;

	public function __construct( array $value ) {
		$this->validate( $value );
		$this->value = $value;
	}

	public function value(): array {
		return $this->value;
	}

	abstract protected function validate( array $value );
}
