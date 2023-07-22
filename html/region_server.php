<?php

require("../dbconnect.php");
$conn = mysqli_connect(MYSQL_IP, DB_USER, DB_PASSWORD, USE_DB);

if(isset($_POST['LS_region']) && isset($_POST['LS_num']) && isset($_POST['LS_date']) )

{
    $LS_region = mysqli_real_escape_string($conn, $_POST['LS_region']);
    $LS_num = mysqli_real_escape_string($conn, $_POST['LS_num']);
    $LS_date = mysqli_real_escape_string($conn, $_POST['LS_date']);
 
    
    // 에러 체크
    if (empty($_POST['LS_region'])) {
        ?> <script>
                alert('지역을 선택해주세요.');
                history.back();
            </script>
        <?php 
    }

    else if (empty($_POST['LS_num'])) {
         ?> <script>
                alert('사물함을 선택해주세요.');
                history.back();
            </script>

        <?php
    }

    else if (empty($_POST['LS_date'])) {        
        ?> <script>
                alert('날짜를 선택해주세요.');
                history.back();
            </script>


        <?php
    } 


        // 사물함 중복 체크
        $sql_same = "SELECT * FROM LockerSelection WHERE num = '$LS_num' AND date = '$LS_date' AND region = '$LS_region'";
        $order = mysqli_query($conn, $sql_same);

        if (mysqli_num_rows($order) > 0)
        {
            ?> 
            <script>
                alert('사용할 수 없는 사물함입니다.');
                history.back();
            </script>

            <?php 
        }
        else
        {
            $sql_save = "INSERT INTO LockerSelection(region, num, date) VALUES ('$LS_region', '$LS_num', '$LS_date')";
            $result = mysqli_query($conn, $sql_save);

            if($result)
            {
              
                
                ?> <script>
                        alert('사물함 예약 완료되었습니다.');//알림창
                        location.replace("./results.php");
                    </script>

            <?php } else {
                ?> <script>
                        alert("문제가 발생했습니다.");
                    </script>
            <?php }
            }
    
    }

?>