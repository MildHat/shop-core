<?php


namespace app\components;


use core\Request;

class UserValidation
{

    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Checks if registration fields are filled email|username|password
     *
     * @return bool
     */
    public function validateUserRegistration() : bool
    {
        if (!$this->checkEmail())
            return false;

        if (!$this->checkUsername())
            return false;

        if (!$this->checkPassword())
            return false;

        return true;
    }

    /**
     * Checks if login fields are filled email|password
     *
     * @return bool
     */
    public function validateUserLogin() : bool
    {
        if (!$this->checkEmail())
            return false;

        if (!$this->checkPassword())
            return false;

        return true;
    }

    /**
     * Email validation
     *
     * @return bool
     */
    private function checkEmail() : bool
    {
        if ($this->request->post('email', 'boolean')) {

            $email = $this->request->post('email');

            if (filter_var($email, FILTER_VALIDATE_EMAIL))
                return true;

        }

        return false;
    }

    /**
     * Username validation
     *
     * @return bool
     */
    private function checkUsername() : bool
    {
        if ($this->request->post('email', 'boolean')) {
            return true;
        }

        return false;

    }

    /**
     * Password validation
     *
     * @return bool
     */
    private function checkPassword() : bool
    {
        if ($this->request->post('password', 'boolean')) {
            return true;
        }

        return false;
    }

}