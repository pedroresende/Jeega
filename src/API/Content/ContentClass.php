<?php
/**
 * File containing the ContentClass class
 */

namespace Geega\API\Content;

abstract class ContentClass extends BaseObject {

	// field types
	protected $fields;

	// user changeable properties
	public $names;
	public $identifier;
	public $container;
	// $infoColector should go to field instead?
	// how will the colected info handled?
	// - possiblely it creates a class for the colected info and stores inside
	//   the object, as it was an container, or maybe a setting to send it to
	//   another object/container
	// another approach would be to have the object collector and colected object
	// view
	public $infoColector;

}
