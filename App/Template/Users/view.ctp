<div class="users view">
<h2><?= __('User'); ?></h2>
	<dl>
		<dt><?= __('Id'); ?></dt>
		<dd>
			<?= h($user->id); ?>
			&nbsp;
		</dd>
		<dt><?= __('Created'); ?></dt>
		<dd>
			<?= h($user->created); ?>
			&nbsp;
		</dd>
		<dt><?= __('Modified'); ?></dt>
		<dd>
			<?= h($user->modified); ?>
			&nbsp;
		</dd>
		<dt><?= __('Username'); ?></dt>
		<dd>
			<?= h($user->username); ?>
			&nbsp;
		</dd>
		<dt><?= __('Password'); ?></dt>
		<dd>
			<?= h($user->password); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]); ?> </li>
		<li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], [], __('Are you sure you want to delete # %s?', $user->id)); ?> </li>
		<li><?= $this->Html->link(__('List Users'), ['action' => 'index']); ?> </li>
		<li><?= $this->Html->link(__('New User'), ['action' => 'add']); ?> </li>
	</ul>
</div>
