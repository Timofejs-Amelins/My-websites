<?php
$host = "localhost";
$user = "root";
$password = "123456";
$dbname = "pdoposts";

// Set DSN
$dsn = "mysql:host=" . $host . ";dbname=" . $dbname;

// Create a PDO instance
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
# PDO QUERY

// $stmt = $pdo->query("select * from posts");

// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     echo $row["title"] . "<br>";
// }

// while ($row = $stmt->fetch()) {
//     echo $row->title . "<br>";
// }

# PREPARED STATEMENTS (prepare & execute)

// UNSAFE
//$sql = "select * from posts where author = '$author'";

// FETCH MULTIPLE POSTS

// User input
$author = "Brad";
$is_published = true;
$id = 1;
$limit = 1;

// Positional Params
$sql = "select * from posts where author = ? && is_published = ? limit ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$author, $is_published, $limit]);
$posts = $stmt->fetchAll();

// Named Params
// $sql = "select * from posts where author = :author && is_published = :is_published";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(["author" => $author, "is_published" => $is_published]);
// $posts = $stmt->fetchAll();

// //var_dump($posts);
foreach ($posts as $post) {
    echo $post->title . "<br>";
}

// FETCH SINGLE POST
// $sql = "select * from posts where id = :id";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(["id" => $id]);
// $post = $stmt->fetch();

// echo $post->body;

// GET ROW COUNT
// $stmt = $pdo->prepare("select * from posts where author = ?");
// $stmt->execute([$author]);
// $post_count = $stmt->rowCount();
// echo $post_count;
// $title = "Post Five";
// $body = "This is post five";
// $author = "Kevin";

// $sql = "insert into posts (title, body, author) values(:title, :body, :author)";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(["title" => $title, "body" => $body, "author" => $author]);
// echo "Post Added";

// UPDATE DATA
// $id = 1;
// $body = "This is the updated post";

// $sql = "update posts set body = :body where id = :id";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(["body" => $body, "id" => $id]);
// echo "Post Updated";


// DELETE DATA
// $id = 3;

// $sql = "delete from posts where id = :id";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(["id" => $id]);
// echo "Post Deleted";

// SEARCH DATA
// $search = "%f%";
// $sql = "select * from posts where title like ?";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$search]);
// $posts = $stmt->fetchAll();

// foreach ($posts as $post) {
//     echo $post->title . "<br>";
// }
