<div class="users form">
<?= $this->Form->create($user); ?>
	<fieldset>
		<legend><?= __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>

		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], [], __('Are you sure you want to delete # %s?', $user->id)); ?></li>
		<li><?= $this->Html->link(__('List Users'), ['action' => 'index']); ?></li>
	</ul>
</div>
