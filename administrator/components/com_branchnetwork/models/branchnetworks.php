<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;

// Подключаем библиотеку modellist Joomla.
jimport('joomla.application.component.modellist');

/**
 * Модель списка сообщений компонента BranchNetwork.
 */
class BranchNetworkModelBranchNetworks extends JModelList
{
	/**
	 * Метод для построения SQL запроса для загрузки списка данных.
	 *
	 * @return string SQL запрос.
	 */
	protected function getListQuery()
	{
		// Создаем новый query объект.
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);

		// Выбераем поля.
		$query->select('id, city, phone, address, maplink, director, fotolink ');

		// Из таблицы branchnetwork.
		$query->from('#__branchnetwork');

		return $query;
	}
}