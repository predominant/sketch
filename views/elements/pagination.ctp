<?php
/**
 * Slavitica Sketch MiniSite
 *
 * Copyright (c) 2010 Graham Weldon
 * Licensed under the LGPL GNU Lesser General Public License
 * Redistributions of files must retain the above copyright notice
 *
 * @author Graham Weldon (http://grahamweldon.com)
 * @copyright Copyright (c) 2010 Graham Weldon
 * @license LGPL GNU Lesser General Public License (http://www.gnu.org/licenses/lgpl.html)
 */
?>
<?php if ($this->Paginator->hasNext() || $this->Paginator->hasPrev()): ?>
	<p><?php
		echo $this->Paginator->counter(array(
		'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	)); ?></p>
	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled')); ?> |
		<?php echo $this->Paginator->numbers(); ?> |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
	</div>
<?php endif; ?>
