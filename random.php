<?php
    include "dblink.php";
    if(!empty($_POST['gameid'])){
        $game_id=$_POST['gameid'];
        $sql="SELECT team_id FROM team WHERE game_id = $game_id AND status = '1' ORDER BY RAND()";
        $result=mysqli_query($link,$sql);
        $sql2="SELECT round FROM match_team WHERE game_id = $game_id ORDER BY round DESC";
        $result2=mysqli_query($link,$sql2);
        $r=mysqli_fetch_array($result2);
        $round=$r['round']+1;
        $i=1;
        $team1=0;
        $team2=0;
        //if($r['team1']==$team['team_id'] && $r['team2']==$team['team_id']){
            if(mysqli_num_rows($result)%2 != 1){
                while($team=mysqli_fetch_array($result)){
                    $team_id=$team['team_id'];
                    if($i==1 & $team_id){
                        $team1=$team_id;
                        $i=2;
                    }else if($i==2){
                        $team2=$team_id;
                        $sql3="INSERT INTO match_team VALUES('',$team1,'$team2','$round','1',$game_id)";
                        mysqli_query($link,$sql3);
                        $i=1;
                    }
                }
                if(mysqli_error($link)){
                    echo mysqli_error($link);
                }else{
                    echo "<script>setInterval(function() { location.href = 'random-team.php'; }, 100);
                    alert('สุ่มสำเร็จ'); </script>";    
                }
            }else{
                //echo "<script>setInterval(function() { location.href = 'random-team.php'; }, 100);
                //alert('ทีมไม่ครบ'); </script>";    
            }
        //}else{
            //echo "<script>setInterval(function() { location.href = 'random-team.php'; }, 100);
            //alert('ทีมถูกสุ่มไปแล้ว'); </script>"; 
        //}
    }else{
        echo "<script>setInterval(function() { location.href = 'random-team.php'; }, 100);
        alert('กรุณาเลือกเกมส์'); </script>";
    }
    mysqli_close($link);
?>