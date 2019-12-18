<?php


namespace core;


class Session
{
    use TSingletone;

    private $name = null;
    private $savePath = null;
    /**
     * @return mixed
     * @throws \Exception
     */
    public function setName($name) {
        if($this->sessionExists())
            throw new \Exception('Cannot set session name. Session already started');
        $this->name = $name;
        session_name($name);
    }
    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }
    /**
     * @param mixed $savePath
     * @throws \Exception
     */
    public function setSavePath($savePath) {
        if($this->sessionExists())
            throw new \Exception('Cannot set session name. Session already started');
        $this->savePath = $savePath;
        session_save_path($savePath);
    }
    /**
     * @return mixed
     */
    public function getSavePath()
    {
        return $this->savePath;
    }
    public function set($key, $value)
    {
        if($this->sessionExists()) {
            $_SESSION[$key] = $value;
            return true;
        }
        throw new \Exception('Cannot set value. Session is not started');
    }
    public function get($key)
    {
        if($this->sessionExists())
            return $_SESSION[$key];
        throw new \Exception('Cannot get value. Session is not started');
    }
    public function contains($key)
    {
        if($this->sessionExists()) {
            if(isset($_SESSION)) {
                if (array_key_exists($key, $_SESSION))
                    return true;
                return false;
            }
            return false;
        }
        throw new \Exception('Cannot check value. Session is not started');
    }
    public function delete($key)
    {
        if($this->sessionExists()) {
            if (array_key_exists($key, $_SESSION)) {
                unset($_SESSION[$key]);
                return true;
            }
            return false;
        }
        throw new \Exception('Cannot delete value. Session is not started');
    }
    public function start()
    {
        if(!$this->sessionExists()) {
            session_start();
            return true;
        }
        throw new \Exception('Session is already started');
    }
    public function cookieExists()
    {
        if (isset($_COOKIE['PHPSESSID']))
            return true;
        return false;
    }
    public function sessionExists()
    {
        if (session_status() == PHP_SESSION_NONE) {
            return false;
        } elseif (session_status() == PHP_SESSION_ACTIVE) {
            return true;
        }
    }
}
