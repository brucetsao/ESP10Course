<?php
/*        
AAConf類別 - 資料庫連接設定, 
儲存連接MySQL資料庫的設定
*/

class AAConf{
    private $databaseURL = "140.134.25.43";    // 主機
    private $databaseUName = "root";       // 使用者
    private $databasePWord = "52005505";  // 密碼
    private $databaseName = "airalliance"; // 資料庫名稱
    private $dbport = 33306 ;
    function get_databaseURL(){
            return $this->databaseURL;
        }
    function get_databaseUName(){
            return $this->databaseUName;
        }
    function get_databasePWord(){
            return $this->databasePWord;
        } 
    function get_databaseName(){
            return $this->databaseName;
        } 
    function get_databasePort(){
        return $this->dbport;
        }         
}
?>