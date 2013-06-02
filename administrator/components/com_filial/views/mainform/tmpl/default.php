<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
 
// Загружаем тултипы.
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_filial&layout=edit&id='.(int)$this->item->id); ?>" method="post" name="adminForm" id="helloworld-form">
	<fieldset class="adminform">
		<legend><?php echo JText::_('COM_FILIAL_MAINFILIAL_DETAILS'); ?></legend>
		<ul class="adminformlist">
			<?php foreach ($this->form->getFieldset() as $field): ?>
				<li><?php echo $field->label; echo $field->input; ?></li>
			<?php endforeach; ?>
		</ul>
	</fieldset>
	<div>
		<input type="hidden" name="task" value="mainfilial.edit" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>