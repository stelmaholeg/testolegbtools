<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;

// Подключаем библиотеку представления Joomla.
jimport('joomla.application.component.view');

/**
 * HTML представление редактирования сообщения.
 */
class FilialViewMainFilial extends JViewLegacy
{
	/**
	 * Сообщение.
	 *
	 * @var array 
	 */
	protected $item;

	/**
	 * Объект формы.
	 *
	 * @var array 
	 */
	protected $form;

	/**
	 * Отображает представление.
	 *
	 * @return void
	 */
	public function display($tpl = null) 
	{
		// Получаем данные из модели.
            
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');

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
		$input = JFactory::getApplication()->input->set('hidemainmenu', true);
		$isNew = ($this->item->id == 0);

		JToolBarHelper::title($isNew ? JText::_('COM_FILIAL_MANAGER_MAINFILIAL_NEW')
								: JText::_('COM_FILIAL_MANAGER_MAINFILIAL_EDIT'), 'mainfilial');
		JToolBarHelper::save('mainfilial.save');
		JToolBarHelper::cancel('mainfilial.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
	}
}