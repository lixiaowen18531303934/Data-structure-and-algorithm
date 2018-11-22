<?php
//php实现循环链表
class Node{
	public $data;//数据域
	public $next;//指针域
	public function __construct($data=null){
		$this->data=$data;
		$this->next=null;
	}
}

class CycleLinkList{
	public $head;
	
	public function __construct(){
		$this->head=new Node();
		$this->head->next=$this->head;
	}
	//添加一个节点
	public function add($data){
		$newnode=new Node();//创建一个新节点
		$newnode->data=$data;//给新节点数据域赋值
		$current=$this->head;
		while($current->next != $this->head){//如果头结点和某个节点的尾节点相等退出循环
			$current=$current->next;
		}
		$temporary=$current->next;//将尾节点赋值给临时变量
		$newnode->next=$temporary;//新节点的尾节点等于原未接节点的节点
		$current->next=$newnode;//将新节点添加到尾节
		return true;
	}
	//统计循环链表有多少个节点
	public function count(){
	    $current=$this->head;
	    $i=0;
	    while($current->next != $this->head){
	        $current=$current->next;
	        $i++;
	    }
	    return $i;
	}
	//删除一个节点
	public function del($no){
	    if($no>$this->count()){
	        echo '超出队列总数';
	        exit();
	    }
	    $current=$this->head;
	    for($i=1;$i<$no;$i++){
	        $current=$current->next;
	    }
	    $temporary=$current->next->next;
	    $current->next=$temporary;
	    return true;
	}
	//更新一个节点
	public function update($no,$data){
	    $current=$this->head;
	    if($no>$this->count()){
	        echo '超出链表总数';
	        exit();
	    }
	    for($i=0;$i<$no;$i++){
	        $current=$current->next;
	    }
	    $current->data=$data;
	    return true;
	}
}

$cyclelinklist=new CycleLinkList;
$cyclelinklist->add('a');
$cyclelinklist->add('b');
$cyclelinklist->add('c');
$cyclelinklist->add('d');
$cyclelinklist->add('e');
echo $cyclelinklist->count();
$cyclelinklist->del(3);
$cyclelinklist->update(3,'z');
