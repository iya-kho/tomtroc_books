<?php

/**
 * This class generates the views according to the parameters passed by each controller.
 */
class View 
{
    /**
     * Title of the page.
     */
    private string $title;
    /**
     * Connected user.
     */
    private ?User $user = null;
    
    
    /**
     * Constructor. 
     */
    public function __construct($title) 
    {
        $this->title = $title;
        $this->user = Utils::getUserSession();
    }
    
    /**
     * This method returns a complete page.
     * @param string $viewPath : the path of the view required by the controller. 
     * @param array $params : parameters passed by the controller.
     * @return string
     */
    public function render(string $viewName, array $params = []) : void 
    {
        // Build the path to the requested view.
        $viewPath = $this->buildViewPath($viewName);
        
        // The two variables below are used in the "main.php" which is the main template.
        $content = $this->renderViewFromTemplate($viewPath, $params);
        $title = $this->title;
        $user = $this->user;
        ob_start();
        require(MAIN_VIEW_PATH);
        echo ob_get_clean();
    }
    
    /**
     * Generate what the controller has requested.
     * @param $viewPath : path to the view requested by the controller.
     * @param array $params : parameters that the controller sent to the view.
     * @throws Exception : if the view doesn't exist.
     * @return string : the content of the view.
     */
    private function renderViewFromTemplate(string $viewPath, array $params = []) : string
    {  
        if (file_exists($viewPath)) {
            extract($params); 
            ob_start();
            require($viewPath);
            return ob_get_clean();
        } else {
            throw new Exception("The view '$viewPath' wasn't found.");
        }
    }

    /**
     * This method builds the path to the requested view.
     * @param string $viewName : name of the requested view.
     * @return string : path to the requested view.
     */
    private function buildViewPath(string $viewName) : string
    {
        return TEMPLATE_VIEW_PATH . $viewName . '.php';
    }
}



