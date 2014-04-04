<h1>Users</h1>

<ul>
<?php foreach ($users as $user): ?>
  <li>
    <ul>
      <li><?= $user['id'] ?></li>
      <li><?= $user['username'] ?></li>
      <li><?= $user['password'] ?></li>
    </ul>
  </li>
<?php endforeach ?>
</ul>
