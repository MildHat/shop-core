<?php


namespace core\base\View;


class View implements ViewInterface
{

    /**
     * View Path
     *
     * @var string
     */
    private $viewPath;

    /**
     * Passed Data "variables" to the view path
     *
     * @var array
     */
    private $data = [];

    /**
     * The output from the view file
     * @var string
     */
    private $output;

    /**
     *
     */
    public function __construct($viewPath, $data)
    {
        $this->preparePath($viewPath);

        $this->data = $data;
    }

    /**
     * Prepare View Path
     *
     * @param string $viewPath
     * @return void
     * @throws \Exception
     */
    private function preparePath($viewPath)
    {
        $this->viewPath = ROOT . '/app/views/' . $viewPath . '.php';

        if (!$this->viewFileExists()) {
            throw new \Exception($viewPath . ' does not exists in views folder');
        }


    }

    /**
     * Determine if the view file exists
     *
     * @return bool
     */
    private function viewFileExists()
    {
        return file_exists($this->viewPath);
    }

    /**
     * @inheritDoc
     */
    public function getOutput()
    {
        if (is_null($this->output)) {
            ob_start();

            extract($this->data);

            require $this->viewPath;

            $content = ob_get_clean();

            ob_start();

            require ROOT . '/app/views/layouts/default.php';

            $this->output = ob_get_clean();

        }

        return $this->output;
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->getOutput();
    }
}