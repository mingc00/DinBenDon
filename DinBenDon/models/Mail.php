<?php
class Mail {
  public static function sendCancellation($email, $userName, $restName, $date, $link) {
    $title = 'Cancellation inform - DinBenDon';
    $message = "Dear $userName:\nYour reservation for $restName on $date is canceled by the issuer.\nYou can order another one by taking a look this link: $link";
    return mail($email, $title, $message);
  }

}

?>