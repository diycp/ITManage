<?php
class SmartyViewRenderer extends CApplicationComponent implements IViewRenderer
{
    private $_smarty;

    public $fileExtension = '.html'; // or ".php" if you like

    public $basePath;

    public $controller;
 
    public function init()
    {
        $this->basePath = Yii::app()->basePath;
        $this->controller = Yii::app()->getController();

        $smartyPath = Yii::getPathOfAlias('application.vendor.Smarty');
        Yii::$classMap['Smarty'] = $smartyPath . '/Smarty.class.php';
        Yii::$classMap['Smarty_Internal_Data'] = $smartyPath . '/sysplugins/smarty_internal_data.php';
        $this->_smarty = new Smarty();
        $this->_smarty->compile_dir = Yii::app()->getRuntimePath() . '/smarty/compile';
        $this->_smarty->cache_dir = Yii::app()->getRuntimePath() . '/smarty/cache';
        $this->_smarty->template_dir = $this->getTemplateDir();
        $this->_smarty->left_delimiter = '{#'; // chenge it if you want other delimiter
        $this->_smarty->right_delimiter = '#}';
        $this->_smarty->force_compile = true;
        Yii::registerAutoloader('smartyAutoload');

        return $this->_smarty;
    }
 
    public function renderFile($context, $file, $data, $return)
    {
        foreach ($data as $key => $value)
            $this->_smarty->assign($key, $value);
        $return = $this->_smarty->fetch($file);
        if ($return)
            return $return;
        else
            echo $return;
    }

    public function render($views, $data = array(), $themeID = '', $moduleID = '', $controllerID = '', $return = false)
    {
        $this->_smarty->template_dir = $this->getTemplateDir($themeID, $moduleID, $controllerID);
        foreach ($data as $key => $value) {
            $this->_smarty->assign($key, $value);
        }

        $templateDir = isset($this->_smarty->template_dir[0]) ? $this->_smarty->template_dir[0] : $this->controller->getViewPath();
        $file = $templateDir . '/' . $views . $this->fileExtension;
        $output = $this->_smarty->fetch($file);
        if ($return !== false) {
            return $output;
        } else {
            echo $output;
        }
    }

    public function getTemplateDir($themeID = '', $moduleID = '', $controllerID = '')
    {
        $themePath = $themeID ? 'themes/' . $themeID . '/' : '';
        if (empty($this->controller->module)) {
            $moduleID = '';
        } else {
            $moduleID = $moduleID ? : $this->controller->getModule()->id;
        }
        $controllerID = $controllerID ? : $this->controller->getId();

        $templateDir = '';
        if (!$moduleID) {
            $templateDir = $this->basePath . '/views/' . $themePath . $controllerID;
        } else {
            $templateDir = $this->basePath . '/modules/' . $moduleID . '/views/' . $controllerID;
        }
        return $templateDir;
    }


}