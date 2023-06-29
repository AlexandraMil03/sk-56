<?
    include 'settings.php';
    @$sqli=new mysqli("localhost", "$sql_connect_login", "$sql_connect_password", "$sql_connect_name");
    if (mysqli_connect_errno())
    {
        die('error');
    }

    $form_password = md5($_POST['pass']);
    $DB=$sqli->query("SELECT * FROM `user` WHERE `password` = '".$form_password."'")->fetch_assoc();
    if($form_password == $DB['password'])
    {
        // SetCookie('password',$DB['user_password'],time()+3600*24*365, '/',$system_url);
        die('success');
    } else {
        die('error');
    }
?>