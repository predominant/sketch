<div class="submissions form">
<?php echo $this->Form->create('Submission');?>
	<fieldset>
 		<legend><?php __('Add Submission'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('project_id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('time_taken');
		echo $this->Form->input('file_name');
		echo $this->Form->input('file_size');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Submissions', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>