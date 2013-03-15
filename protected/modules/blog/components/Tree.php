<?php
class Tree{
	//generate tree

	private $arr;//
	private $str;

	public function pro($data){
		$this->arr = $data;
	}

	private function get_child($id){
		$newarr = array();
		foreach($this->arr as $n => $row){
			if($row['Fid'] == $id){
				$newarr[] = $row;
			}
		}
		return $newarr;
	}

	public function gettree($id=0){
		if(!empty($this->arr)&&is_array($this->arr)){
			$children = $this->get_child($id);
			$number = 1;
			if($childnum = count($children)){
				$this->str .= "<ul>";
				foreach($children as $key => $val){
					$this->str .= "<li>".$val['ClassName'];
					$this->gettree($val['Cid']);
					if($number == $childnum){
						$this->str .= "</li></ul>";
					}else{
						$this->str .= "</li>";						
					}
					$number++;
				}
			}
		}
		return $this->str;
	}

}
?>
