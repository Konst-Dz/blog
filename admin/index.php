<?php
include '../dir/connectdb.php';

if(!empty($_SESSION['auth'])){
if(isset($_GET['delete'])){
    $delete = $_GET['delete'];
    $query = "DELETE FROM article WHERE id = '$delete'";
    mysqli_query($connect,$query) or die(mysqli_error($connect));
    $_SESSION['message'] =[
    'status' => 'success',
    'text' => 'This page has been deleted successfully'
    ];
    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";
}

$content = "<table>";

$query = "SELECT id,url,title,articletitle FROM article WHERE url != '404' ";
$result = mysqli_query($connect,$query) or die(mysqli_error($connect));
for($data=[];$row = mysqli_fetch_assoc($result);$data[] = $row);

$content .= "<tr><th>id</th><th>url</th><th>title</th><th>articletitle</th><th>edit</th><th>delete</th></tr>";
foreach ($data as $page) {

$content .= "<tr><td>{$page['id']}</td><td>{$page['url']}</td><td>{$page['title']}</td><td>{$page['articletitle']}</td>
<td><a href=\"edit.php?edit={$page['id']}\">edit</a></td><td><a href=\"?delete={$page['id']}\">delete</a></td></tr>";
}

$content .= "</table>";
$title = 'admin page';
include "dir/layout.php";
}
else{
header('Location: /blog/admin/login.php');
}