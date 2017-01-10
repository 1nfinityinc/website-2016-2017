<!-- Portfolio Modal 1 -->
<div class="infinity-modal modal fade bg-gray text-center" id="account" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog bg-gray">
		<div class="modal-content bg-gray">
			<div class="bg-gray">
				<div class="dev-brand-font size-30 bold">
					<span class="dev-main-color">1</span>nfinity</a>
				</div <div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="modal-body tabs-custom ">
						<ul class="nav nav-tabs ">
							<li class="active" style="width: 50%"><a data-toggle="tab" href="#tabSignin">Sign In</a></li>
							<li style="width: 50%"><a data-toggle="tab" href="#tabSignup">Sign Up</a></li>
						</ul>
						<div class="tab-content">
							<div id="tabSignin" class="tab-pane fade in active" >
								<h3>SIGN IN</h3>
								<form data-toggle="validator" role="form" id="signin" name="signin">
									<div class="form-group has-feedback">
										<input type="email" class="form-control" id="signInEmail" style="line-height: 30px !important;" placeholder="Email" required>
										<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
									</div>
									<div class="form-group has-feedback">
										<input type="password" data-minlength="6" class="form-control" id="signInPassword" placeholder="Password" required>
										<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
									</div>
								</form>
								<div id="errorSignIn"></div>
                            								<div class="row">
									<div class="col-md-6">
										<button class="btn btn-success btn-block margin-10-top" id="submitSignIn">Sign in</button>
									</div>
									<div class="col-md-6">
										<button class="btn btn-info btn-block margin-10-top">Forgot Password</button>
									</div>
								</div>
								<hr class="border-top: 1px solid white;" />
								<a onClick="PopupCenter('<?php print $authUrl; ?>','Google Signin','900','700'); " class="btn btn-block btn-lg btn-social btn-google">
									<span class="fa fa-google"></span> Sign in with Google
								</a>
								<hr class="border-top: 1px solid white;" />
								<button type="button" class="btn btn-warning btn-lg fg-black" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
							</div>
							<div id="tabSignup" class="tab-pane fade">
								<h3>SIGN UP</h3>
								<form data-toggle="validator" role="form" id="signup" name="signup">
									<div class="form-group">
										<input type="text" class="form-control" id="signUpName" placeholder="First and Last Name" required>
									</div>
									<div class="form-group has-feedback">
										<input type="email" class="form-control" id="signUpEmail" placeholder="Email" required>
										<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
									</div>
									<div class="form-group has-feedback">
										<input type="password" data-minlength="6" data-maxlength="30" class="form-control" id="signUpPassword" placeholder="Password - Min Length 6" required>
										<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
									</div>
									<div class="form-group has-feedback">
										<input type="password" data-minlength="6" data-maxlength="30" class="form-control" id="signUpConfirm" data-match="#signUpPassword" placeholder="Confirm Pasword" required>
										<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
									</div>
								</form>
								<div id="errorSignUp"></div>
								<button class="btn btn-success btn-block margin-10-top" id="submitSignUp">Sign Up</button>
								<hr class="border-top: 1px solid white;" />
								<a onClick="PopupCenter('<?php print $authUrl; ?>','Google Signin','900','700'); " class="btn btn-block btn-lg btn-social btn-google">
									<span class="fa fa-google"></span> Sign in with Google
								</a>
								<hr class="border-top: 1px solid white;" />
								<button type="button" class="btn btn-warning btn-lg fg-black" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>