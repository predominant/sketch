<div class="projects index">
	<h2><?php __('Projects');?></h2>
	<div class="clearfix">
		<?php foreach ($projects as $project): ?>
			<div class="project-summary">
				<?php echo $this->Html->image('spacer.png', array('class' => 'main-image', 'alt' => $project['Project']['name'])); ?>
				<h3 class="display-name"><?php echo $this->Html->link(
					$project['Project']['name'],
					array('controller' => 'projects', 'action' => 'view', $project['Project']['id'])); ?></h3>
				<?php foreach ($project['Submission'] as $submission): ?>
					<div class="user-thumb">
						<?php echo $this->Html->link(
							$this->Gravatar->image(
								$submission['User']['email'],
								array(
									'size' => 65,
									'default' => Router::url('/img/spacer.png', true),
									'alt' => $submission['User']['display_name'])),
							array('controller' => 'users', 'action' => 'view', $submission['User']['id']),
							array('escape' => false)); ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
	</div>

<!--
<div class="projects index">
	<h2><?php __('Projects');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('open');?></th>
			<th><?php echo $this->Paginator->sort('submission_count');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($projects as $project):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $project['Project']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($project['User']['id'], array('controller' => 'users', 'action' => 'view', $project['User']['id'])); ?>
		</td>
		<td><?php echo $project['Project']['name']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['description']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['open']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['submission_count']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['created']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $project['Project']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $project['Project']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $project['Project']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $project['Project']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Project', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Submissions', true), array('controller' => 'submissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Submission', true), array('controller' => 'submissions', 'action' => 'add')); ?> </li>
	</ul>
</div>
-->