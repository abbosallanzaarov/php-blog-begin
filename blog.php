<?php
$title = 'blog';

require './layouts/header.php';
require './layouts/carousel.php';
require('db.php');
$statement = $pdo->prepare('SELECT * FROM blog');
$statement->execute();
$posts = $statement->fetchAll();


//DELETE POST 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['DELTE']))
{
    $post_id = $_POST['post_id'];
    $stmt = $pdo->prepare('DELETE FROM blog WHERE id=?');
    $stmt->execute([$post_id]);
}

?>





<div class="album py-5 bg-light">
    <div class="container">
        <a href="post-create.php" class="btn btn-primary text-center m-3 mb-5  ">Post Yaratish</a>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach($posts as $post) :  ?>
            <div class="col">
                <div class=" shadow-sm">
                        <title>Bizning Blog</title>
                        <img src="https://www.shutterstock.com/image-photo/bloggingblog-concepts-ideas-white-worktable-260nw-1029506242.jpg" width="100%" height="100%" fill="#55595c"><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text>
                    
                    <div class="card-body">
                        
                    <h2>title:  <?= $post["title"]  ?></h2>
                        <h4>body:  <?= $post['body']?></h4>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="post-show.php?id=<?=$post['id'] ?>" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                                <form method="POST">
                                <input type="hidden" name="post_id" value="<?=$post['id'] ?>" >

                                    <input type="hidden" name="DELTE" >
                                <button type="submit" class="btn btn-sm btn-outline-danger">delete</button>
                                </form>
                            </div>
                            <small class="text-muted"><?= rand(1,60)?> min</small>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach;  ?>
        </div>
    </div>
</div>
</div>


<?php require './layouts/footer.php'; ?>