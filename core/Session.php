<?php


namespace core;


class Session
{
    use TSingletone;

    /**
     * Name of session
     * @var string
     */
    private string $name = '';

    /**
     * Session save path
     * @var string
     */
    private string $savePath = '';

    /**
     * Sets Session name
     *
     * @param string $name
     * @return bool
     */
    public function setName(string $name) : bool
    {
        if($this->sessionExists())
            return false;

        $this->name = $name;
        session_name($name);
        return true;
    }

    /**
     * Returns Session name
     *
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Sets Session save path
     *
     * @param string $savePath
     * @return bool
     */
    public function setSavePath(string $savePath) : bool
    {
        if($this->sessionExists())
            return false;

        $this->savePath = $savePath;
        session_save_path($savePath);
        return true;
    }

    /**
     * Returns Session save path
     *
     * @return mixed
     */
    public function getSavePath()
    {
        return $this->savePath;
    }

    /**
     * Sets value by given key
     *
     * @param string $key
     * @param mixed $value
     * @return bool
     */
    public function set(string $key, $value) : bool
    {
        if($this->sessionExists()) {
            $_SESSION[$key] = $value;
            return true;
        }

        return false;
    }

    /**
     * Returns value by the given key
     *
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        if($this->sessionExists())
            return $_SESSION[$key];

        return false;
    }

    /**
     * Checks if a value exists by given key
     *
     * @param string $key
     * @return bool
     */
    public function contains(string $key) : bool
    {
        if($this->sessionExists())
            if (array_key_exists($key, $_SESSION))
                return true;

        return false;
    }

    /**
     * Delete value from the session by the given key
     *
     * @param string $key
     * @return bool
     */
    public function delete(string $key) : bool
    {
        if($this->sessionExists() && $this->contains($key)) {
            unset($_SESSION[$key]);
            return true;
        }

        return false;
    }

    /**
     * Start the session
     *
     * @return bool
     */
    public function start() : bool
    {
        if(!$this->sessionExists()) {
            session_start();
            return true;
        }

        return false;
    }

    /**
     * Checks if exists session cookie
     *
     * @return bool
     */
    public function cookieExists() : bool
    {
        if (isset($_COOKIE['PHPSESSID']))
            return true;

        return false;
    }

    /**
     * Checks if session exists
     *
     * @return bool
     */
    public function sessionExists() : bool
    {
        return session_status() === PHP_SESSION_ACTIVE ? true : false;
    }
}
