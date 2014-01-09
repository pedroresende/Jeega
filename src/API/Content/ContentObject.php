<?php
/**
 * File containing the ContentObject class
 */

namespace Geega\API\Content;

abstract class ContentObject extends BaseObject {

	// class id
	protected $classId;

	// fields
	protected $fields;

	// version and published
	protected $version;
	protected $status;
	protected $published;

	// editable properties
	public $names;
	public $section;

}