<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;

foreach ($this->items as $i => $item): ?>
	<tr class="row<?php echo $i % 2; ?>">
		<td>
			<?php echo $item->id; ?>
		</td>
		<td>
			<?php echo JHtml::_('grid.id', $i, $item->id); ?>
		</td>
		<td>
			<?php echo $item->city; ?>
		</td>
                <td>
			<?php echo $item->phone; ?>                    
		</td>
                <td>
			<?php echo $item->address; ?>                    
		</td>
                <td>
			<?php echo $item->maplink; ?>                    
		</td>
                <td>
			<?php echo $item->director; ?>                    
		</td>
                <td>
			<?php echo $item->fotolink; ?>                    
		</td>                
	</tr>
<?php endforeach; ?>