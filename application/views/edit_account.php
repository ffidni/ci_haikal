<!DOCTYPE html>
<html lang="en">
<body>
    <div class="container">
    <h3>Edit Akun</h3>
    <form action="<?= site_url('auth/editAccount/'.$id)?>" method="POST">
        <table>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" id="" value="<?= $account['email']?>"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" id="" value="<?= $account['username']?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id="" value="<?= $account['password']?>"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Ganti" ></td>
            </tr>
        </table>
    </form>
    </div>

</body>
</html>