<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
?>
<tr>
	<th width="5">
		<?php echo JText::_('COM_FILIAL_MAINFILIAL_HEADING_ID'); ?>
	</th>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
	</th>			
	<th>
		<?php echo JText::_('COM_FILIAL_MAINFILIAL_HEADING_TITLE'); ?>
	</th>
</tr>