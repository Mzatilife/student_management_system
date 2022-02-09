<?php
class ManageUserContr extends ManageUser{
   
public function addUser($user_type, $rname, $user_program, $email, $username, $pwdcode){
return $this->registerUser($user_type, $rname, $user_program, $email, $username, $pwdcode);   
    }

public function userLogin($uname, $pword){
 return $this->loginUser($uname, $pword);
}
public function deactivateUser($userID, $status){
    return $this->userDeactivate($userID, $status);
}
public function deleteUser($userID){
    return $this->userDelete($userID);
}
public function changePassword($oldPass, $newPass, $confPass, $user_id)
{
    return $this->changesPassword($oldPass, $newPass, $confPass, $user_id);
}
public function resetPassword($username, $password)
    {
        return $this->resetsPassword($username, $password);
    }
}