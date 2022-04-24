<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=base_url("public/asset/css/snow.css")?>">
    <link rel="stylesheet" href="<?=base_url("public/asset/css/login.css")?>">
    <title>Login</title> 
</head>
<body>
    <div class="snowflakes" aria-hidden="true">
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
        <div class="snowflake">❅</div>
        <div class="snowflake">❆</div>
    </div>
    <div class="container">
        <header class="header">
            <div class="header__logo">
                <img src="<?=base_url("/public/asset/image_login/logo_codeigniter.png")?>" alt="" class="header__img">
            </div>
            <div class="header___controls">
                <!-- <a class="headerControl__signIn current">Sign In</a>
                <a class="headerControl__signUp">Sign Up</a> -->
            </div>
        </header>
        <div class="wrapper">
            <div class="formLogin">
                <h1 class="headingForm">Sign In</h1>
                <form name="login-form" id="frmLogin" action="Login/login" method="POST">
                   <div class="groupInput">
                    <div class="input">
                            <i class="input__icon"><i class="fa-regular fa-user"></i></i>
                            <input name="username" type="text" placeholder=" " class="input__text" id="txtusername">
                            <label for="username" class="input__label" >Username</label>
                        </div>
                        <div class="input">
                            <i class="input__icon"> <i class="fa-solid fa-key"></i></i>
                            <input name="password" type="password" placeholder=" " class="input__text" id="txtpassword">
                            <label for="password" class="input__label" >Password</label>
                            <i class="input__icon-visible active">
                                <i class="fa-solid fa-eye"></i>
                            </i>
                            <i class="input__icon-hidden ">
                                <i class="fa-solid fa-eye-slash"></i>
                            </i>
                        </div>
                   </div>
                   <?php if(session()->getFlashdata('msg')):?>
                    <div id="alertStateLogin" class="alert alert-warning" style="color:red; padding-left:15px">
                        <?= session()->getFlashdata('msg') ?>
                    </div>
                    <?php endif;?>
                    <div class="wrapper__button">
                        <input type="submit" id="btnSubmit" class="btn__login" value="Enter">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="response">
        <span><i class="response__icon fa-solid fa-circle-exclamation"></i>
            Minh Tònn Administrator said: 
            <span class="message"></span>
        </span>
    </footer>
    
    <script src="<?=base_url("/public/asset/js/login.js")?>"></script>
</body>
</html>