<?php


namespace core;


class Response
{

    private $headers;
    private $code;
    private $content;

    public function __construct(string $content = '', int $code = 200, array $headers = [])
    {
        $this->content = $content;
        $this->code = $code;
        $this->headers = $headers;
    }

    public function setHeader(string $name, string $value)
    {
        $this->headers[$name] = $value;
        return true;
    }

    public function getHeader(string $name)
    {
        if (\array_key_exists($name, $this->headers))
            return $this->headers[$name];

    }

    public function setHeaders(array $headers)
    {
        foreach ($headers as $name => $value)
            $this->headers[$name] = $value;
        return true;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function setCode(int $code)
    {
        $this->code = $code;
        return true;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function content($content = null)
    {
        if (empty($content))
            return $this->content;

        $this->content = $content;
        return true;
    }

    public function send()
    {
        $this->sendHeaders();

        $this->sendContent();
    }

    private function sendHeaders()
    {
        foreach ($this->headers as $header => $value) {
            header($header . ':' . $value);
        }

    }

    private function sendContent()
    {
        echo $this->content;
    }

    public function redirectBack(string $url = '', int $code = 302)
    {

        if ($url === '' && isset($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            http_response_code($code);
            exit;
        }

        header('Location: /');
        exit;

    }

    public function redirect(string $url = '', int $code = 302)
    {

        if ($url === '') {
            $url = '/';
        }

        header('Location: ' . $url);
        http_response_code($code);
        exit;

    }

}