<?php
function getTree($list,$pid=0,$level=0){
	static $tree=array();
	foreach($list as $row){
		//dump($row);die();
		if($row['pid'] == $pid){
			$row['level']=$level;
			
			$tree[] = $row;
			
			getTree($list,$row['id'],$level + 1);
			//dump($row);die();
		}
	}
	
	//dump($tree);die();
	return $tree;

}