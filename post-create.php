<?php
$title = 'Post Yarating';
require './layouts/header.php';
require './layouts/carousel.php';

require 'db.php';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titles = $_POST['title'];
    $body = $_POST['body'];
    $statement = $pdo->prepare('INSERT INTO blog (title , body) VALUES (:title, :body)');
    $statement->execute([
        'title' => $titles,
        'body' => $body
    ]);
    header("Location: blog.php");
}
?>



<h4 class="text-center mt-3">
    Post Yaratish
</h4>

<form method="POST" class="container mt-5 p-4 shadow rounded">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Sarlavha</label>
        <input type="text" name="title" class="form-control border-primary" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Iltimos To'gri va Aniq Yozing buni boshqalar ko'rishi mumkin</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Matn</label>
        <textarea name="body" class="form-control  border-primary rounded"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Yaratish</button>
</form>

<?php require './layouts/footer.php'; ?>