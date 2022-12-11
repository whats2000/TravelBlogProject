<?php
if(isset($_SESSION["search_input"])){
    $Urows = $_SESSION["SResult_U"];
    $UrowCount = $_SESSION["SResult_U_rowcount"];

    $Prows = $_SESSION["SResult_P"];
    $ProwCount = $_SESSION["SResult_P_rowcount"];

    //output the title
    $search_input = $_SESSION["search_input"];
    $str = "Result for Searching: ";
    foreach($search_input as $input){
        $str .= "'$input'+";
    }
    $str = rtrim($str, "+");
    echo "<h1>$str</h1><br>";
    //display search result from user table
    if($UrowCount>0){
        echo"<h2><b>Your Searching Result From User...</b></h2><br>";
        foreach($Urows as $Urow){
            echo "<a href='./search/searchconnection.php'>$Urow[name]</a><br>";
        }
    }
    echo"<br>";
    if($ProwCount>0){
        echo"<h2><b>Your Searching Result From Post...</b></h2><br>";
        foreach($Prows as $Prow){
            echo "<a href='./search/searchconnection.php?post=$Prow[id]'>$Prow[title]</a><br>";
        }
    }
    if($ProwCount==0&&$UrowCount==0){
        echo"<h1><b>Sorry, there is no result for your keyword...</b></h1><br>";
    }
}
else{
?>
<script>
window.location.href = "./index.php";
</script>
<?php
}
?>
