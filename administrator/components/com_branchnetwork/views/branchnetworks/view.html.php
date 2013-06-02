<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;

// Подключаем библиотеку представления Joomla.
jimport('joomla.application.component.view');

/**
 * HTML представление списка сообщений компонента BranchNetwork.
 */
class BranchNetworkViewBranchNetworks extends JViewLegacy
{
	/**
	 * Сообщения.
	 *
	 * @var array 
	 */
	protected $items;

	/**
	 * Постраничная навигация.
	 *
	 * @var object
	 */
	protected $pagination;

	/**
	 * Отображает список сообщений.
	 *
	 * @return void
	 */
	public function display($tpl = null) 
	{
		// Получаем данные из модели.
		$this->items = $this->get('Items');

		// Получаем объект постраничной навигации.
		$this->pagination = $this->get('Pagination');

		// Есть ли ошибки.
		if (count($errors = $this->get('Errors'))) 
		{
			JFactory::getApplication()->enqueueMessage(implode('<br />', $errors), 'error');
		}

		// Устанавливаем панель инструментов.
		$this->addToolBar();

		// Отображаем представление.
		parent::display($tpl);
	}

	/**
	 * Устанавливает панель инструментов.
	 *
	 * @return void
	 */
	protected function addToolBar() 
	{
		JToolBarHelper::title(JText::_('COM_BRANCHNETWORK_MANAGER_BRANCHNETWORKS'), 'branchnetwork');
		JToolBarHelper::addNew('branchnetwork.add');
		JToolBarHelper::editList('branchnetwork.edit');
		JToolBarHelper::divider();
		JToolBarHelper::deleteList('', 'branchnetworks.delete');
	}
}