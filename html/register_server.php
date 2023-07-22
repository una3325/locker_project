<?php

require("../dbconnect.php");
$conn = mysqli_connect(MYSQL_IP, DB_USER, DB_PASSWORD, USE_DB);

if(isset($_POST['user_name']) && isset($_POST['user_id']) && isset($_POST['user_pass1']) && isset($_POST['user_pass2']) && isset($_POST['user_mail']) && isset($_POST['user_phone']) && isset($_POST['user_Nickname']))
{
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $user_pass1 = mysqli_real_escape_string($conn, $_POST['user_pass1']);
    $user_mail = mysqli_real_escape_string($conn, $_POST['user_mail']);
    $user_phone = mysqli_real_escape_string($conn, $_POST['user_phone']);
    $user_Nickname = mysqli_real_escape_string($conn, $_POST['user_Nickname']);
     
    // 에러 체크
    if (empty($_POST['user_name'])) {
        // header("location: register.php?error=이름을 적어주세요.");
        // exit();
        ?> <script>
                alert('이름을 적어주세요.');
                history.back();
            </script>

        <?php 
    }
    else if (empty($_POST['user_id'])) {
        // header("location: register.php?error=아이디를 적어주세요.");
        // exit();
        ?> <script>
                alert('아이디를 적어주세요.');
                history.back();
            </script>

        <?php
    } 
    else if (empty($_POST['user_pass1'])) {
        // header("location: register.php?error=비밀번호를 적어주세요.");
        // exit();
        ?> <script>
                alert('비밀번호를 적어주세요.');
                history.back();
            </script>

        <?php
    } 
    else if (empty($_POST['user_pass2'])) {
        // header("location: register.php?error=비밀번호를 적어주세요.");
        // exit();
        ?> <script>
                alert('비밀번호를 적어주세요.');
                history.back();
            </script>

        <?php
    } 
    else if ($_POST['user_pass1'] !== $_POST['user_pass2']) {
        // header("location: register.php?error=비밀번호가 일치하지 않습니다.");
        // exit();
        ?> <script>
                alert('비밀번호가 일치하지 않습니다.');
                history.back();
            </script>

        <?php
    } 
    else if (empty($_POST['user_mail'])) {
        // header("location: register.php?error=메일을 적어주세요.");
        // exit();
        ?> <script>
                alert('메일을 적어주세요.');
                history.back();
            </script>

        <?php
        
    } 
    else if (empty($_POST['user_phone'])) {
        // header("location: register.php?error=전화번호를 적어주세요.");
        // exit();
        ?> <script>
                alert('전화번호를 적어주세요.');
                history.back();
            </script>

        <?php
    }

    else if (empty($_POST['user_Nickname'])) {
        // header("location: register.php?error=전화번호를 적어주세요.");
        // exit();
        ?> <script>
                alert('별명을 적어주세요.');
                history.back();
            </script>

        <?php
    }

    // else if (!is_int($_POST['user_phone'])){
    //     header("location: register.php?error=전화번호 형식이 아닙니다.");
    //     exit();
    //  }
    else
    {
        //암호화
        $pass1 = password_hash($user_pass1, PASSWORD_DEFAULT); //단방향 암호

        //아이디, 닉네임 중복 체크
        $sql_same = "SELECT * FROM member WHERE id = '$user_id'";
        $order = mysqli_query($conn, $sql_same);

        if (mysqli_num_rows($order) > 0)
        {
            ?> <script>
                        alert('사용할 수 없는 아이디 입니다.');
                        history.back();
                    </script>locker selection

            <?php 
        }
        else
        {
            $sql_save = "INSERT INTO member(name, id, pw, mail, phone, Nickname) VALUES ('$user_name', '$user_id', '$pass1', '$user_mail', '$user_phone','$user_Nickname')";
            $result = mysqli_query($conn, $sql_save);

            if($result)
            {
                // header("location: register.php?success=성공적으로 가입되었습니다."); 헤더로 띄우는 거 
                // exit();
                ?> <script>
                        alert('회원가입에 성공하였습니다.');//경고창
                        location.replace("./login.php");
                    </script>

            <?php } else {
                ?> <script>
                        alert("회원가입에 실패하였습니다.");
                    </script>
            <?php }
            }
            // else
            // {
            //     header("location: register.php?error=가입에 실패하였습니다.");
            //     exit();
            // }
        //}
    }
}

?>