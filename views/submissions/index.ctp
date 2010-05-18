<div class="submissions index">
	<h2><?php __('Submissions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('project_id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('time_taken');?></th>
			<th><?php echo $this->Paginator->sort('file_name');?></th>
			<th><?php echo $this->Paginator->sort('file_size');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($submissions as $submission):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $submission['Submission']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($submission['User']['id'], array('controller' => 'users', 'action' => 'view', $submission['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($submission['Project']['name'], array('controller' => 'projects', 'action' => 'view', $submission['Project']['id'])); ?>
		</td>
		<td><?php echo $submission['Submission']['name']; ?>&nbsp;</td>
		<td><?php echo $submission['Submission']['description']; ?>&nbsp;</td>
		<td><?php echo $submission['Submission']['time_taken']; ?>&nbsp;</td>
		<td><?php echo $submission['Submission']['file_name']; ?>&nbsp;</td>
		<td><?php echo $submission['Submission']['file_size']; ?>&nbsp;</td>
		<td><?php echo $submission['Submission']['created']; ?>&nbsp;</td>
		<td><?php echo $submission['Submission']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $submission['Submission']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $submission['Submission']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $submission['Submission']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $submission['Submission']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Submission', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>