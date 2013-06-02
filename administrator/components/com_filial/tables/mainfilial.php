<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;

// Подключаем библиотеку таблиц Joomla.
jimport('joomla.database.table');

/**
 * Класс таблицы HelloWorld.
 */
class FilialTableMainFilial extends JTable
{
	/**
	 * Конструктор.
	 *
	 * @param object Коннектор объекта базы данных.
	 */
	function __construct(&$db) 
	{
		parent::__construct('#__filial_category', 'id', $db);
	}
}