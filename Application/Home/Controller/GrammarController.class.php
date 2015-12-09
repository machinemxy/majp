<?php
namespace Home\Controller;
use Think\Controller;
class GrammarController extends Controller {
    public function index($id=0){
        //文法抽出
        $Grammar = M('Grammar');
        $grammar = $Grammar->find($id);
        if($grammar){
            $this->assign('grammar', $grammar);
        }else{
            $this->error('該当記録なし。');
        }
        
        //例文抽出
        $Sentence = M('Sentence');
        $sentences = $Sentence->where('grammar_id='.$id)->order('id desc')->select();
        $this->assign('sentences',$sentences);
        
        $this->display();
    }
	
	public function insert(){
		$Grammar = D('Grammar');
		if($Grammar->create()) {
			$result = $Grammar->add();
			if($result) {
				$this->success('新規成功。','/Home/Index/index');
			}else{
				$this->error('新規失敗。');
			}
		}else{
			$this->error($Grammar->getError());
		}
	}
        
    public function delete_confirm($id=0){
        $this->assign('id',$id);
        $this->display();
    }
        
    public function delete($id=0){
        $input_password = I('post.password');
            
        //データベース保存したパスワード取得
        $Coden = M('Coden');
        $coden = $Coden->find(1);
        $real_password = $coden['code'];
            
        if($input_password == $real_password){
            //文法削除
            $Grammar = M('Grammar');
            $result = $Grammar->delete($id);
                
            //例文削除
            $Sentence = M('Sentence');
            $Sentence->where('grammar_id='.$id)->delete();
                
            if(!empty($result)){
                $this->success('削除成功。','/Home/Index/index');
            }else{
                $this->error('削除失敗。','/Home/Grammar/index/id/'.$id);
            }
        }else{
            $this->error('管理パスワードは不正です。','/Home/Grammar/index/id/'.$id);
        }
    }
        
    public function edit($id=0){
        $Grammar = M('Grammar');
        $grammar = $Grammar->find($id);
        if($grammar){
            $this->assign('grammar',$grammar);
            $this->display();
        }else{
            $this->error('該当記録なし。');
        }
    }
    
    public function update($id=0){
        $Grammar = D('Grammar');
        if($Grammar->create()){
            $result = $Grammar->save();
            if($result){
                $this->success('更新成功。','/Home/Grammar/index/id/'.$id);
            }else{
                $this->error('更新失敗。');
            }
        }else{
            $this->error($Grammar->getError());
        }
    }
}