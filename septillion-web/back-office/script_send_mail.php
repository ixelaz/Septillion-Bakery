<?php
require('../BDD/Employee.php');
require('../BDD/EmployeeManager.php');
require('../BDD/Message.php');
require('../BDD/MessageManager.php');
$conn = new PDO("mysql:host=localhost;dbname=Septillion", "root");
$employeeManager = new EmployeeManager($conn);
$messageManager = new MessageManager($conn);

if ($employeeManager->getByMail($_POST['mail'])->id() == 0) {
  $erreur = 1;
  header('Location: mails.php?erreur=1');
  exit();
}

$messageData = array(
  "message_object" => $_POST['object'],
  "body" => $_POST['body'],
  "id_sender" => 1003,
  "id_receiver" => $employeeManager->getByMail($_POST['mail'])->id(),
);

$newMessage = new Message($messageData);
$idMessage = $messageManager->add($newMessage);
if ($idMessage == 0){
  $erreur = 2;
  header('Location: mails.php?erreur=2');
  exit();
} else {
  $erreur = 3;
  header('Location: mails.php?erreur=3');
  exit();
}
?>