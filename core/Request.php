<?php


namespace core;


class Request
{

    public function method($method = null)
    {

        if (!empty($method))
            return strtolower($_SERVER['REQUEST_METHOD']) == strtolower($method);

        return strtolower($_SERVER['REQUEST_METHOD']);

    }

    public function get($name, $type = null)
    {
        $value = null;
        if (isset($_GET[$name]))
            $value = $_GET[$name];

        if (!empty($type) && is_array($value))
            return \reset($value);

        if ($type == 'string')
            return \strval(preg_replace('/[^\p{L}\p{Nd}\d\s_\-\.\%\s]/ui', '', $value));

        if ($type == 'integer')
            return \intval($value);

        if ($type == 'float')
            return \floatval($value);

        if ($type == 'boolean')
            return !empty($value);

        return $value;

    }

    public function post($name, $type = null)
    {

        $value = null;
        if (!empty($name) && isset($_POST[$name]))
            $value = $_POST[$name];

        if ($type == 'string')
            return strval($value);

        if ($type == 'integer')
            return intval($value);

        if ($type == 'float')
            return floatval($value);

        if ($type == 'boolean')
            return !empty($value);

        return $value;

    }

    public function files($name, $secondName)
    {

        if (!empty($secondName) && !empty($_FILES[$name][$secondName]))
            return $_FILES[$name][$secondName];

        if (empty($secondName) && !empty($_FILES[$name]))
            return $_FILES[$name];

        return null;

    }

    public function url($params = array()) {

        $url = @parse_url($_SERVER["REQUEST_URI"]);
        parse_str($url['query'], $query);

        foreach($query as &$v)
            if(!is_array($v))
                $v = stripslashes(urldecode($v));

        foreach ($params as $name => $value)
            $query[$name] = $value;

        $query_is_empty = false;
        foreach ($query as $name => $value) {
            if ($value !== '' && $value !== null) {
                $query_is_empty = true;
            }
        }

        if ($query_is_empty) {
            $url['query'] = http_build_query($query);
        } else {
            $url['query'] = null;
        }

        return http_build_url(null, $url);

    }

}