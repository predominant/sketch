<div class="users index">
	<h2><?php __('Users');?></h2>
	<?php foreach ($users as $user): ?>
		<div class="user-summary">
			<?php
			echo $this->Gravatar->image(
				$user['User']['email'],
				array(
					'default' => Router::url('/img/spacer.png', true),
					'size' => 200,
					'class' => 'summary-main-image'));
			?>
			<h3 class="display-name"><?php echo $user['User']['display_name']; ?></h3>
			<div class="submission-thumb">
			</div>
			<div class="submission-thumb">
			</div>
			<div class="submission-thumb">
			</div>
		</div>
	<?php endforeach; ?>

<!--
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('display_name');?></th>
		<th><?php echo $this->Paginator->sort('password');?></th>
		<th><?php echo $this->Paginator->sort('validation_token');?></th>
		<th><?php echo $this->Paginator->sort('validated');?></th>
		<th><?php echo $this->Paginator->sort('banned');?></th>
		<th><?php echo $this->Paginator->sort('created');?></th>
		<th><?php echo $this->Paginator->sort('modified');?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $user['User']['id']; ?>&nbsp;</td>
		<td><?php echo $user['User']['email']; ?>&nbsp;</td>
		<td><?php echo $user['User']['display_name']; ?>&nbsp;</td>
		<td><?php echo $user['User']['password']; ?>&nbsp;</td>
		<td><?php echo $user['User']['validation_token']; ?>&nbsp;</td>
		<td><?php echo $user['User']['validated']; ?>&nbsp;</td>
		<td><?php echo $user['User']['banned']; ?>&nbsp;</td>
		<td><?php echo $user['User']['created']; ?>&nbsp;</td>
		<td><?php echo $user['User']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	-->
	<?php echo $this->element('pagination'); ?>
</div>
<!--
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Submissions', true), array('controller' => 'submissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Submission', true), array('controller' => 'submissions', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->