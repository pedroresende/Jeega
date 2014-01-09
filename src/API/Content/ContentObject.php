<?php
/**
 * File containing the ContentObject class
 */

namespace Geega\API\Content;

abstract class ContentObject {

	// table id + database unique id
	protected $id;
	protected $remoteId;

	// class id
	protected $classId;

	// fields
	protected $fields;

	// creator + lastet editor
	protected $createdBy;
	protected $updatedBy;

	// version and published
	protected $version;
	protected $status;
	protected $published;

	// timestamps
	protected $createdAt;
	protected $updatedAt;
	protected $deletedAt;	// ???

	// editable properties
	public $names;
	public $section;

}