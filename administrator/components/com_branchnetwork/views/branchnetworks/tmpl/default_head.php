<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
?>
<tr>
	<th width="5">
		<?php echo JText::_('COM_BRANCHNETWORK_BRANCHNETWORK_HEADING_ID'); ?>
	</th>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
	</th>			
	<th>
		<?php echo JText::_('COM_BRANCHNETWORK_BRANCHNETWORK_HEADING_CITY'); ?>
	</th>
        <th>
		<?php echo JText::_('COM_BRANCHNETWORK_BRANCHNETWORK_HEADING_PHONE'); ?>
	</th>
        <th>
		<?php echo JText::_('COM_BRANCHNETWORK_BRANCHNETWORK_HEADING_ADDRESS'); ?>
	</th>
        <th>
		<?php echo JText::_('COM_BRANCHNETWORK_BRANCHNETWORK_HEADING_MAPLINK'); ?>                
	</th>
        <th>
		<?php echo JText::_('COM_BRANCHNETWORK_BRANCHNETWORK_HEADING_DIRECTOR'); ?>                
	</th>
        <th>
		<?php echo JText::_('COM_BRANCHNETWORK_BRANCHNETWORK_HEADING_FOTOLINK'); ?>                
	</th>
</tr>