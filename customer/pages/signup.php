<h3 class="page-title">Sign Up</h3>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			Password must follow the requirements:
			<ul>
				<li>Password must be at least 4 characters</li>
				<li>No more than 8 characters</li>
				<li>Must include at least one upper case letter</li>
				<li>At least one lower case letter</li>
				<li>At least one numeric digit</li>
			</ul>
		</div>
		<div class="col-md-8">
			<h4>Register</h4>
			<form id="registerForm" name="registerForm" method="POST" action="customer/logic/signup_form.php" onsubmit="return signupValidation()">
				<div class="input-box">
					<label for="userName">Username:</label>
					<input type="text" id="username" name="username" maxlength="20" required/>
				</div>
				<div class="input-box">
					<label for="email">email:</label>
					<input type="email" id="email" name="email"  maxlength="50" required/>
				</div>
				<div class="input-box">
					<label for="confirmEmail">confirm email:</label>
					<input type="email" id="confirmEmail" name="confirmEmail"  maxlength="50" required/>
				</div>
				<div class="input-box">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password"  required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}$" title="Password must be at least 4 characters, no more than 8 characters, and must include at least one upper case letter, one lower case letter, and one numeric digit."/>
				</div>
				<div class="input-box">
					<label for="confirmPassword">Confirm password:</label>
					<input type="password" id="confirmPassword" required name="confirmPassword"/>
				</div>
				<div class="input-box">
					<input type="submit" id="submit" value="Submit"/>
				</div>
			</form>
		</div>
	</div>
</div>