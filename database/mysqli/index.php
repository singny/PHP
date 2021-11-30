<?php
$conn = mysqli_connect('localhost', 'root', 'tldms4658', 'opentutorials');

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn,$sql);
$list = '';
while($row = mysqli_fetch_array($result)){
    $escaped_title = htmlspecialchars($row['title']);   // XSS 방지
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

$article = array(
    'title'=>'Welcome',
    'description'=>'Hello, web'
);
$update_link = '';
$delete_link = '';
$author = '';
if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);   // SQL Injection 방지
    $sql = "SELECT * FROM topic LEFT JOIN author ON topic.author_id = author.id WHERE topic.id={$filtered_id}";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $article['title'] = htmlspecialchars($row['title']);    // XSS 방지
    $article['description'] = htmlspecialchars($row['description']);    // XSS 방지
    $article['name'] = htmlspecialchars($row['name']);    // XSS 방지
    
    $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
    $delete_link = '
        <form action="process_delete.php" method="post">
            <input type="hidden" name="id" value="'.$_GET['id'].'">
            <input type="submit" value="delete">
        </form>
    ';
    $author = "<p>by {$article['name']}</p>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="utf-8">
        <title>WEB</title>
    </head>
    <body>
        <h1><a href="index.php">WEB</a></h1>
        <p><a href="author.php">author</a></p>
        <ol><?=$list?></ol>
        <a href="create.php">create</a>
        <?=$update_link?>
        <?=$delete_link?>
        <h2><?=$article['title']?></h2>
        <?=$article['description']?>
        <?=$author?>
    </body>
</html>
