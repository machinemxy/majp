<?php
namespace Home\Model;
use Think\Model;
class SentenceModel extends Model {
	protected $_validate = array(
		array('sentence','require','「例文」を記入してください。'),
	);
}