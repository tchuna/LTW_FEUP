<div class="container">
    <section>
        <div id="container_st" >
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>
            <div id="wrapper">
                <div id="login" >
                    <form  action="actions_userSignUp.php"  method="post" >
                        <h1>Sign Up For Free</h1>
                        <p>
                            <label  class="uname" data-icon="u" >First Name </label>
                            <input  name="name" required="required" autocomplete="off"  type="text" placeholder="First name"/>
                        </p>
						<p>
                            <label  class="uname" data-icon="u" >Last Name </label>
                            <input  name="lastname" required="required" autocomplete="off" type="text" placeholder="Surname"/>
                        </p>
						<p>
                            <label  class="uname" data-icon="u" >Desired username </label>
                            <input name="username" autocomplete="off"  required="required" type="text" placeholder="Username"/>
                        </p>

						<p>
                            <label class="youmail" data-icon="e" > Email</label>
                            <input  name="email" required="required" type="email" autocomplete="off"  placeholder="example@mail.com"/>
                        </p>

						<p>
                            <label id="date" data-icon="u" > Birthday</label>
                            <input name="birthdate" required="required"  autocomplete="off" type="date" />
                        </p>
						<p>
                            <label  data-icon="u" > Current location</label>
                            <input  name="address" autocomplete="off" required="required" type="text" placeholder="Location"/>
                        </p>

                        <p>
                            <label class="youpasswd" data-icon="p"> Password </label>
                            <input  name="password" required="required"  autocomplete="off" type="password" placeholder="●●●●●●●●●" />

                        </p>
						<p>
                            <label class="youpasswd" data-icon="p"> Re-enter password </label>
                            <input id="password" name="confirmPassword" required="required" autocomplete="off" type="password" placeholder="●●●●●●●●●" />
                        </p>
                        <p class="login button">
                            <input type="submit" value="Sign up" />
						</p>
                        <p class="change_link">
							Already a member ?
							<a href="login.php"  style="color: #cc0000" class="to_register"> Login instead </a>
						</p>
                    </form>
                </div>

            </div>
        </div>
    </section>
</div>
