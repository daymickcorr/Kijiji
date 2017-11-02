<?php
class Payement
{private $pk_pay_id;
private $pay_amount;
private $pay_pictures_amount;
private $pay_duration;
    
function __construct($pk_pay_id=null,$pay_amount=null,$pay_pictures_amount=null,$pay_duration=null){
    $this->pk_pay_id=$pk_pay_id;
    $this->pay_amount=$pay_amount;
    $this->pay_pictures_amount=$pay_pictures_amount;
    $this->pay_duration=$pay_duration;
}
public function getPk_pay_id()
    {
        return $this->pk_pay_id;
    }
    public function getPay_amount()
    {
        return $this->pay_amount;
    }
    public function setPk_pay_id($pk_pay_id)
    {
        $this->pk_pay_id = $pk_pay_id;
    }
    public function setPay_amount($pay_amount)
    {
        $this->pay_amount = $pay_amount;
    }
    public function getPay_pictures_amount()
    {
        return $this->pay_pictures_amount;
    }
    public function setPay_pictures_amount($pay_pictures_amount)
    {
        $this->pay_pictures_amount = $pay_pictures_amount;
    }
    public function getPay_duration()
    {
        return $this->pay_duration;
    }
    public function setPay_duration($pay_duration)
    {
        $this->pay_duration = $pay_duration;
    }
    static function header(){
        $str= "<table border='1'><tr>";
        $str="$str<th>pk_pay_id </th><th>pay_amount </th><th>pay_pictures_amount </th><th>pay_duration </th></tr>";
        return $str;
    }
    static function footer(){
        return "</table>";
    }
    function __toString(){
        return "<tr><td>$this->pk_pay_id</td><td>$this->pay_amount</td><td>$this->pay_pictures_amount</td><td>$this->pay_duration</td></tr>";
    }

    function create($connectionId){
        $pk_pay_id = $this->pk_pay_id;
        $pay_amount = $this->pay_amount;
        $pay_pictures_amount = $this->pay_pictures_amount;
        $pay_duration = $this->pay_duration;
        $sqlStmt = "INSERT INTO payement 
       VALUES ('$pk_pay_id','$pay_amount','$pay_pictures_amount','$pay_duration')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function update($connectionId){
        $pk_pay_id = $this->pk_pay_id;
        $pay_amount = $this->pay_amount;
        $pay_pictures_amount = $this->pay_pictures_amount;
        $pay_duration = $this->pay_duration;
        $sqlStmt = "UPDATE payement
        SET pay_amount=('$pay_amount'),pay_pictures_amount=('$pay_pictures_amount'),pay_duration=('$pay_duration')
        WHERE pk_pay_id =('$pk_pay_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function delete($connectionId){
        $pk_pay_id = $this->pk_pay_id;
        $sqlStmt = "DELETE FROM payement
       WHERE pk_pay_id=('$pk_pay_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function find($connectionId){
        $pk_pay_id = $this->pk_pay_id;
        $sqlStmt = "SELECT * FROM payement WHERE pk_pay_id=$pk_pay_id";
        $result = $connectionId->query($sqlStmt);
        $temp  = new payement();
        foreach ($result as $row){
            $temp->pk_pay_id = $row["pk_pay_id"];
            $temp->pay_amount = $row["pay_amount"];
            $temp->pay_pictures_amount = $row["pay_pictures_amount"];
            $temp->pay_duration = $row["pay_duration"];
        }
        return $temp;
    }
    function getAll($connectionId){
        $idx = 0;
        foreach ($connectionId->query("select * from payement") as $row){
            $payement = new Payement();
            $payement->pk_pay_id = $row["pk_pay_id"];
            $payement->pay_pictures_amount = $row["pay_pictures_amount"];
            $payement->pay_duration = $row["pay_duration"];
            $payement->pay_amount = $row["pay_amount"];
            $arr[$idx++] = $payement;
        }
        return $arr;
    }
}
?>