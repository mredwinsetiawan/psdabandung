<?php
session_start();
if(!isset($_SESSION['username_legalitas']) AND !isset($_SESSION['password_legalitas'])){
header('Location:./login.php');
}else{?>

<head><title>PSDA</title>
<link rel="icon" href="css/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<style>
/**
 * parallax.css
 * @Author Original @msurguy -> http://bootsnipp.com/snippets/featured/parallax-login-form
 * @Reworked By @kaptenn_com 
 * @package PARALLAX LOGIN.
 */
    
    body {
        background-color: #444;
        background: url(http://s18.postimg.org/l7yq0ir3t/pick8_1.jpg);
        
    }
    .form-signin input[type="text"] {
        margin-bottom: 5px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
    .form-signin .form-control {
        position: relative;
        font-size: 16px;
        font-family: 'Open Sans', Arial, Helvetica, sans-serif;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    .vertical-offset-100 {
        padding-top: 100px;
    }
    .img-responsive {
    display: block;
    max-width: 100%;
    height: auto;
    margin: auto;
    }
    .panel {
    margin-bottom: 20px;
    background-color: rgba(255, 255, 255, 0.75);
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }
body {
          padding-top: 50px;
          position: relative;
      }
      
      pre {
          tab-size: 8;
      }
      
      @media screen and (max-width: 768px) {
          .side-collapse-container{
              width:100%;
              position:relative;
              left:0;
              transition:left .4s;
          }
          .side-collapse-container.out{
              left:200px;
          }
          .side-collapse {
              top:50px;
              bottom:0;
              left:0;
              width:200px;
              position:fixed;
              overflow:hidden;
              transition:width .4s;
          }
          .side-collapse.in {
              width:0;
          }
      }
</style>
<script>
$(document).ready(function() {   
            var sideslider = $('[data-toggle=collapse-side]');
            var sel = sideslider.attr('data-target');
            var sel2 = sideslider.attr('data-target-2');
            sideslider.click(function(event){
                $(sel).toggleClass('in');
                $(sel2).toggleClass('out');
            });
        });
/**
 * parallax.js
 * @Author original @msurguy (tw) -> http://bootsnipp.com/snippets/featured/parallax-login-form
 * @Tested on FF && CH
 * @Reworked by @kaptenn_com (tw)
 * @package PARALLAX LOGIN.
 */

$(document).ready(function() {
    $(document).mousemove(function(event) {
        TweenLite.to($("body"), 
        .5, {
            css: {
                backgroundPosition: "" + parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / '12') + "px, " + parseInt(event.pageX / '15') + "px " + parseInt(event.pageY / '15') + "px, " + parseInt(event.pageX / '30') + "px " + parseInt(event.pageY / '30') + "px",
            	"background-position": parseInt(event.pageX / 8) + "px " + parseInt(event.pageY / 12) + "px, " + parseInt(event.pageX / 15) + "px " + parseInt(event.pageY / 15) + "px, " + parseInt(event.pageX / 30) + "px " + parseInt(event.pageY / 30) + "px"
            }
        })
    })
})
</script>
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
</head>
<!-- 
 * parallax_login.html
 * @Author original @msurguy (tw) -> http://bootsnipp.com/snippets/featured/parallax-login-form
 * @Tested on FF && CH
 * @Reworked by @kaptenn_com (tw)
 * @package PARALLAX LOGIN.
-->


        <script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
        <body>
            <div class="container">
                <div class="row vertical-offset-50">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <div class="row-fluid user-row">
                                    <img src="css/logo.png"  width="120" height="120" class="img-responsive" alt="Conxole Admin"/>
									<br><center><h4>ADMIN DINAS</h4></center>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form accept-charset="UTF-8" role="form" class="form-signin" action="cek_login.php" METHOD="POST">
                                    <fieldset>
                                        <label class="panel-login">
                                            <div class="login_result"></div>
                                        </label>
                                        <input class="form-control" placeholder="Username" name="tUser" type="text">
                                        <input class="form-control" placeholder="Password" name="tPwd" type="password">
                                        <br></br>
                                        <input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="Login">										Login dengan yang lain ? <a href="../index.php">Kembali</a>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
            </div>
<?}?>