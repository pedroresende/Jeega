<?php
/**
 * File containing the FieldType class
 */

namespace Jeega\API\Content\Field;

abstract class FieldType extends Field {

	public $translatable;
	public $position;
	public $required;
	public $infoCollector;
	public $searchable;
	public $defaultValue;
	public $validation;

}
