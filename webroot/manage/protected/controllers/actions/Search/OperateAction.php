<?php
class OperateAction extends Action
{
    public $searchForm;

    public function run()
    {
        $keyword = $this->_POST['keyword'];
        if(empty($keyword)) $this->put();
        try {
            $this->searchForm = new SearchForm();
            $this->searchForm->keyword = $keyword;
            $result = $this->searchForm->search($keyword);
            $this->code = $result['code'];
            $this->message = $result['message'];
            $this->data = $this->code ? '' : $this->controller->smartyRender('__table', $result['data'], '', '', '', true);
            // $this->data = $result['data'];
        } catch (Exception $e) {
            WapLogger::getLogger('itmanager')->info('[搜索功能报错]：'. $e->__toString());
            $this->code = 1;
            $this->message = $e->getMessage();
        }
        $this->put();
    }
}