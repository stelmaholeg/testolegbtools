<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_filial
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

require_once dirname(__FILE__) . '/articles.php';

/**
 * Frontpage Component Model
 *
 * @package		Joomla.Site
 * @subpackage	com_filial
 * @since 1.5
 */
class FilialModelFeatured extends FilialModelArticles
{
	/**
	 * Model context string.
	 *
	 * @var		string
	 */
	public $_context = 'com_filial.frontpage';

	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @since	1.6
	 */
	protected function populateState($ordering = null, $direction = null)
	{
		parent::populateState($ordering, $direction);

		// List state information
		$limitstart = JRequest::getUInt('limitstart', 0);
		$this->setState('list.start', $limitstart);

		$params = $this->state->params;
		$limit = $params->get('num_leading_articles') + $params->get('num_intro_articles') + $params->get('num_links');
		$this->setState('list.limit', $limit);
		$this->setState('list.links', $params->get('num_links'));

		$this->setState('filter.frontpage', true);

		$user		= JFactory::getUser();
		if ((!$user->authorise('core.edit.state', 'com_filial')) &&  (!$user->authorise('core.edit', 'com_filial'))){
			// filter on published for those who do not have edit or edit.state rights.
			$this->setState('filter.published', 1);
		}
		else {
			$this->setState('filter.published', array(0, 1, 2));
		}

		// check for category selection
		if ($params->get('featured_categories') && implode(',', $params->get('featured_categories'))  == true) {
			$featuredCategories = $params->get('featured_categories');
 			$this->setState('filter.frontpage.categories', $featuredCategories);
 		}
	}

	/**
	 * Method to get a list of articles.
	 *
	 * @return	mixed	An array of objects on success, false on failure.
	 */
	public function getItems()
	{
		$params = clone $this->getState('params');
		$limit = $params->get('num_leading_articles') + $params->get('num_intro_articles') + $params->get('num_links');
		if ($limit > 0)
		{
			$this->setState('list.limit', $limit);
			return parent::getItems();
		}
		return array();

	}

	/**
	 * Method to get a store id based on model configuration state.
	 *
	 * This is necessary because the model is used by the component and
	 * different modules that might need different sets of data or different
	 * ordering requirements.
	 *
	 * @param	string		$id	A prefix for the store id.
	 *
	 * @return	string		A store id.
	 */
	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id .= $this->getState('filter.frontpage');

		return parent::getStoreId($id);
	}

	/**
	 * @return	JDatabaseQuery
	 */
	function getListQuery()
	{
		// Set the blog ordering
		$params = $this->state->params;
		$articleOrderby = $params->get('orderby_sec', 'rdate');
		$articleOrderDate = $params->get('order_date');
		$categoryOrderby = $params->def('orderby_pri', '');
		$secondary = FilialHelperQuery::orderbySecondary($articleOrderby, $articleOrderDate) . ', ';
		$primary = FilialHelperQuery::orderbyPrimary($categoryOrderby);

		$orderby = $primary . ' ' . $secondary . ' a.created DESC ';
		$this->setState('list.ordering', $orderby);
		$this->setState('list.direction', '');
		// Create a new query object.
		$query = parent::getListQuery();

		// Filter by frontpage.
		if ($this->getState('filter.frontpage'))
		{
			$query->join('INNER', '#__filial_frontpage AS fp ON fp.filial_id = a.id');
		}

		// Filter by categories
		if (is_array($featuredCategories = $this->getState('filter.frontpage.categories'))) {
			$query->where('a.catid IN (' . implode(',', $featuredCategories) . ')');
		}


		return $query;
	}
}
