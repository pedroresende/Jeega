<?php
/**
 * File containing the ContentClass class
 */

namespace Geega\API\Content;

abstract class ContentClass {

	// table id + database unique id
	protected $id;
	protected $remoteId;

	// group
	protected $groupId;

	// creator + lastet editor
	protected $createdBy;
	protected $updatedBy;

	// version
	protected $version;

	// timestamps
	protected $createdAt;
	protected $updatedAt;
	protected $deletedAt;	// ???

	// user changeable properties
	public $names;
	public $identifier;
	public $container;
	public $infoColector;

}