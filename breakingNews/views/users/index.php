<?php $this->title = 'Users';?>

<h1><?=htmlspecialchars($this->title)?></h1>


<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Full name</th>

    </tr>
    <tr>

        <?php foreach ($this->users as $user):?>
        <td><?=$user['id']?></td>
        <td>
            <a href="<?=APP_ROOT?>/users/profile/<?= $user['id']?>">
            <?=htmlspecialchars($user['username'])?></td>
        </a>
        <td><?=htmlspecialchars($user['full_name'])?></td>

    </tr>
    <?php endforeach;?>
</table>