<div class="container">
    <section>
        <div id="container_st" >
            <a class="hiddenanchor" id="toregister"></a>
            <a class="hiddenanchor" id="tologin"></a>
            <div id="wrapper">
                <div id="login" >
                      <form action="actions_userLogin.php" method="post">
                        <h1>Welcome !</h1>
						<h1>To-Do-List</h1>
                        <p>
                            <label  class="uname" data-icon="u" >Username </label>
                            <input  name="username" required="required" type="text" autocomplete="off"  placeholder="Username"/>
                        </p>
                        <p>
                            <label class="youpasswd" data-icon="p"> Password </label>
                            <input name="password" required="required" type="password" autocomplete="off" placeholder="●●●●●●●●●●●●" />
                        </p>
                        <p class="login button">
                            <input type="submit" value="Login" />
						</p>
                        <p class="change_link">
							Not a member yet ?
							<a href="index.php" style="color: #cc0000" class="to_register">Sign up</a>
						</p>
                    </form>
                </div>

            </div>
        </div>
    </section>
</div>
