<?php
$title = 'Post Ko\'ring';
require './layouts/header.php';
require('db.php');
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM blog WHERE id = :id");
$stmt->execute(array(':id' => $id));
$post = $stmt->fetch();
?>

<div class="container mt-5 text-center w-100 ">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 w-70">
        <div class="col-6">
            <div class=" shadow-sm">
                <title>Bizning Blog</title>
                <img src="https://www.shutterstock.com/image-photo/bloggingblog-concepts-ideas-white-worktable-260nw-1029506242.jpg" width="100%" height="100%" fill="#55595c"><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text>

                <div class="card-body">

                    <h2>title: <?= $post["title"]  ?></h2>
                    <h4>body: <?= $post['body'] ?></h4>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">9 mins</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 d-flex flex-reverse">
            <span>Biz qimizda: lorem ipsun emat balo battar</span>
            <span>Tel: +9985445454</span>
            <span>Manzil: Beruniy tuman shu yerda</span>

        </div>
    </div>


</div>


<?php require './layouts/footer.php'; ?>