<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link
			rel="stylesheet"
			href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
		/>
		<link rel="stylesheet" href="regstyle.css" />
        <title>Document</title>
        <script type = "text/javascript"> 
        function validate1() 
        {   
            var fn = document.forms["register-form"]["firstname"].value;
            var ln = document.forms["register-form"]["lastname"].value;
            var un = document.forms["register-form"]["username"].value;
            var phone = document.forms["register-form"]["phone"].value;
            var email = document.forms["register-form"]["email"].value;
            var state = document.forms["register-form"]["state"].value;
            
            var regname = /^[a-zA-Z ]{1,50}$/;
            var regusername = /^[a-zA-Z0-9 ]{1,50}$/;
            var regphone = /^[789]\d{9}$/;
            var regemail = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            var regstate = /^[a-zA-Z ]{1,25}$/;

            var r1 = regname.test(fn);
            var r2 = regname.test(ln);
            var r3 = regusername.test(un);
            var r4 = regphone.test(phone);
            var r5 = regemail.test(email);
            var r6 = regstate.test(state);

            if(fn==""||r1==false) 
            { 
                alert('Please enter a valid first name(max length:50, accepts only alphabets)'); 
                return false; 
            }
            else if(ln==""||r2==false) 
            { 
                alert('Please enter a valid last name(max length:50, accepts only alphabets)'); 
                return false; 
            }
            else if(un==""||r3==false) 
            { 
                alert('Please enter a valid username(max length:50, accepts only alphabets and digits)'); 
                return false; 
            }
            else if(phone==""||r4==false) 
            { 
                alert('Please enter a valid phone number.'); 
                return false; 
            }
            else if(email==""||r5==false) 
            { 
                alert('Please enter a valid email address.'); 
                return false; 
            }
            else if(state==""||r6==false) 
            { 
                alert('Please enter a valid state name(max length:25, accepts only alphabets)'); 
                return false; 
            }
            else 
            return true;
        } 
        </script>
	</head>
	<body>
		<div id="page-wrapper">
			<div id="modal-wrapper">
				<div id="modal">
					<div id="cards">
						<div class="card" id="login">
							<div class="box">
								<b style="color:white; font-family:oswald;">COVID 19 INFO-RESOURCE PLATFORM</b>
							</div>
							<form class="login-form" method="post" action="login1.php">
								<label >Username
								</label>
								<input type="text" id="login-email" name="username" class="textbox" required />
								<label
									>Password
								</label>
								<input type="password" name="password" id="login-password" class="textbox" required/><br><br>
							
							<button type="submit" value="Login" name="Login" style="display: block;
                                width: 100%;
                                padding: 20px 0;
                                color: white;
                                background:rgb(26, 26, 26);
                                background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMTAwJSI+CiAgICA8c3RvcCBvZmZzZXQ9IjAlIiBzdG9wLWNvbG9yPSIjM2I4Njg2IiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzBiNDg2YiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgPC9saW5lYXJHcmFkaWVudD4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
                                background: linear-gradient(135deg, rgb(26, 26, 26) 0%,rgb(64, 64, 64) 100%);
                                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#FF3B8686', endColorstr='#FF0B486B',GradientType=1 );
                                border: 0;
                                font-size: 1em;
                                font-weight: bold;
                                font-family:oswald;
                                cursor: pointer;">
								Log-in to your account <i style="font-size: 0.8em;" class="ion-ios-arrow-thin-right"></i>
                            </button>
                            
                        </div>
                        </form>
						<div class="card" id="register">
							<div class="box">
								<div id="branding-small">
								</div>
								<div class="box-header"><b style="color:white; font-family:oswald;">REGISTER</b></div>
								<form name="register-form" id="register-form" onsubmit="return validate1()" action="register1.php" method="post">
                                    <label>First Name</label>
                                    <input type="text" name="firstname" class="textbox">
                                    <label>Last Name</label>
                                    <input type="text" name="lastname" class="textbox">
                                    <label>Username</label>
                                    <input type="text" name="username" class="textbox">
                                    <label>Phone number</label>
                                    <input type="tel" name="phone" class="textbox">
									<label>Email</label>
                                    <input type="text" name="email" id="register-email" class="textbox" />
                                    <label >State</label>
                                    <div style="width:200px;">
                                    <select name="state" id="state"style="border: 1px solid white; font-family:oswald; width:353px; height: 43px; color: white; background:  rgb(124, 124, 124)" >
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Ladakh">Ladakh</option>
                                        <option value="Lakshadweep">Lakshadweep</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Puducherry">Puducherry</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="West Bengal">West Bengal</option>
                                    </select>
                                    </div>
									<label>Password</label>
									<input
										type="password"
										id="register-password"
                                        class="textbox"
                                        name="password"
                                        required
									/>
									<label>Confirm Password</label>
									<input
										type="password"
										id="register-password-conf"
                                        class="textbox"
                                        name="password"
                                        required
									/>
								
							</div>
							<button type="submit" value="Register" name="register" style="display: block;
                                width: 100%;
                                padding: 20px 0;
                                color: white;
                                background:rgb(26, 26, 26);
                                background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMTAwJSI+CiAgICA8c3RvcCBvZmZzZXQ9IjAlIiBzdG9wLWNvbG9yPSIjM2I4Njg2IiBzdG9wLW9wYWNpdHk9IjEiLz4KICAgIDxzdG9wIG9mZnNldD0iMTAwJSIgc3RvcC1jb2xvcj0iIzBiNDg2YiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgPC9saW5lYXJHcmFkaWVudD4KICA8cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIiBmaWxsPSJ1cmwoI2dyYWQtdWNnZy1nZW5lcmF0ZWQpIiAvPgo8L3N2Zz4=);
                                background: linear-gradient(135deg, rgb(26, 26, 26) 0%,rgb(64, 64, 64) 100%);
                                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#FF3B8686', endColorstr='#FF0B486B',GradientType=1 );
                                border: 0;
                                font-size: 1em;
                                font-weight: bold;
                                font-family:oswald;
                                cursor: pointer;">
								Create an account <i style="font-size: 0.8em;" class="ion-ios-arrow-thin-right"></i>
							</button>
                        </div>
                        </form>
					</div>
					<div id="toggle-tabs">
						<div class="tab" id="toggle-login">Sign In</div>
						<div class="tab" id="toggle-register">Register</div>
					</div>
				</div>
			</div>
		</div>
		<script
			src="https://code.jquery.com/jquery-2.2.4.min.js"
			integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
			crossorigin="anonymous"
        ></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="reg.js"></script>
        
	</body>
</html>
