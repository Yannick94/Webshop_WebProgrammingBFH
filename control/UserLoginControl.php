<?php
class UserLoginController {
    private $userLogin;

    public function __construct(UserLogin $userLogin) {
        $this->userLogin = $userLogin;
    }
}
?>