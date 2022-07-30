<?php

include_once('./include/adheader.php');
if (isset($_GET['error'])) {

    if ($_GET['error'] == 'password_incorrect') {
      ?>
      <h4 style="">Login Failed due to incorrect password</h4>
      <?php
    }
  }



?>


    <div class="flex">
    <div class="container">
        <div class="user">        </div>
        <form action="login.php " method="POST">
            <h1>Admin Login</h1>
            <div class="input">
            <input type="text" name="email" id="email" required/>
            <label > Email </label>
            </div>
            <div class="input box">
                <input type="password" name="password" id="password" required/>
                <label >Password</label>
                <div class="forgot"> <a href="#">Forgot Password?</a> 
            </div>
            </div>
            <input type="submit" name="login" value="login" />
        </form>
            <div class="div">
                <div class="line"> </div>
            </div>
    </div>
</div>
    

