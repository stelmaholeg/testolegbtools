<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_filial
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

jimport('joomla.application.categories');

/**
 * Filial Component Category Tree
 *
 * @static
 * @package		Joomla.Site
 * @subpackage	com_filial
 * @since 1.6
 */
class FilialCategories extends JCategories
{
	public function __construct($options = array())
	{
		$options['table'] = '#__filial';
		$options['extension'] = 'com_filial';
		parent::__construct($options);
	}
}
