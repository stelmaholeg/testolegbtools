<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;

// Подключаем библиотеку таблиц Joomla.
jimport('joomla.database.table');

/**
 * Класс таблицы MainFilial.
 */
class FilialTableFilial extends JTable
{
	/**
	 * Конструктор.
	 *
	 * @param object Коннектор объекта базы данных.
	 */
	function __construct(&$db) 
	{
		parent::__construct('#__filial', 'id', $db);
	}
}