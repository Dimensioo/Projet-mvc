<?php
include_once('config.php');
include_once('models/user.php');

$user = new User;
$users = $user->readAllUser();