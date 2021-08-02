<html>
    <head>
    <title>Pengaduan Masyarakat</title>
    <link href="img/favicon.png" rel="icon">
    <link rel="stylesheet" href="css/newsplash.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
		.field-icon {
		  float: right;
		  margin-left: -20px;
		  margin-top: -28px;
		  position: relative;
		  z-index: 2;
		}
    </style>
    </head>
    <body>
        <div class="splashleft">
            <img src="img/Logo Web.png" alt="Web Logo" width="auto">
        </div>
        <div class="splashright">
            <div class="splashtext">
                <h1>Pengaduan<span style="color: red;">Masyarakat</span></h1>
                <div class="desc">
                    Selamat Datang di PENGADUAN ONLINE MASYARAKAT disini kamu bisa, <p>melaporkan keluh kesah anda</p>
                    Silahkan Login, belum punya akun? silahkan 
                    <a href="register.php" >
						Register
                    </a>
                </div>
            </div>
            <div class="splashlogin">
                <div class="splashform">
                    <form action="login_cek.php" method="POST">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="username" class="form-control" name="username" id="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" name="password" id="pass" placeholder="Password" required>
                        </div>
						<div>
							<input type="checkbox" id="show-pass" name="show-pass"/>
							<label for="show-pass">Show password</label>
						</div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                        </div>
                        <button type="submit" class="btn btn-primary">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
		<!-- JAVASCRIPT SHOW PASSWORD -->
		<script>
			(function() {
				var _show = function( element, field ) {
					this.element = element;
					this.field = field;
					this.toggle();    
				};
				_show.prototype = {
					toggle: function() {
						var self = this;
						self.element.addEventListener( "change", function() {
							if( self.element.checked ) {
								self.field.setAttribute( "type", "text" );
							} else {
								self.field.setAttribute( "type", "password" );    
							}
						}, false);
					}
				};
				
				document.addEventListener( "DOMContentLoaded", function() {
					var checkbox = document.querySelector( "#show-pass" ),
						pass = document.querySelector( "#pass" ),
						_form = document.querySelector( "form" );
						var toggler = new _show( checkbox, pass );
				});
			})();
		</script>
	<!-- END JAVASCRIPT SHOW PASSWORD -->
    </body>
</html>