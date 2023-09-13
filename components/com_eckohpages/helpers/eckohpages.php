<?php

/**
 * @version    CVS: 1.0.0
 * @package    Com_Eckohpages
 * @author     RJ <rob@bluefrontier.co.uk>
 * @copyright  2020 Eckoh
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

JLoader::register('EckohpagesHelper', JPATH_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_eckohpages' . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'eckohpages.php');

use \Joomla\CMS\Factory;
use \Joomla\CMS\MVC\Model\BaseDatabaseModel;

/**
 * Class EckohpagesFrontendHelper
 *
 * @since  1.6
 */
class EckohpagesHelpersEckohpages
{
	/**
	 * Get an instance of the named model
	 *
	 * @param   string  $name  Model name
	 *
	 * @return null|object
	 */
	public static function getModel($name)
	{
		$model = null;

		// If the file exists, let's
		if (file_exists(JPATH_SITE . '/components/com_eckohpages/models/' . strtolower($name) . '.php'))
		{
			require_once JPATH_SITE . '/components/com_eckohpages/models/' . strtolower($name) . '.php';
			$model = BaseDatabaseModel::getInstance($name, 'EckohpagesModel');
		}

		return $model;
	}

	/**
	 * Gets the files attached to an item
	 *
	 * @param   int     $pk     The item's id
	 *
	 * @param   string  $table  The table's name
	 *
	 * @param   string  $field  The field's name
	 *
	 * @return  array  The files
	 */
	public static function getFiles($pk, $table, $field)
	{
		$db = Factory::getDbo();
		$query = $db->getQuery(true);

		$query
			->select($field)
			->from($table)
			->where('id = ' . (int) $pk);

		$db->setQuery($query);

		return explode(',', $db->loadResult());
	}

    /**
     * Gets the edit permission for an user
     *
     * @param   mixed  $item  The item
     *
     * @return  bool
     */
    public static function canUserEdit($item)
    {
        $permission = false;
        $user       = Factory::getUser();

        if ($user->authorise('core.edit', 'com_eckohpages'))
        {
            $permission = true;
        }
        else
        {
            if (isset($item->created_by))
            {
                if ($user->authorise('core.edit.own', 'com_eckohpages') && $item->created_by == $user->id)
                {
                    $permission = true;
                }
            }
            else
            {
                $permission = true;
            }
        }

        return $permission;
    }
}
