<?php
include '../dir/connectdb.php';
if(isset($_POST['password']) and md5($_POST['password']) == '202cb962ac59075b964b07152d234b70'){
    $_SESSION['auth'] = true;

    $_SESSION['message'] = [
        'status'=>'success',
        'text'=>'You have logined!'
    ];
    header('Location: /blog/admin/index.php'); die();
}
else{
    ?>
    <form method="POST">
        <input type="password" name="password"><br>
        <input type="submit" value="Send">
    </form>
    <?php
}