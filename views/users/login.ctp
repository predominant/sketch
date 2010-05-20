<div class="users form">
	<h2><?php __('User Login'); ?></h2>
<?php echo $this->Form->create('User', array('url' => array('action' => 'login'))); ?>
	<fieldset>
	<?php
	echo $this->Form->input('email');
	echo $this->Form->input('password');
	echo $this->Form->input('extra');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Login', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Submissions', true), array('controller' => 'submissions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Submission', true), array('controller' => 'submissions', 'action' => 'add')); ?> </li>
	</ul>
</div>