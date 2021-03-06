<?php
/**
 * File containing the Value class of Country
 */

namespace Jeega\API\Content\Field\Country;

use Jeega\API\Content\Field\FieldValue;

abstract class Value extends FieldValue {

    /**
     * Complete associative array with Alpha2 as key and country data as values
     *
     * Example:
     * <code>
     *  array(
     *      "PT" => array(
	 *			"name"			=> "Portugal",
	 *			"alpha2"			=> "PT",
	 *			"alpha3"			=> "PTR",
	 *			"numericcode"	=> "620"
	 *		),
     *      "GB" => array(
	 *			"name"			=> "United Kingdom",
	 *			"alpha2"			=> "GB",
	 *			"alpha3"			=> "GBR",
	 *			"numericcode"	=> "826"
	 *		),
	 *		...
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