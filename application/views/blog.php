<!DOCTYPE html>
<html lang="en">
<body>
    <div class="container">
    <h1>Artikel Terbaru</h1>
    <?php if ($email != NULL){?>
        <a class="btn btn-primary" href="<?php echo site_url('/blog/add/')?>">Tambah Artikel</a>
    <?php }?>
    <?php foreach ($blogs as $key => $blog):?>
        <div class="blog">
            <h2>
                <a href="<?php echo site_url('blog/detail/'.$blog['url']);?>">
                    <?php echo $blog['title']?>
                </a>
            </h2>
            <?php echo $blog['content']?>
            <?php if ($email != NULL){?>
            <a class="btn btn-primary" href="<?php echo site_url('/blog/edit/'.$blog['id'])?>">Edit</a>
            <a class="btn btn-primary" href="<?php echo site_url('/blog/delete/'.$blog['id'])?>">Delete</a>
            <?php }?>
            <?php endforeach; ?>
            
        </div>
    </div>

    
</body>
</html>