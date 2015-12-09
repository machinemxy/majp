<?php
namespace Home\Controller;
use Think\Controller;
class SentenceController extends Controller {
    public function add($grammar_id=0){
        //文法抽出
        $Grammar = M('Grammar');
        $grammar = $Grammar->find($grammar_id);
        if($grammar){
            $this->assign('grammar', $grammar);
        }else{
            $this->error('該当記録なし。');
        }
        
        $this->display();
    }
    
    public function insert($grammar_id=0){
        $Sentence = D('Sentence');
        if($Sentence->create()){
            $result = $Sentence->add();
            //例文数更新
            $this->update_sentence_count($grammar_id);
            if($result){
                $this->success('例文新規成功。','/Home/Grammar/index/id/'.$grammar_id);
            }else{
                $this->error('例文新規失敗。');
            }
        }else{
			$this->error($Sentence->getError());
		}
    }
    
    public function delete_confirm($grammar_id=0,$id=0){
        $this->assign('grammar_id',$grammar_id);
        $this->assign('id',$id);
        $this->display();
    }
    
    public function delete($grammar_id=0,$id=0){
        $input_password = I('post.password');
            
        //データベース保存したパスワード取得
        $Coden = M('Coden');
        $coden = $Coden->find(1);
        $real_password = $coden['code'];
            
        if($input_password == $real_password){
            //例文削除
            $Sentence = M('Sentence');
            $result = $Sentence->delete($id);
                
            //例文数更新
            $this->update_sentence_count($grammar_id);
                
            if(!empty($result)){
                $this->success('例句削除成功。','/Home/Grammar/index/id/'.$grammar_id);
            }else{
                $this->error('例句削除失敗。','/Home/Grammar/index/id/'.$grammar_id);
            }
        }else{
            $this->error('管理パスワードは不正です。','/Home/Grammar/index/id/'.$grammar_id);
        }
    }
    
    private function update_sentence_count($grammar_id=0){
        $Sentence = M('Sentence');
        $sentence_count = $Sentence->where('grammar_id='.$grammar_id)->count();
        
        $Grammar = D('Grammar');
        $grammar = $Grammar->find($grammar_id);
        $grammar['sentence_count'] = $sentence_count;
        $Grammar->save($grammar);
    }
}
