<?php
/**
 * @var array $users
 */
?>

<h1 class="text-center">Liste des utilisateurs</h1>
<div class="text-end me-5">
    <a href="index.php?component=user&action=create">
        <i class="fa-solid fa-user-plus fa-2xl" style="color: black"></i>
    </a>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">Enable</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach($users as $user) :?>
        <tr class="table align-middle">
            <td><?php echo$user['id']?></td>
            <td><?php echo$user['username']?></td>
            <td>
                <a href="index.php?component=users&action=toggle-enabled&id=<?php echo $user['id']?>">
                    <i
                            class="fa-solid
                            <?php
                                echo $user['enabled'] ?
                                    "fa-user-check text-success" :
                                    "fa-user-lock text-danger"
                            ?>"
                    >

                    </i>
                </a>
            </td>
            <td>
                <a href="index.php?component=users&action=delete&id=<?php echo $user['id']?>">
                    <i class="fa-solid fa-trash text-danger"></i>
                </a>
                <a href="index.php?component=user&action=edit&id=<?php echo $user['id']?>">
                    <i class="fa-solid fa-user-pen"></i>
                </a>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>


</table>
