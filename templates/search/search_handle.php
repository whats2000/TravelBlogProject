<?php
session_start();
include("../core/config.php");

$sql_link = connect('root', '');

if (!$sql_link) {
    $_SESSION["show_message"] = "Error at connect to database";
    exit();
}

if(isset($_GET["search"])){//start the search code here
    if(!empty($_GET["search"])){
        //deal with raw input
        $targets = filter_var($_GET["search"], FILTER_SANITIZE_STRING);
        $targets = preg_replace(array('/\s{2,}/', '/[\t\n]/','/\+/','/,/'), ' ', $targets);
        $targets = preg_replace(array('/\s{2,}/', '/[\t\n]/','/\+/','/,/'), ' ', $targets);
        $targets = explode(" ",$targets);
        $_SESSION["search_input"] = $targets;
        //deal with sql query and save them to $_SESSION
        //from user
        $sql_uA =  "SELECT * FROM user WHERE";
        foreach($targets as $target){
            $sql_uA.=" (name = '$target') OR";
        }
        $sql_uA = rtrim($sql_uA, "OR");
        $sql_uA .= "LIMIT 100";
        $uArows = $sql_link->query($sql_uA);
        $uArowcount = $uArows->rowCount();
        $Result_uA = $uArows->fetchall(PDO::FETCH_ASSOC);
        $rb = 100 - $uArows->rowCount();
        $sql_uB =  "SELECT * FROM user WHERE(";
        foreach($targets as $target){
            $sql_uB.=" (name LIKE '%$target%') OR";
        }
        $sql_uB = rtrim($sql_uB, "OR");
        $sql_uB .=")AND NOT(";
        foreach($targets as $target){
            $sql_uB.="(name = '$target') OR";
        }
        $sql_uB = rtrim($sql_uB, "OR");
        $sql_uB .=")";
        $sql_uB .= "LIMIT $rb";
        $uBrows = $sql_link->query($sql_uB);
        $uBrowcount = $uBrows->rowCount();
        $Result_uB = $uBrows->fetchall(PDO::FETCH_ASSOC);
        $rc = $rb - $uBrows->rowCount();
        if($rc>0){
            $sql_uC =  "SELECT * FROM user WHERE(";
            foreach($targets as $target){
                $sql_uC.=" (name SOUNDS LIKE '$target') OR";
            }
            $sql_uC = rtrim($sql_uC, "OR");
            $sql_uC .=")AND NOT(";
            foreach($targets as $target){
                $sql_uC.="(name = '$target') OR";
            }
            $sql_uC = rtrim($sql_uC, "OR");
            $sql_uC .=")AND NOT(";
            foreach($targets as $target){
                $sql_uC.="(name LIKE '%$target%') OR";
            }
            $sql_uC = rtrim($sql_uC, "OR");
            $sql_uC .=")";
            $sql_uC .= "LIMIT $rc";
            $uCrows = $sql_link->query($sql_uC);
            $uCrowcount = $uCrows->rowCount();
            $Result_uC = $uCrows->fetchall(PDO::FETCH_ASSOC);
        }
        //combine the result to $_SESSION["SResult_U"],$_SESSION["SResult_U_rowcount"]
        $Result_u = array_merge($Result_uA,$Result_uB);
        $Result_u = array_merge($Result_u,$Result_uC);
        $_SESSION["SResult_U"] = $Result_u;
        $_SESSION["SResult_U_rowcount"] = $uArowcount+$uBrowcount+$uCrowcount;
        //from post
        $sql_pA =  "SELECT * FROM post WHERE";
        foreach($targets as $target){
            $sql_pA.=" (title = '$target') OR";
        }
        $sql_pA = rtrim($sql_pA, "OR");
        $sql_pA .= "LIMIT 100";
        $pArows = $sql_link->query($sql_pA);
        $pArowcount = $pArows->rowCount();
        $Result_pA = $pArows->fetchall(PDO::FETCH_ASSOC);
        $rb = 100 - $pArows->rowCount();

        $sql_pB =  "SELECT * FROM post WHERE(";
        foreach($targets as $target){
            $sql_pB.=" (title LIKE '%$target%') OR";
        }
        $sql_pB = rtrim($sql_pB, "OR");
        $sql_pB .=")AND NOT(";
        foreach($targets as $target){
            $sql_pB.="(title = '$target') OR";
        }
        $sql_pB = rtrim($sql_pB, "OR");
        $sql_pB .=")";
        $sql_pB .= "LIMIT $rb";
        $pBrows = $sql_link->query($sql_pB);
        $pBrowcount = $pBrows->rowCount();
        $Result_pB = $pBrows->fetchall(PDO::FETCH_ASSOC);
        $rc = $rb - $pBrows->rowCount();
        if($rc>0){
            $sql_pC =  "SELECT * FROM post WHERE(";
            foreach($targets as $target){
                $sql_pC.=" (title SOUNDS LIKE '$target') OR";
            }
            $sql_pC = rtrim($sql_pC, "OR");
            $sql_pC .=")AND NOT(";
            foreach($targets as $target){
                $sql_pC.="(title = '$target') OR";
            }
            $sql_pC = rtrim($sql_pC, "OR");
            $sql_pC .=")AND NOT(";
            foreach($targets as $target){
                $sql_pC.="(title LIKE '%$target%') OR";
            }
            $sql_pC = rtrim($sql_pC, "OR");
            $sql_pC .=")";
            $sql_uC .= "LIMIT $rc";
            $pCrows = $sql_link->query($sql_pC);
            $pCrowcount = $pCrows->rowCount();
            $Result_pC = $pCrows->fetchall(PDO::FETCH_ASSOC);
        }
        $Result_p = array_merge($Result_pA,$Result_pB);
        $Result_p = array_merge($Result_p,$Result_pC);
        $_SESSION["SResult_P"] = $Result_p;
        $_SESSION["SResult_P_rowcount"] = $pArowcount+$pBrowcount+$pCrowcount;
    }
    else{
        header("Location: ../index.php");
    }
}
else{
    header("Location: ../index.php");
}
//
?>

<script>
window.location.href = "../search.php";
</script>

<?php exit(); ?>

