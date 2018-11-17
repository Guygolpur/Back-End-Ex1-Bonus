<?php
    class Mishtanim{
        protected $num1;
        protected $num2;
        protected $num3;
        protected $op;
        
        protected function setNum1(){
            if(isset($_GET['num1']))
            $this->num1 = (int)$_GET["num1"];
            else if(isset($_POST['num1']))
            $this->num1 = (int)$_POST["num1"];
            else $this->num1 = 0;
        }
        protected function setNum2(){
            if(isset($_GET['num2'])) 
            $this->num2 = (int)$_GET["num2"];
            else if(isset($_POST['num2'])) 
            $this->num2 = (int)$_POST["num2"];
            else $this->num2 = 0;
        }
        protected function setNum3(){
            if(isset($_GET['num3']))
            $this->num3 = (int)$_GET["num3"];
            else if(isset($_POST['num3'])) 
            $this->num3 = (int)$_POST["num3"];
            else $this->num3 = 0;
        }
        protected function setOp(){
            if(isset($_GET['op']))
            $this->op = $_GET["op"];
            else if(isset($_POST['op'])) 
            $this->op = $_POST["op"];
            else $this->Op = "error";
        }
    }
    
    class Calculator extends Mishtanim{
        public $res;
        public function __construct(){
            $this->setNum1();
            $this->setNum2();
            $this->setNum3();
            $this->setOp();
            $this->math();
        }
        public function math(){
            if($this->op == 'sum'){
            $this->res = $this->num1 + $this->num2 + $this->num3;
        }
            else if($this->op == 'mul'){
            $this->res  = ($this->num1 * $this->num2 * $this->num3)/3;
        }
            else if($this->op == 'avg'){
            $this->res = ($this->num1 + $this->num2 + $this->num3)/3;
        }
            else{
            $this->res = 'error';
            }
        }
        
    }

    $cal = new Calculator();
    if($_SERVER['REQUEST_METHOD'] == 'PUT'){
        $a = array('retVal' => " PUT was detected");
        header('Content-Type: application/json');
        echo json_encode($a);
    }
    else{
    $a = array('retVal'=> $cal->res);
    header('Content-Type: application/json');
    echo json_encode($a);
    }
    ?>