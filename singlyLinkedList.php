<?php
//单链表
//创建一个节点类
class Node {
	public $data;//数据域
	public $next;//指针指向下一个节点
	public function __construct($data = null){
		$this->data=$data;//传入的数据赋值给数据域
		$this->next=null;//指针指向空
	}
}
class SingLelinkList {
	private $head;//定义头指针
	
	public function __construct(){
		$this->head = new Node();
	}
	
	//获取链表总数
	public function count(){
		$current=$this->head;//初始化头节点
		$i=0;//初始化计数器
		while (!is_null($current->next)){//循环，到尾节点为空停止
			$i++;
			$current=$current->next;//将下一节点赋值
		}
		return $i;
	}
	//查找第num个节点的值
	public function find($no){
		$current=$this->head;
		if($no>$this->count()){//如果$sum大于链表总数
			return false;
		}
		$i=0;
		while($i<$no){
			$current=$current->next;
			$i++;
		}
		echo $current->data;
	}
	
	//添加节点
	public function add($data){
		$current=$this->head;
		while (!is_null($current->next)){
			$current=$current->next;
		}//到链表末尾
		$newNode=new Node($data);//创建一个节点
		$current->next=$newNode;//末尾节点指针赋值新节点
	}
	//在$sum处添加节点
	public function insert($no,$data){
		if($no>$this->count()){
			return false;
		}
		$current=$this->head;
		$newNode=new Node($data);
		for($i=0;$i<$no;$i++){
			$current=$current->next;
		}
		$newNode->next=$current->next;
		$current->next=$newNode;
		return true;
	}
	//更新链表
	public function update($no,$data){
		if($no>$this->count()){
			return false;
		}
		$current=$this->head;
		for($i=0;$i<$no;$i++){
			$current=$current->next;
		}
		$current->data=$data;
		return true;
	}
	//删除一个节点
	public function del($no){
		if($no>$this->count()){
			return false;
		}
		$current=$this->head;
		for ($i=0;$i<$no-1;$i++){
			$current=$current->next;
		}
		$current->next=$current->next->next;
		return true;
	}
	//展示一个链表
	public function show(){
		$current=$this->head;
		while(!is_null($current->next)){
			$current=$current->next;
			echo $current->data.'->';
		}
	}	
}
$list=new SingLelinkList;
$list->add('a');
$list->add('b');
$list->add('c');
$list->add('d');
$list->add('e');
$list->add('f');
$list->update(3,'g');
$list->update(4,'h');
$list->del(5);
$list->show();
