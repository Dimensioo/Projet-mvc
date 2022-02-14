<?php
include_once('config.php');
include_once('models/role.php');

$role = new Role;
$roles = $role->readAllRole();