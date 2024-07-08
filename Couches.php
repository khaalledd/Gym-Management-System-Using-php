<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coaches</title>
    <style>
        h1 {
            color: darkturquoise;
            font-size: 30px;
            font-weight: bold;
            text-align: center;
        }

        .container {
            position: relative;
            /* flex-wrap: wrap; */
        }

        .links {
            display: flex;
            flex-direction: column;
            flex-basis: 25%;
        }

        .cou {
            border: 3px solid;
            width: 100px;
            margin: 0 20px 30px;
            font-size: 22px;
            font-weight: bold;
            padding: 10px 30px;
            border-radius: 6px;
            background-color: #2196f3;
            color: white;
            text-decoration: none;
            text-align: center;
        }

        .sub {
            border: 3px solid;
            width: 100px;
            margin: 0 20px 30px;
            font-size: 22px;
            font-weight: bold;
            padding: 10px 30px;
            border-radius: 6px;
            background-color: #2196f3;
            color: white;
            text-decoration: none;
            text-align: center;
        }
        .box {
            position: absolute;
            left: 20%;
            top: 5px;
            border: 3px solid #777;
            width: 700px;
        }
        .box label {
            width: fit-content;
            margin: 5px 20px 30px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 6px;
            color: black;
            border: none;
            text-decoration: none;
        }
        .box tr td {
            border: 1px solid rgb(188, 176, 176);
        }
        .box input {
            width: 500px;
            padding: 5px;
            border: none;
            /* border-bottom: 1px solid #CCC; */
            caret-color: #2196f3;
            outline: none;
        }
        .box select {
            width: 500px;
            padding: 5px;
            border: none;
            /* border-bottom: 1px solid #CCC; */
            /* caret-color: #2196f3; */
            outline: none;
        }
        .box .ha {
            display: block;
            border: 3px solid;
            width: fit-content;
            font-size: 22px;
            font-weight: bold;
            padding: 10px 30px;
            border-radius: 6px;
            cursor: pointer;
            
        }
        .box .ha:hover {
            color: #2196f3;
            border-color: #2196f3;
        }

    </style>
</head>

<body>
    <h1>Coaches</h1>
    <div class="container">
        <div class="links">
            <a href="Couches.php" class="cou">Coaches</a>
            <a href="Subscribers.php" class="sub" >Members</a>
            <a href="index.php" class="sub" >LogOut</a>
        </div>
        <form action=""  method="post">
        <table class="box">
            <tr>
                <td><label for="">Coach_ID: </label></td>
                <td><input type="text" name="id"></td>
            </tr>
            <tr>
                <td><label for="">Name: </label></td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td><label for="">Mobile: </label></td>
                <td><input type="text" name="mobile"></td>
            </tr>
            <tr>
                <td><label for="">Email: </label></td>
                <td><input type="email" name="E_mail"></td>
            </tr>
            <tr>
                <td><label for="gender">Gender: </label></td>
                <td><select name="gender" id="gender">
                        <option value="">--Select Gender--</option>
                        <option value="male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="">Join_date: </label></td>
                <td><input type="date" name="date"></td>
            </tr>
            <tr>
                <td><input class="ha" type="submit" value="Send" name="submit"></td>
                <td><input class="ha" type="reset" value="Reset" name="reset"></td>
            </tr>
        </table>
        <div class="form-status">
                        <?php echo $err ?>
                    </div>
    </form>
    </div>
</body>

</html>