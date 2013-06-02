<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;

// Устанавливаем некоторые глобальные свойства.
$document = JFactory::getDocument();
$document->addStyleDeclaration('.icon-48-branchnetwork {background-image: url(../media/com_branchnetwork/images/branchnetwork-48x48.png);}');

// Подключаем библиотеку контроллера Joomla.
jimport('joomla.application.component.controller');

// Получаем экземпляр контроллера с префиксом BranchNetwork.
$controller = JControllerLegacy::getInstance('BranchNetwork');

// Исполняем задачу task из Запроса.
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));
 
// Перенаправляем, если перенаправление установлено в контроллере.
$controller->redirect();