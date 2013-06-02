<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;

// Подключаем библиотеку представления Joomla.
jimport('joomla.application.component.view');

/**
 * HTML представление списка сообщений компонента MainFilial.
 */
class FilialViewMainFilials extends JViewLegacy
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
		JToolBarHelper::title(JText::_('COM_FILIAL_MANAGER_MAINFILIALS'), 'mainfilial');
		JToolBarHelper::addNew('mainfilial.add');
		JToolBarHelper::editList('mainfilial.edit');
		JToolBarHelper::divider();
		JToolBarHelper::deleteList('', 'mainfilials.delete');
	}
}