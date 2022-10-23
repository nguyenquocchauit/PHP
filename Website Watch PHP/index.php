<?php 
session_start();
print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            /* LOGIN FORM */
            $("#login").submit(function() {
                var _email = $("input[type='text']").val();
                var _password = $("input[type='password']").val();
                if (_email == "" || _email.length == 0) {
                    alert("Bạn chưa nhập email!");
                } else if (_password == "" || _password.length == 0) {
                    alert("Bạn chưa nhập password!");
                } else {
                    $.ajax({
                        type: "POST",
                        url: "login.php",
                        data: {
                            email: _email,
                            password: _password
                        },
                        cache: false,
                        success: function(result) {
                            /* check array  */
                            var n = result.search("Unknown database");
                            if (n > 0) {
                                alert("Database không đúng!");
                            } else {
                                /* Convert json to array */
                                var data = JSON.parse(result);
                                if (data['message'] == 1) {
                                    alert("Bạn đăng nhập thành công!")
                                    /* data['success'] =  success.php */
                                    /* redirect đến file success.php */
                                    window.location.href = data['success'];

                                } else if (data['message'] == 0) {
                                    alert("Email & Password không đúng");
                                } else {
                                    alert("Không tồn tại email và password");
                                }
                            }
                        },
                        error: function(request, status, error) {
                            alert(status);
                        }
                    });

                }

                return false;

            });

        });
    </script>
    <style>
        * {
            margin: 0;
            padding: 0
        }

        body {
            width: 100%;
            margin: 0 auto;
            max-width: 1350px;
            font-family: 'Oswald', sans-serif;
            background: #F0E4E4;
        }

        .form_hoa {
            width: 40%;
            margin: auto;
        }

        .form_hoa>.box_login {
            width: 100%;
            margin-top: 30%;
            background-color: #d5d5d5;
            box-shadow: 0 0 2px #000;
            border-radius: 10px;
            padding: 20px;
            box-sizing: border-box;
        }

        .box_login form h2 {
            text-align: center;
            color: #000;
            font-size: 30px;
        }

        .box_login form>div {
            padding: 5px 0px;
        }

        .box_login form label {
            padding: 3px 0;
            display: block;
            font-weight: bold;
        }

        .box_login form input {
            width: 100%;
            border: none;
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .box_login form button {
            width: 100%;
            border: none;
            background: #333;
            color: #fff;
            padding: 11px;
            border-radius: 5px;
            box-sizing: border-box;
            text-align: center;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="form_hoa">
        <div class="box_login">
            <form action="" method="POST" id="login">
                <h2>Login Cpanel</h2>
                <div class="row-item">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Enter Email" value="<?php echo (isset($_GET['email']) ? $_GET['email'] : '') ?>" />
                </div>
                <div class="row-item">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter Password" />
                </div>
                <div class="row-item">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>