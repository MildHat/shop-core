<?php


namespace core;


class Cache
{
    use TSingletone;

    public function set($key, $data = [], $time = 360)
    {
        if ($time) {
            $content['data'] = $data;
            $content['endTime'] = \time() + $time;
            file_put_contents(\dirname(__DIR__) . '/tmp/cache/' . md5($key) . '.txt', serialize($content));
            return true;
        }
        return false;
    }

    public function get($key)
    {
        $file = dirname(__DIR__) . '/tmp/cache/' . md5($key) . '.txt';
        if (file_exists($file)) {
            $content = unserialize(\file_get_contents($file));
            if (\time() <= $content['endTime']) {
                return $content;
            }
            unlink($file);
        }
        return false;
    }

    public function delete($key)
    {
        $file = dirname(__DIR__) . '/tmp/cache/' . md5($key) . '.txt';
        if (file_exists($file)) {
            unlink($file);
            return true;
        }
        return false;
    }
}
