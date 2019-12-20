<?php


namespace core;


class ErrorHandler
{
    public function __construct()
    {
        if (defined('DEBUG')) {
            if (DEBUG) {
                error_reporting(-1);
            } else {
                error_reporting(1);
            }
        }
        set_error_handler([$this, 'errorHandler']);
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function errorHandler($errorCode, $errorMessage, $errorFile, $errorLine)
    {
        $message = "Code: {$errorCode} | Message: {$errorMessage} | File: {$errorFile} | Line: {$errorLine}";
        switch ($errorCode) {
            case E_WARNING:
                App::$logger->warning($message);
                break;
            case E_NOTICE:
                App::$logger->notice($message);
                break;
            default:
                App::$logger->error($message);
        }
        $this->displayError($errorCode, $errorMessage, $errorFile, $errorLine);
    }

    public function fatalErrorHandler()
    {
        $error = error_get_last();
        if (!empty($error) && $error['type'] & (E_ERROR | E_COMPILE_ERROR | E_COMPILE_WARNING | E_CORE_ERROR | E_CORE_WARNING | E_PARSE)) {
            ob_end_clean();
            $error['message'] = preg_replace('#\n#', '', $error['message']);
            $message = "Code: {$error['type']} | Message: {$error['message']} | File: {$error['file']} | Line: {$error['line']}";
            App::$logger->critical($message);
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        } else {
            ob_end_flush();
        }
    }

    public function exceptionHandler($e)
    {
        $message = "Code: exception | Message: {$e->getMessage()} | File: {$e->getFile()} | Line: {$e->getLine()}";
        App::$logger->emergency($message);
        $this->displayError('exception', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    public function displayError($errorCode, $errorMessage, $errorFile, $errorLine, $response = 503)
    {
        http_response_code($response);
        if (DEBUG == false && $response == 404) {
            if (file_exists(dirname(__DIR__) . '/public/error/404.php'))
                return require dirname(__DIR__) . '/public/error/404.php';
        }

        if (DEBUG) {
            if (file_exists(dirname(__DIR__) . '/public/error/debug.php'))
                return require dirname(__DIR__) . '/public/error/debug.php';
        } else {
            if (file_exists(dirname(__DIR__) . '/public/error/production.php'))
                return require dirname(__DIR__) . '/public/error/production.php';
        }
    }
}