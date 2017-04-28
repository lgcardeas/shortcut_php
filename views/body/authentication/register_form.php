<form action="register.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus name="email" placeholder="Email" type="email"/>
        </div>
        <div class="form-group">
            <input name="password" placeholder="Password" type="password"/>
        </div>
        <div class="form-group">
            <input  name="confirmation" placeholder="Password" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Register
            </button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="login.php">log in</a> for an account
</div>
