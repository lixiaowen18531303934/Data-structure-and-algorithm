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
	//去掉头结点（头结点只是标识循坏链表的起始点）
	public function remove(){
		$current=$this->head;
		while($current->next != $this->head){
			$current=$current->next;
		}
		$temporary=$current->next->next;//跳过头结点，指向第一个节点
		$current->next=$temporary;//将尾节点的指针指向第一个节点
		$this->head=$current->next;//改变循环指针
	}
}
//约瑟夫环
//生成一个由41个元素组成的循环链表
$newcyclelinklist=new CycleLinkList;
for($i=1;$i<42;$i++){
    $newcyclelinklist->add($i);
}
//去掉头结点
$newcyclelinklist->remove();
//约瑟夫环问题
function Joseph($cyclelinklist){	
    while ($cyclelinklist != $cyclelinklist->next) {
        for($i=0;$i<1;$i++){
            $cyclelinklist=$cyclelinklist->next;//当前节点为2
        }
        echo $cyclelinklist->next->data.'-';//输出当前节点的下一个节点
        $temporary=$cyclelinklist->next->next;//将下一节点的下一节点赋值临时变量
        $cyclelinklist->next=$temporary;//将下下一节点的指针赋值给下一节点
		$cyclelinklist=$cyclelinklist->next;//将指针移到下一节点开始计数
    }
	echo $cyclelinklist->data;//输出最后链表的值
}
Joseph($newcyclelinklist->head); 
