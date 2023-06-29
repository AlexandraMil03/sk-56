<?
 $post = (!empty($_POST)) ? true : false;

      if($post)
      {
        $to  = 'west160321@gmail.com' . ', ';
        $to .= 'stal-kom@inbox.ru' . ', ';
        $to .= 'denisdstu@gmail.com' . ', ';
        $to .= 'denis_dstu@mail.ru' . ', ';
        $to .= 'ru249074@gmail.com';
        $email = trim($_POST['email']);
        $ip_adress_user = $_SERVER["REMOTE_ADDR"];
        $ip_adress_server = $_SERVER['HTTP_X_FORWARDED_FOR'];


            $subject ="Подписка на s-k56.ru";
            $subject1 = "=?utf-8?b?". base64_encode($subject) ."?=";

            // $message1 ="\n\nДобавить в рассылку адрес: ".$email."\n\nIP адрес отправителя: ".$ip_adress_user."\nIP адрес от провайдера: ".$ip_adress_server;    
			$message1 ="\n\nПолучил почту: : ".$email;

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= "Content-type: text/html; charset=utf-8 \r\n";

            $header .= "From: s-k56.ru <system@bot.com>\n\n";  
            $mail = mail($to, $subject1, iconv ('utf-8', 'utf-8', $message1), iconv ('utf-8', 'utf-8', $header));

      }
?>