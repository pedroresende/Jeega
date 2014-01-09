<?php
/**
 * File containing the BaseObject class
 */

namespace Geega\API;

abstract class BaseObject {

	// table id + database unique id
	protected $id;
	protected $remoteId;

	// creator + lastet editor
	protected $createdBy;
	protected $updatedBy;

	// version
	protected $version;

	// language
	protected $translatable;
	protected $mainLanguage;

	// timestamps
	protected $createdAt;
	protected $updatedAt;
	protected $deletedAt;

}
