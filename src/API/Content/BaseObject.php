<?php
/**
 * File containing the BaseObject class
 */

namespace Jeega\API;

/**
 * Main object class,
 * All content and class objects inherit these properties
 */
abstract class BaseObject {

	/**
	 * Master ID for all objects
	 *
	 * @generated
	 *
	 * @var int
	 */
	protected $id;

	/**
	 * System wide unique remote ID
	 *
	 * This makes possible to exchange objects with others systems
	 *
	 * @generated
	 *
	 * @var sting[32]
	 */
	protected $remoteId;

	/**
	 * Creator of the first version id
	 *
	 * @optional
	 *
	 * @var int
	 */
	protected $owner;

	/**
	 * Creator of the actual version user id
	 *
	 * @optional
	 *
	 * @var int
	 */
	protected $createdBy;

	/**
	 * Last modifier user id
	 *
	 * @optional
	 *
	 * @var int
	 */
	protected $updatedBy;

	/**
	 * Object actual version
	 *
	 * @generated
	 *
	 * @var int
	 */
	protected $version;

	/**
	 * Object publish/latest version
	 *
	 * @generated
	 *
	 * @var int
	 */
	protected $currentVersion;

	/**
	 * Original object language
	 *
	 * @required
	 *
	 * @var string Country identifier in Alpha2, Alpha3 or numeric code
	 * @see http://en.wikipedia.org/wiki/ISO_3166-1
	 */
	protected $mainLanguage;

	/**
	 * Object version date and time of creation
	 *
	 * @generated
	 *
	 * @var timestamp
	 */
	protected $createdAt;

	/**
	 * Object version date and time of update
	 *
	 * @generated
	 *
	 * @var timestamp
	 */
	protected $updatedAt;

	/**
	 * Object version date and time of removal
	 *
	 * This would be NULL until it is trashed and only then it will have a value
	 * when deleted from trash or directly hard delete the object all object will
	 * be deleted
	 *
	 * @generated
	 *
	 * @var timestamp
	 */
	protected $deletedAt;

	/**
     * Construct object optionally with a set of properties
     *
     * Readonly properties values must be set using $properties as they are not
     * writable anymore after object has been created.
     *
     * @param array $properties
     */
    public function __construct( array $properties = array() )
    {
        foreach ( $properties as $property => $value )
        {
            $this->$property = $value;
        }
    }

}
