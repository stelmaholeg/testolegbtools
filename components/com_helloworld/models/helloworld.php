<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;

// Подключаем библиотеку modelitem Joomla.
jimport('joomla.application.component.modelitem');

/**
 * Модель сообщения компонента HelloWorld.
 */
class HelloWorldModelHelloWorld extends JModelItem
{
	/**
	 * Сообщения.
	 *
	 * @var array
	 */
	protected $messages;

	/**
	 * Возвращает ссылку на объект таблицы.
	 *
	 * @param	type		Тип таблицы
	 * @param	string		Префикс имени класса таблицы. Необязателен.
	 * @param	array		Конифгурационный массив для таблицы. Необязателен.
	 * 
	 * @return	JTable	Объект таблицы.
	 */

	public function getTable($type = 'HelloWorld', $prefix = 'HelloWorldTable', $config = array()) 
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Получаем сообщение.
	 * 
	 * @param int Id сообщения.
	 * 
	 * @return string Сообщение, которое отображается пользователю.
	 */
	public function getMsg($id = 1) 
	{
		if (!is_array($this->messages))
		{
			$this->messages = array();
		}
 
		if (!isset($this->messages[$id])) 
		{
			// Получаем объект Запроса.
			$input = JFactory::getApplication()->input;

			// Получаем Id сообщения из Запроса.
			$id = $input->getInt('id');
 
			// Получаем экземпляр класса TableHelloWorld.
			$table = $this->getTable();

			// Загружаем сообщение.
			$table->load($id);
 
			// Назначаем сообщение.
			$this->messages[$id] = $table->greeting;
		}

		return $this->messages[$id];
	}
}