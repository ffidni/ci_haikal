<!DOCTYPE html>
<html lang="en">
<body>
    <div class="container">
    <h1>Edit Artikel</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="">Judul</label></td>
                <td><input type="text" name="title" value="<?php echo $blog['title']; ?>"></td>
            </tr>
            <tr>
                <td><label for="" >Konten</label></td>
                <td><textarea name="content" id="" cols="30" rows="10"><?php echo $blog['content']; ?></textarea></td>
            </tr>
            <tr>
                <td><label for="">URL</label></td>
                <td><input type="text" name="url" value="<?php echo $blog['url']; ?>"></td>
            </tr>
            <tr>
                <td  colspan="2" align="center"><button type="submit">Simpan Artikel</button></td>
            </tr>
        </table>    
    </form>
    </div>

</body>
</html>