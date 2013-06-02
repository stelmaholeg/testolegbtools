<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_filial
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.framework');

// Create some shortcuts.
$params		= &$this->item->params;
$n		= count($this->items);
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
?>

<?php if (empty($this->items)) : ?>

	<?php if ($this->params->get('show_no_articles', 1)) : ?>
	<p><?php echo JText::_('COM_FILIAL_NO_ARTICLES'); ?></p>
	<?php endif; ?>

<?php else : ?>

<?php
                        $db = JFactory::getDBO();
                        $query = "SELECT title, description FROM #__filial_categorie WHERE id='1'";
                        $db->setQuery($query);
                        $filial_info = $db->loadAssoc();
?>


<h1><?php echo $filial_info['title']; ?></h1>
<p><?php echo $filial_info['description']; ?></p>


    
    <div>
    <?php foreach ($this->items as $i => $article) : ?>
	<a href="<?php echo JRoute::_(FilialHelperRoute::getArticleRoute($article->slug, $article->catid)); ?>">
							<?php echo $this->escape($article->title); ?></a><br>
    <?php endforeach;    ?>
    </div>   

	
<?php endif; ?>


