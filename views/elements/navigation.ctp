<ul id="navigation">
	<li><?php echo $this->Html->link(
		__('Home', true),
		'/', array('class' => 'current')); ?></li>
	<li><?php echo $this->Html->link(
		__('Latest', true),
		array('controller' => 'submissions', 'action' => 'latest')); ?></li>
	<li><?php echo $this->Html->link(
		__('Projects', true),
		array('controller' => 'projects', 'action' => 'index')); ?></li>
	<li><?php echo $this->Html->link(
		__('What The?', true),
		array('controller' => 'pages', 'action' => 'display', 'about')); ?></li>
	<li><?php echo $this->Html->link(
		__('Login', true),
		array('controller' => 'users', 'action' => 'login')); ?></li>
</ul>
