<?php
class Stack{
    const MAXSIZE=40;//设置栈的大小
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
    
    private $sign=['+','-','*','/'];
    public function __construct(){
        $this->num=new Stack;
    }
    
    public function calculate($arr){
    	foreach($arr as $v){
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

class OrdinaryToReversePolish{
    public $num;
    public $res;
    public $tmparr;
    public $symbol=['+','-','*','/','(',')'];
    public function __construct(){
        $this->num=new Stack;
        $this->res=new Stack;
        $this->tmparr=new Stack;
    }

	public function stringchangearray($str){
        $strarr=str_split($str);
        foreach($strarr as $v){
            if(!is_numeric($v) && !in_array($v,$this->symbol)){
                return false;
            }
        }
        $numpreg='/(\d)*/';
        preg_match_all($numpreg,$str,$arr);
        $arr=$arr[0];
        foreach($strarr as $val){
            if(!is_numeric($val)){
                foreach($arr as $key=>$value){
                    if($value == ""){
                        $arr[$key]=$val; 
                        break;
                    }
                }
            }
        }
        array_pop($arr);
        return $this->conversion($arr);
    }
    public function conversion($arr){
        foreach($arr as $v){
            if(is_numeric($v)){
                $this->num->push($v);
            }else{
                 switch ($v){
                     case '-':
                     case '+':
                     	while ($tmp !='(' && $this->res->top!=-1 ){
                     		$tmp=$this->res->pop();
                     		if($tmp !='('){
                     			$this->num->push($tmp);
                     		}
                     	}
                     	$this->res->push($v);
                        break;
                     case '*':
                     case '/':
                     	$tmp=$this->res->pop();
                     	while($tmp=='*' || $tmp=='/'){
                     		$this->num->push($tmp);
                     		$tmp=$this->res->pop();
                     	}
                     	$this->res->push($tmp);
                     	$this->res->push($v);
                     	break;
                     case '(':
                     	$this->res->push($v);
                     	break;
                     case ')':
                     	while($tmp == '('){
                     		$tmp=$this->res->pop();
                     		$this->num->push($tmp);
                     	}
                     	break;                     	                         
                 }
            }
        }
        while($this->res->top!=-1){
            	$this->num->push($this->res->pop());
        }
        return $this->num->stack;
    }
}
$test=new OrdinaryToReversePolish;
$arr=$test->stringchangearray('1+2-3*4/5');
$reversepolish=new ReversePolish;
$reversepolish->calculate($arr);