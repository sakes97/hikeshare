<h3>Login page</h3>
<form method="post" action="login/signin">
    <label>username</label>
    <input type="text" name="input_username" placeholder="enter username">
    <br>
    
    <label>password</label>
    <input type="password" name="input_password" placeholder="enter password">
    <br>

    <input type="submit">

    <?php 
    echo Hash::create('md5', 'test', HASH_PASSWORD_KEY);
    ?>
</form>