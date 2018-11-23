<?php
class Node{
	public $data;
	public $next;
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
		//去掉头结点（头结点只是标识循坏链表的启示点）
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
$newlist=new CycleLinkList;

for($k=0;$k<13;$k++){
    $newlist->add('0');
}

$newlist->remove();
function poker($list){
    for($i=1;$i<14;$i++){//第几张牌
        for($j=1;$j<$i;$j++){//需要数-1次
            $list=$list->next;//指向下一张牌
            if($list->data != '0'){//如果下一张牌牌面
                while($list->data !='0'){//循环  如果牌面为0跳出否则一直指向下一张
                    $list=$list->next;
                }
            }
        }
        $list->data=$i;//将当前片面赋值
        while($list->data !='0' && $i !=13){ //从当前片面的的下一张开始数，如果第13张就跳出
            $list=$list->next;
        }
    }
    return $list->next;//当前牌面为第13张，所以要指向下一张
}
$list=poker($newlist->head);
print_r($list);//打印结果
