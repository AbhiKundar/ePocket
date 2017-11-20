<?php
class DbOperation
{
    private $conn;
 
    //Constructor
    function __construct()
    {
        require_once dirname(__FILE__) . '/Config.php';
        require_once dirname(__FILE__) . '/DbConnect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }
 
    //Function to create a new user
    public function createTeam($name, $memberCount)
    {
        $stmt = $this->conn->prepare("select UserName,UserPassword as Password,st.FirstName,st.MachineCode from [192.168.0.114].[CASHLESS].[dbo].[DPS_VW_UserLogin] u inner join [192.168.0.114].[CASHLESS].[dbo].tblStudent st on st.RollNo = u.Username where u.UserName='"+userid+"' and u.UserPassword='"+password+"';");
        $stmt->bind_param("si", $name, $memberCount);
        $result = $stmt->execute();
        $stmt->close();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
 
}
