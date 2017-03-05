<form action="register.php" method="post">
    <fieldset>
        
        
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="email" placeholder="Email Address" type="text"/>
        </div>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="name" placeholder="First Name" type="text"/>
        </div>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="college" placeholder="College" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password" />
        </div>
         <div class="form-group">
            <input class="form-control" name="confirmation" placeholder="Password (again)" type="password" />
        </div>
        <div class="form-group">
            <input type="radio" name="gender" value="male"> Male
            <input type="radio" name="gender" value="female"> Female<br>

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
    or <a href="login.php">login</a>
</div>
