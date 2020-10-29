<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (!empty($_POST['user-name']) && !empty($_POST['user-email'])){
  if (isset($_POST['user-name'])) {
    if (!empty($_POST['user-name'])){
  $name = strip_tags($_POST['user-name']);
  $nameFieldset = "Имя: ";
  }
}
if (isset($_POST['user-email'])) {
  if (!empty($_POST['user-email'])){
  $email = strip_tags($_POST['user-email']);
  $emailFieldset = "Email: ";
  }
}
if (isset($_POST['user-message'])) {
  if (!empty($_POST['user-message'])){
  $message = strip_tags($_POST['user-message']);
  $messageFieldset = "Сообщение: ";
  }
}
$token = "1018441370:AAGfozb1UzWWsvfaXjYXWEx74DYOBP9j4xo";
$chat_id = "-356313286";
$arr = array(
  $nameFieldset => $name,
  $emailFieldset => $email,
  $messageFieldset => $message
);
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
if ($sendToTelegram) {

  echo '<p class="success">Thanks for sending your message!</p>';
    return true;
} else {
  echo '<p class="fail"><b>Error. Message not sent!</b></p>';
}
} else {
  echo '<p class="fail">Error. You did not fill in all required fields!</p>';
}
} else {
header ("Location: https://app.okshimel.shop/");
}
?>




