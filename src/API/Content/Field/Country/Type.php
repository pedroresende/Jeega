<?php
/**
 * File containing the Type class of Country
 */

namespace Geega\API\Content\Field\Country;

use Geega\API\Content\Field\FieldType;

abstract class Type extends FieldType {

	/**
     * Array with Alpha2, Alpha3 or numeric code
     *
     * Example:
     * <code>
     *  array(
     *      "PT",	// Alpha2 for Portugal
	 *		"FRA",	// alpha3 for France
	 *		826		// numeric code for United Kingdom
     *  )
     * </code>
	 *
	 * @see for more information about this see
	 *		http://en.wikipedia.org/wiki/ISO_3166-1
     *
     * @var array[]
     */
	public $countries = array();

}