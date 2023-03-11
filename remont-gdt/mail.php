<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251"/>
<title>Обратная связь</title>
</head>
<body>
<?php

if (isset($_POST['mess'])) {$mess = $_POST['mess'];}

if (empty($mess))
{
echo "<b>Сообщение не написано!<p>";
echo "<a href=index.php?page=index>Вернуться к заполнению формы</a>";
exit;
}
$to = "sagal7@ya.ru"; /*УКАЗАТЬ СВОЙ АДРЕС!*/
$headers = "Content-type: text/plain; charset = windows-1251";
$subject = "автоматик москва";
$message = "nСообщение: $mess";
$send = mail ($to, $subject, $message, $headers);
if ($send == 'true')
{
echo "<b>Спасибо за отправку вашего сообщения!<p>";
echo "<a href=http://automatic-moskva.ru/>Нажмите,</a> чтобы вернуться";
}
else
{
echo "<p><b>Ошибка. Сообщение не отправлено!";
}
?>

<!-- Google Code for &#1092;&#1086;&#1088;&#1084;&#1072; Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1014093726;
var google_conversion_language = "en";
var google_conversion_format = "2";
var google_conversion_color = "ffffff";
var google_conversion_label = "qwFVCNLJgwgQnq_H4wM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="2" width="2" style="border-style:solid;" alt="" src="//www.googleadservices.com/pagead/conversion/1014093726/?label=qwFVCNLJgwgQnq_H4wM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>


</body>
</html>