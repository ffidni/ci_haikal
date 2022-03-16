<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container">
    <h3>Register</h3>
    <form action="<?= site_url('auth/registerProcess/')?>" method="POST">
        <table>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" id=""></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" id=""></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id=""></td>
            </tr>
            <tr>
                <td><input type="submit" value="Login"></td>
            </tr>
        </table>
    </form>
    <p>Sudah punya akun? <a href="<?= site_url('auth/login/')?>">Login</a></p>
    
    </div>

</body>
</html>