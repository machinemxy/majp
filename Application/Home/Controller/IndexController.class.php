<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$Grammar = M('Grammar');
                $count = $Grammar->count();
                $Page = new \Think\Page($count,20);
                $page_info = $Page->show();
                $grammars = $Grammar->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('grammars',$grammars);
                $this->assign('page_info',$page_info);
                $this->display();
    }
}