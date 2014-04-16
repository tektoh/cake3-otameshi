<div class="users index">
	<h2><?= __('Users'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?= $this->Paginator->sort('id'); ?></th>
			<th><?= $this->Paginator->sort('created'); ?></th>
			<th><?= $this->Paginator->sort('modified'); ?></th>
			<th><?= $this->Paginator->sort('username'); ?></th>
			<th><?= $this->Paginator->sort('password'); ?></th>
			<th class="actions"><?= __('Actions'); ?></th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?= h($user->id); ?>&nbsp;</td>
		<td><?= h($user->created); ?>&nbsp;</td>
		<td><?= h($user->modified); ?>&nbsp;</td>
		<td><?= h($user->username); ?>&nbsp;</td>
		<td><?= h($user->password); ?>&nbsp;</td>
		<td class="actions">
			<?= $this->Html->link(__('View'), ['action' => 'view', $user->id]); ?>
			<?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]); ?>
			<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], [], __('Are you sure you want to delete # %s?', $user->id)); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter();
	?></p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'));
		echo $this->Paginator->numbers();
		echo $this->Paginator->next(__('next') . ' >');
	?>
	</div>
</div>
<div class="actions">
	<h3><?= __('Actions'); ?></h3>
	<ul>
		<li><?= $this->Html->link(__('New User'), ['action' => 'add']); ?></li>
	</ul>
</div>
