<?php
require('connexion.php');

$conn = Connect::connexion();
$NewsletterManager = new NewsletterManager($conn);
$NewsletterManager->add($_POST['email']);
header("Location: index.php");
?>
