<?php $this->title = 'Register New User'; ?>

<h1><?= htmlspecialchars($this->title) ?></h1>

<form class="reg_form" method="post" enctype="multipart/form-data">
    <div><label for="username">Username:</label> </div>
    <input id ="username" type="text" name="username"/>
    <div><label for="password">Password:</label> </div>
    <input id ="password" type="password" name="password"/>
    <div><label for="password_confirm">Confirm Password:</label> </div>
    <input id ="password_confirm" type="password" name="password_confirm"/>
    <div><label for="full_name">Full Name:</label> </div>
    <input id ="full_name" type="text" name="full_name"/>

    <div><label for="image">Avatar:</label> </div>
    <input id ="image" type="file" name="image"/>
    <textarea rows="4" cols="50" name="description"  id="description1" placeholder="Describe yourself in 350 characters...">
    </textarea>
    <div><input type="submit" value="Register"/></div>
    <a href="<?=APP_ROOT?>/users/login">[Login]</a></div>



</form>
<script type="text/javascript">
    $(document).ready(function(){
        $("input").focus(function(){
            $(this).prev("div").css("font-size", "large").fadeOut(2000);
        });
    });
</script>