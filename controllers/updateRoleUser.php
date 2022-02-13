<?php
include_once('config.php');
include_once('models/user.php');
include_once('models/role.php');

if(isset($_POST['user']) && isset($_POST['role'])) {
    $role = new Role;
    $role->set_type_role(htmlspecialchars(strip_tags(trim($_POST['role']))));
    $result = $role->readRole();
    
    $user = new User;
    $user->set_id_role($result['id_role']);
    $user->set_pseudo_user(htmlspecialchars(strip_tags(trim($_POST['user']))));
    
    $user->updateRoleUser();
}