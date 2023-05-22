<html>

<body>

 

  <?php
  //Q1
 class Calculator {
    private $integer1;
    private $integer2;
    private $operator;

    public function __construct($integer1, $integer2, $operator) {
        $this->integer1 = $integer1;
        $this->integer2 = $integer2;
        $this->operator = $operator;
    }

    public function calculateresult() {
    if($this->integer1==0||$this->integer2==0){
    return -1;
    }
    else{
        switch ($this->operator) {
            case '+':
                return $this->integer1 + $this->integer2;
            case '-':
                return $this->integer1 - $this->integer2;
            case '*':
                return $this->integer1 * $this->integer2;
            case '/':
                return $this->integer1 / $this->integer2;
            case '%':
                return $this->integer1 % $this->integer2;
            default:
                return 0;
        }}
    }
}

$integer1 = 10;
$integer2 = 0;
$operator = '+';

$calculator = new Calculator($integer1, $integer2, $operator);
$result = $calculator->calculateresult();
echo "Result: " . $result;
//Q2
$cars = array(0,3,6,9,12);
$count;

 foreach ($cars as $cars) {
        if ($cars >= 300) {
            return 0;
        }
        
        if ($cars % 3 === 0) {
            $count++;
        }
    }
    
    return $count;


?>
</body>

</html>