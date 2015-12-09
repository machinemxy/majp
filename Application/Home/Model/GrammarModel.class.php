<?php
namespace Home\Model;
use Think\Model;
class GrammarModel extends Model {
	protected $_validate = array(
		array('grammar','require','「文法」は不可欠です。'),
		array('explanation','require','「解釈」は不可欠です。'),
	);
}