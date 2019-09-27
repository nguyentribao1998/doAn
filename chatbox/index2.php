<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>May 2</title>
    <style>
        .mess{
            height: 400px;
            overflow: auto;
            border: 1px solid #ababab;
            width: 392px;
            margin: 0 auto;
            border-bottom: none;
        }
        .may1{
            background-color: red;
            padding: 5px;
            width: 200px;
            float: left;
            border: 1px solid #cccccc;
        }
        .may2{
            background-color: aqua;
            padding: 5px;
            width: 200px;
            float: right;
            border: 1px solid bisque;
        }
        .wrap{
            height: 400px;
        }
    </style>
    <script src="jquery-3.4.1.min.js">

    </script>
</head>
<body>
<div class="wrap">
    <div class="mess" >
        <?php
        $f = fopen("chat.txt","r") or die("No connect");
        while (!feof($f)){
            $nd = fgets($f);
            $mang = explode("-", $nd);
            if($mang[0]=="may1"){
                ?>
                <div class="may1"><?php  echo $mang[1];?></div>
                <?php
            }elseif ($mang[0]=="may2"){
                ?>
                <div class="may2"><?php  echo $mang[1];?></div>
                <?php
            }
        }
        ?>


    </div>
</div>
<form id="chatbox" method="post">
    <table border="1" cellpadding="10" style="border-collapse: collapse; margin: 0 auto; width: 392px">
        <tr>
            <td><input type="text" name="tin_nhan" id="tin_nhan" style="width: 100%"></td>
            <td style="text-align: center"><input type="submit" value="Send"></td>
        </tr>
    </table>
</form>
<script>
    $(function () {
        $("#chatbox").submit(function () {
            $.ajax({
                type: "POST",
                url:"data.php",
                data :{ tin_nhan : $("#tin_nhan").val(), may:'may2'},
                success: function (data) {
                    $(".mess").html(data);
                    $("#tin_nhan").val("");
                    $(".mess").scrollTop($(".mess")[0].scrollHeight);
                }
            });
            e.preventDefault();

        })
        //hien load khi nguoi dung dang nhap
        setInterval(function () {
            $(".wrap").load("index.php .mess", function () {
                $(".mess").scrollTop($(".mess")[0].scrollHeight);
            });
        },3000);




    })
</script>
</body>
</html>
