<!DOCTYPE html>
<html lang="en">
<body>
    <div class="container">
        <h3>Daftar AKun</h3>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($accounts as $account) {?>
                <tr>
                    <td><?=$account->id?></td>
                    <td><?=$account->username?></td>
                    <td><?=$account->email?></td>
                    <td>
                        <a href="<?= site_url('auth/editAccount/'.$account->id)?>">Edit</a>
                        <a href="">Reset Password</a> 
                        <a href="<?= site_url('auth/deleteAccount/'.$account->id)?>">Delete</a>
                    </td>
                </tr>
            <?php }?>
        </table>
    </div>
</body>
</html>