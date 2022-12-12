<?php
if(isset($_SESSION["search_input"])){
    $user_rows = $_SESSION["SResult_U"];
    $user_count = $_SESSION["SResult_U_rowcount"];

    $post_rows = $_SESSION["SResult_P"];
    $post_count = $_SESSION["SResult_P_rowcount"];

    //output the title
    $search_input = $_SESSION["search_input"];
    $str = "Result for Searching: ";
    foreach($search_input as $input){
        $str .= "'$input'+";
    }
    $str = rtrim($str, "+");
    echo "<h1>$str</h1><br>";
    //display search result from user table
    if($user_count>0){
        echo"<h2><b>Your Searching Result From User...</b></h2><br>";
        foreach($user_rows as $Urow){
            echo "<a href='./search/searchconnection.php?user=$Urow[id]'>$Urow[name]</a><br>";
        }
    }
    echo"<br>";
    if($post_count>0){
        echo"<h2><b>Your Searching Result From Post...</b></h2><br>";
        foreach($post_rows as $Prow){
            echo "<a href='./search/searchconnection.php?post=$Prow[id]'>$Prow[title]</a><br>";
        }
    }
    if($post_count==0&&$user_count==0){
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
