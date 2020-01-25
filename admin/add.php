<?php
include '../dir/connectdb.php';
if(!empty($_SESSION['auth'])){

	
if(isset($_POST['url']) and isset($_POST['title']) and isset($_POST['article']))	{
$url = mysqli_real_escape_string($connect,$_POST['url']);
$title = mysqli_real_escape_string($connect,$_POST['title']);
$article = mysqli_real_escape_string($connect,$_POST['article']);
	}
	else{
		$url='';
		$title='';
		$article='';
	}
	
ob_start();
include 'dir/form.php';	
$content = ob_get_clean();

$title = 'add article page';

if(!empty($_POST['url']) and !empty($_POST['title']) and !empty($_POST['article'])){
    $url =$_POST['url'];
    $title =$_POST['title'];
    $article =$_POST['article'];
    $query = "SELECT COUNT(*) AS count FROM article WHERE url='$url'";
$result = mysqli_query($connect,$query) or die(mysqli_error($connect));
$isPage = mysqli_fetch_assoc($result)['count'];
if($isPage){
	$_SESSION['message'] = [
 	     'status' => 'error',
 	     'text' => 'Page with this url exists'];
  }
  else{
    $query = "INSERT INTO article (url,title,articletitle,article) VALUES ('$url','$title','$title','$article') ";
    $result = mysqli_query($connect,$query) or die(mysqli_error($connect));
$_SESSION['message'] = [
 	     'status' => 'success',
 	     'text' => 'Page '.$url.' has been added!'];
header('Location: /blog/admin/');die();	     
    }
}
include 'dir/layout.php';
}
else{
header('Location: /blog/admin/login.php');
}