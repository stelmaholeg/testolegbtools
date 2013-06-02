<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;

// Подключаем тип поля list.
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

/**
 * Класс поля формы BranchNetwork компонента BranchNetwork.
 */
class JFormFieldBranchNetwork extends JFormFieldList
{
	/**
	 * Тип поля.
	 *
	 * @var string
	 */
	protected $type = 'BranchNetwork';
 
	/**
	 * Метод для получения списка опций для поля списка.
	 *
	 * @return array Массив JHtml опций.
	 */
	protected function getOptions() 
	{
		// Получаем объект базы данных.
		$db = JFactory::getDBO();

		// Конструируем SQL запрос.
		$query = $db->getQuery(true);
		$query->select('id,  city, hone, address, maplink, director, fotolink ')
				->from('#__branchnetwork');
		$db->setQuery($query);
		$messages = $db->loadObjectList();

		// Массив JHtml опций.
		$options = array();
		if ($messages)
		{
			foreach($messages as $message) 
			{
				$options[] = JHtml::_('select.option', $message->id, $message->greeting);
			}
		}
		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}