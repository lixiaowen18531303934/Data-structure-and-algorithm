<?php
class Stack{
    const MAXSIZE=10;//设置栈的大小
    public $stack=[];//栈
    public $top=-1;//栈顶指针
    public function __construct(){
        $this->stack=$stack;
    }
    //入栈
    public function push($data){
        if($this->top>self::MAXSIZE){
            return '栈满了';
        }
        $this->stack[++$this->top]=$data;
    }
    public function pop(){
        if($this->top==-1){
            return '栈空了';
        }
        $data=$this->stack[$this->top];
        unset($this->stack[$this->top]);
        $this->top--;
        return $data;
    }
    public function show(){
        if($this->top==-1){
            return '栈空了';
        }
        for($i=$this->top;$i>-1;$i--){
            echo $this->stack[$i].'-';
        }
    }
}
class ReversePolish{
    public $num;
    public $res;
    
    private $sign=['+','-','*','/'];
    public function __construct(){
        $this->num=new Stack;
    }
    
    public function calculate($str){
    	$arr=explode(' ',$str);
    	$count=count($arr);
    	foreach($arr as $v){
    		if(!in_array($v, $this->sign) && !is_numeric($v)){
    			return '字符串中有非法字符';
    		}
    		if(!in_array($v, $this->sign)){
    			$this->num->push($v);
    		}else{
    			$num1=$this->num->pop();
    			$num2=$this->num->pop();
    			switch ($v){
    			    case "+":
    			        $res=$num2+$num1;
    			        break;
    			    case "-":
    			        $res=$num2-$num1;
    			        break;
    			    case "*":
    			        $res=$num2*$num1;
    			        break;
    			    case "/":
    			        $res=$num2/$num1;
    			        break;
    			} 
    			$this->num->push($res);
    		}
    	}
    	return $this->num->show();
    }
}

$reversepolish=new ReversePolish;
$reversepolish->calculate('1 2 + 5 * 3 /');