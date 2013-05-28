<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
 
// Загружаем тултипы.
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_branchnetwork&layout=edit&id='.(int)$this->item->id); ?>" method="post" name="adminForm" id="branchnetwork-form">
	<fieldset class="adminform">
		<legend><?php echo JText::_('COM_BRANCHNETWORK_BRANCHNETWORK_DETAILS'); ?></legend>
		<ul class="adminformlist">
			<?php foreach ($this->form->getFieldset() as $field): ?>
				<li><?php echo $field->label; echo $field->input; ?></li>
			<?php endforeach; ?>
		</ul>
	</fieldset>
	<div>
		<input type="hidden" name="task" value="branchnetwork.edit" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>