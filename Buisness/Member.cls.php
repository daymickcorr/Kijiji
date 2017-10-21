<?php
class Member
{private $pk_mem_id;
private $mem_name;
private $mem_phone;
private $mem_email;
private $mem_password;
private $fk_memType_id;
private $fk_add_zip;
    
function __construct($pk_mem_id=null,$mem_name=null,$mem_phone=null,
    $mem_email=null,$mem_password=null,$fk_memType_id=null,$fk_add_zip=null){
    $this->pk_mem_id=$pk_mem_id;
    $this->mem_name=$mem_name;
    $this->mem_phone=$mem_phone;
    $this->mem_email=$mem_email;
    $this->mem_password=$mem_password;
    $this->fk_memType_id=$fk_memType_id;
    $this->fk_add_zip=$fk_add_zip;
}
public function getPk_mem_id()
    {
        return $this->pk_mem_id;
    }
    public function getMem_name()
    {
        return $this->mem_name;
    }
    public function setPk_mem_id($pk_mem_id)
    {
        $this->pk_mem_id = $pk_mem_id;
    }
    public function setMem_name($mem_name)
    {
        $this->mem_name = $mem_name;
    }
    public function getMem_phone()
    {
        return $this->mem_phone;
    }
    public function setMem_phone($mem_phone)
    {
        $this->mem_phone = $mem_phone;
    }
    public function getMem_email()
    {
        return $this->mem_email;
    }
    public function setMem_email($mem_email)
    {
        $this->mem_email = $mem_email;
    }
    public function getMem_password()
    {
        return $this->mem_password;
    }
    public function setMem_password($mem_password)
    {
        $this->mem_password = md5($mem_password);
    }
    public function getFk_memType_id()
    {
        return $this->fk_memType_id;
    }
    public function setFk_memType_id($fk_memType_id)
    {
        $this->fk_memType_id = $fk_memType_id;
    }
    public function getFk_add_zip()
    {
        return $this->fk_add_zip;
    }
    public function setFk_add_zip($fk_add_zip)
    {
        $this->fk_add_zip = $fk_add_zip;
    }
    static function header(){
        $str= "<table border='1'><tr>";
        $str="$str<th>pk_mem_id </th><th>mem_name </th><th>mem_phone </th><th>mem_email </th><th>mem_password </th><th>fk_memType_id </th><th>fk_add_zip </th></tr>";
        return $str;
    }
    static function footer(){
        return "</table>";
    }
    function __toString(){
        return "<tr><td>$this->pk_mem_id</td><td>$this->mem_name</td><td>$this->mem_phone</td><td>$this->mem_email</td><td>$this->mem_password</td><td>$this->fk_memType_id</td><td>$this->fk_add_zip</td></tr>";
    }

    function create($connectionId){
        //$pk_mem_id = $this->pk_mem_id;
        $mem_name = $this->mem_name;
        $mem_phone = $this->mem_phone;
        $mem_email = $this->mem_email;
        $mem_password = $this->mem_password;
        $fk_memType_id = $this->fk_memType_id;
        $fk_add_zip = $this->fk_add_zip;
        $sqlStmt = "INSERT INTO member (`mem_name`, `mem_phone`, `mem_email`, `mem_password`, `fk_memType_id`, `fk_add_zip`)
       VALUES ('$mem_name','$mem_phone','$mem_email','$mem_password','$fk_memType_id','$fk_add_zip')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function update($connectionId){
        $pk_mem_id = $this->pk_mem_id;
        $mem_name = $this->mem_name;
        $mem_phone = $this->mem_phone;
        $mem_email = $this->mem_email;
        $mem_password = $this->mem_password;
        $fk_memType_id = $this->fk_memType_id;
        $fk_add_zip = $this->fk_add_zip;
        $sqlStmt = "UPDATE member
        SET mem_name=('$mem_name'),mem_phone=('$mem_phone'),mem_email=('$mem_email'),mem_password=('$mem_password'),fk_memType_id=('$fk_memType_id'),fk_add_zip=('$fk_add_zip')
        WHERE pk_mem_id =('$pk_mem_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }
    function delete($connectionId){
        $pk_mem_id = $this->pk_mem_id;
        $sqlStmt = "DELETE FROM member
       WHERE pk_mem_id=('$pk_mem_id')";
        $result = $connectionId->exec($sqlStmt);
        return $result;
    }

    function find($connectionId){       
        $pk_mem_id = $this->pk_mem_id;
        $sqlStmt = "SELECT * FROM member WHERE pk_mem_id=$pk_mem_id";
        $result = $connectionId->query($sqlStmt);
        $temp  = new Member();
        foreach ($result as $row){
            $temp->pk_mem_id = $row["pk_mem_id"];
            $temp->mem_name = $row["mem_name"];
            $temp->mem_phone = $row["mem_phone"];
            $temp->mem_email = $row["mem_email"];
            $temp->mem_password = $row["mem_password"];
            $temp->fk_memType_id = $row["fk_memType_id"];
            $temp->fk_add_zip = $row["fk_add_zip"];
        }
        return $temp;
    }
    
    function getAll($connectionId){
        $idx=0;
        foreach ($connectionId->query("select * from member") as $row){
            $member = new Member();
            $member->pk_mem_id = $row["pk_mem_id"];
            $member->mem_name = $row["mem_name"];
            $member->mem_phone = $row["mem_phone"];
            $member->mem_email = $row["mem_email"];
            $member->mem_password = $row["mem_password"];
            $member->fk_memType_id = $row["fk_memType_id"];
            $member->fk_add_zip = $row["fk_add_zip"];
            $arr[$idx++] = $member;
        }
        return $arr;
    }
    
    function authentificate($connectionId){
        $idx=0;
        $member = new Member();
        $results = $connectionId->query("select * from member where mem_email = '$this->mem_email' and mem_password = '$this->mem_password'");
        foreach ( $results as $row){
            $member->pk_mem_id = $row["pk_mem_id"];
            $member->mem_name = $row["mem_name"];
            $member->mem_phone = $row["mem_phone"];
            $member->mem_email = $row["mem_email"];
            $member->mem_password = $row["mem_password"];
            $member->fk_memType_id = $row["fk_memType_id"];
            $member->fk_add_zip = $row["fk_add_zip"];
            //$arr[$idx++] = $member;
        }
        return $member;
    }
    
}
?>