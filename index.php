<?
include 'dir/connectdb.php';

if(!empty($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page = '/blog';
}

$query = "SELECT * FROM article WHERE url = '$page'";
$result = mysqli_query($connect,$query) or die(mysqli_error($connect));
$user = mysqli_fetch_assoc($result);

if(empty($user)){
    $query = "SELECT * FROM article WHERE url='404'";
    $result = mysqli_query($connect,$query) or die(mysqli_error($connect));
    $user = mysqli_fetch_assoc($result);
    header("HTTP/1.0 404 Not Found");
}

$title = $user['title'];
$articleTitle = $user['articletitle'];

if($user['url'] == '/blog'){
    $query = "SELECT * FROM article WHERE url!='404' AND url!='/blog' ORDER BY id DESC";
    $result = mysqli_query($connect,$query) or die(mysqli_error($connect));
    for($data=[];$row=mysqli_fetch_assoc($result);$data[]=$row);
    $article = "<ul>";
    foreach ( $data as $item) {
        $article .= "<li><a href='/blog/?page={$item['url']}'>{$item['articletitle']}</a></li>";
    }
    $article .= "</ul>";
}
else{
$article = $user['article'];
}
var_dump($user);
include 'dir/layout.php';
