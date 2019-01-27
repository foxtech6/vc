<?php

namespace Kernel;

use Kernel\Exceptions\NotFoundException;

/**
 * Class AbstractController
 *
 * @author Mykhailo Bavdys <bavdysmyh@ukr.net>
 * @since 28.01.2019
 */
abstract class AbstractController
{
    /**
     * Path to views
     */
    protected const VIEW_PATH = PROJECT_PATH . '/views/%s.php';

    /**
     * Path to layouts
     */
    protected const LAYOUT_PATH = PROJECT_PATH . '/views/layouts/';

    /**
     * Params send to view
     *
     * @var array
     */
    private $params;

    /**
     * Which view include
     *
     * @var string
     */
    private $view;

    /**
     * View render
     *
     * @param string $view   Params send to view
     * @param array  $params Which view include
     *
     * @throws NotFoundException
     */
    public function render(string $view, array $params = [])
    {

        $this->view = sprintf(self::VIEW_PATH, $view);

        if (!is_readable($this->view)) {
            throw new NotFoundException('View ' . $view . ' not found');
        }

        $this->params = $params;
    }

    /**
     * Controller destructor
     */
    public function __destruct()
    {
        extract($this->params);
        require_once self::LAYOUT_PATH . 'header.html';
        require_once $this->view;
        require_once self::LAYOUT_PATH . 'footer.html';
    }
}