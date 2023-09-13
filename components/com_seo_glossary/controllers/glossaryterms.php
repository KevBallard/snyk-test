<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Seo_glossary
 * @author     Kevin Ballard <kevin@bluefrontier.co.uk>
 * @copyright  2020 Blue Frontier IT Ltd
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Glossaryterms list controller class.
 *
 * @since  1.6
 */
class Seo_glossaryControllerGlossaryterms extends Seo_glossaryController
{
	/**
	 * Proxy for getModel.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional
	 * @param   array   $config  Configuration array for model. Optional
	 *
	 * @return object	The model
	 *
	 * @since	1.6
	 */
	public function &getModel($name = 'Glossaryterms', $prefix = 'Seo_glossaryModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));

		return $model;
	}
}
