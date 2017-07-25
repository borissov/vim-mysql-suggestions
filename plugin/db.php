<?php 

if(isset($argv[1]) && $argv[1] != '')
{
    $all_names = array();

    $word = $argv[5];
    $database = $argv[4];
    $password = $argv[3];
    $user = $argv[2];
    $host = $argv[1];

    $dblink = mysqli_connect($host, $user, $password, $database);
    if(strlen($word))
    {
        if($word == 'prefixes')
        {
            $sql_statement = "SELECT count(*) AS total FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '".$database."' AND ( COLUMN_NAME LIKE '".$argv[6]."%' )";
            $result = $dblink->query($sql_statement);
            $data = mysqli_fetch_array($result); 
            
            if($data['total'])
            {   
                echo 1;
            }
            exit;
        }
        else if(strpos($word,'.'))
        {
            $words = explode('.',$word);
            $sql_statement = "SELECT COLUMN_NAME,TABLE_NAME,COLUMN_TYPE  FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '".$database."' AND ( COLUMN_NAME LIKE '".$words[1]."%' AND TABLE_NAME = '".$words[0]."' )";
            
            $result = $dblink->query($sql_statement); 
            while($row = mysqli_fetch_array($result)) 
            {   
                $all_names[$row['TABLE_NAME'].'.'.$row['COLUMN_NAME']] = $row['TABLE_NAME'].'.'.$row['COLUMN_NAME'].'//'.$row['COLUMN_TYPE'];
            }
        }
        else
        {
            //search for columns
            $sql_statement = "SELECT COLUMN_NAME,TABLE_NAME,COLUMN_TYPE  FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '".$database."' AND  COLUMN_NAME LIKE '".$word."%' ";
            
            $result = $dblink->query($sql_statement); 
            while($row = mysqli_fetch_array($result)) 
            {   
                if(strpos($row['COLUMN_NAME'],$word) === 0)
                {  
                    $all_names[$row['TABLE_NAME'].'.'.$row['COLUMN_NAME']] = $row['COLUMN_NAME'].'/'.$row['TABLE_NAME'].'/'.$row['COLUMN_TYPE'];
                }
             }

            //search for tables and views 
            $sql_statement = "SELECT TABLE_NAME,TABLE_TYPE  FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '".$database."' AND  TABLE_NAME LIKE '".$word."%' ";
            
            $result = $dblink->query($sql_statement); 
            while($row = mysqli_fetch_array($result)) 
            {   
                if(strpos($row['TABLE_NAME'],$word) === 0)
                {
                    $all_names[$row['TABLE_NAME']] = $row['TABLE_NAME'].'//'.strtolower($row['TABLE_TYPE']);
                }
            }
        }
    }

    mysqli_close($dblink);
    echo implode(';', $all_names);
}
