<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>404</title>

        <link rel="stylesheet" href="<?php echo base_url()?>themes/ladmin/layouts/assets/error/css/style.css" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,700' rel='stylesheet' type='text/css' />
		
		<script type="text/javascript" src="<?php echo base_url()?>themes/ladmin/layouts/assets/error/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>themes/ladmin/layouts/assets/error/js/introtzikas.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>themes/ladmin/layouts/assets/error/js/script.js"></script>
		<script type="text/javascript">
			//<![CDATA[
				$(document).ready(function() {
					$().introtzikas({
							line: 'white', 
							speedwidth: 2000, 
							speedheight: 1000, 
							bg: '#474747',
							lineheight: 2
					});	
				});
			//]]>
		</script>
</head>
    <style>
        .btn { border-radius: 0px; }

.btn-glass {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  text-align: center;
  display: inline-block;
  color: rgba(255, 255, 255, 0.7);
  text-decoration: none;
  padding: 1em 2em;
  font-family: Lato;
  font-weight: 300;
  border: 1px dotted transparent;
  letter-spacing: 0.98pt;
  text-transform: uppercase;
  -webkit-transition: background-position 2s cubic-bezier(0, 1, 0, 1), border-color 500ms, background-color 500ms;
  transition: background-position 2s cubic-bezier(0, 1, 0, 1), border-color 500ms, background-color 500ms;
  position: relative;
  background-attachment: fixed, scroll;
  background-size: 100vw 100vh, cover;
  background-position: center center, 0 0;
    
  background-image: -webkit-repeating-linear-gradient(135deg, rgba(255, 255, 255, 0) 8%, rgba(255, 255, 255, 0.075) 10%, rgba(255, 255, 255, 0.075) 14%, rgba(255, 255, 255, 0.15) 14%, rgba(255, 255, 255, 0.15) 15%, rgba(255, 255, 255, 0.075) 17%, rgba(255, 255, 255, 0) 30%, rgba(255, 255, 255, 0) 36%, rgba(255, 255, 255, 0.075) 40%, rgba(255, 255, 255, 0.15) 42%, rgba(255, 255, 255, 0) 43%, rgba(255, 255, 255, 0) 55%, rgba(255, 255, 255, 0.075) 60%, rgba(255, 255, 255, 0.075) 66%, rgba(255, 255, 255, 0.15) 66%, rgba(255, 255, 255, 0.075) 70%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%), -webkit-radial-gradient(ellipse farthest-corner, transparent, rgba(0, 0, 0, 0.2) 110%);
    
  background-image: repeating-linear-gradient(-45deg, rgba(255, 255, 255, 0) 8%, rgba(255, 255, 255, 0.075) 10%, rgba(255, 255, 255, 0.075) 14%, rgba(255, 255, 255, 0.15) 14%, rgba(255, 255, 255, 0.15) 15%, rgba(255, 255, 255, 0.075) 17%, rgba(255, 255, 255, 0) 30%, rgba(255, 255, 255, 0) 36%, rgba(255, 255, 255, 0.075) 40%, rgba(255, 255, 255, 0.15) 42%, rgba(255, 255, 255, 0) 43%, rgba(255, 255, 255, 0) 55%, rgba(255, 255, 255, 0.075) 60%, rgba(255, 255, 255, 0.075) 66%, rgba(255, 255, 255, 0.15) 66%, rgba(255, 255, 255, 0.075) 70%, rgba(255, 255, 255, 0) 75%, rgba(255, 255, 255, 0) 100%), radial-gradient(ellipse farthest-corner, transparent, rgba(0, 0, 0, 0.2) 110%);
}

.btn-glass:hover {
  background-position: -100vw 0, 0 0;
}

.btn-glass:active {
  background-position: -75vw 0, 0 0;
  border-style: solid;
}

.nav-light {
  background-color: white;
}

.nav-light .btn-glass {
  color: #585858;
  background-color: rgba(17, 17, 17, 0);
}

.nav-light .btn-glass:hover {
  color: rgba(255, 255, 255, 0.7);
  border-color: #000000;
  background-color: #111111;
}

.nav-light .btn-glass:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(17, 17, 17, 0.5);
}

.nav-light .btn-glass.btn-primary {
  color: #0d6b94;
  background-color: rgba(42, 143, 189, 0);
}

.nav-light .btn-glass.btn-primary:hover {
  color: rgba(255, 255, 255, 0.7);
  border-color: #1c607e;
  background-color: #2a8fbd;
}

.nav-light .btn-glass.btn-primary:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(42, 143, 189, 0.5);
}

.nav-light .btn-glass.btn-success {
  color: #3cb22e;
  background-color: rgba(127, 175, 27, 0);
}

.nav-light .btn-glass.btn-success:hover {
  color: rgba(255, 255, 255, 0.7);
  border-color: #4f6d11;
  background-color: #3cb22e;
}

.nav-light .btn-glass.btn-success:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(127, 175, 27, 0.5);
}

.nav-light .btn-glass.btn-warning {
  color: #fccd69;
  background-color: rgba(251, 184, 41, 0);
}

.nav-light .btn-glass.btn-warning:hover {
  color: rgba(255, 255, 255, 0.7);
  border-color: #d49104;
  background-color: #fbb829;
}

.nav-light .btn-glass.btn-warning:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(251, 184, 41, 0.5);
}

.nav-light .btn-glass.btn-danger {
  color: #f56558;
  background-color: rgba(240, 35, 17, 0);
}

.nav-light .btn-glass.btn-danger:hover {
  color: rgba(255, 255, 255, 0.7);
  border-color: #aa180b;
  background-color: #f02311;
}

.nav-light .btn-glass.btn-danger:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(240, 35, 17, 0.5);
}

.nav-light .btn-glass.btn-info {
  color: #98e9f0;
  background-color: rgba(108, 223, 234, 0);
}

.nav-light .btn-glass.btn-info:hover {
  color: rgba(255, 255, 255, 0.7);
  border-color: #29d0e0;
  background-color: #6cdfea;
}

.nav-light .btn-glass.btn-info:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(108, 223, 234, 0.5);
}

.nav-dark {
  background-color: #444444;
}

.nav-dark .btn-glass {
  color: rgba(255, 255, 255, 0.7);
  background-color: rgba(17, 17, 17, 0);
}

.nav-dark .btn-glass:hover {
  border-color: #000000;
  background-color: #111111;
}

.nav-dark .btn-glass:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(17, 17, 17, 0.5);
}

.nav-dark .btn-glass.btn-primary {
  color: rgba(255, 255, 255, 0.7);
  background-color: rgba(42, 143, 189, 0);
}

.nav-dark .btn-glass.btn-primary:hover {
  border-color: #1c607e;
  background-color: #2a8fbd;
}

.nav-dark .btn-glass.btn-primary:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(42, 143, 189, 0.5);
}

.nav-dark .btn-glass.btn-success {
  color: rgba(255, 255, 255, 0.7);
  background-color: rgba(127, 175, 27, 0);
}

.nav-dark .btn-glass.btn-success:hover {
  border-color: #4f6d11;
  background-color: #3cb22e;
}

.nav-dark .btn-glass.btn-success:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(127, 175, 27, 0.5);
}

.nav-dark .btn-glass.btn-warning {
  color: rgba(255, 255, 255, 0.7);
  background-color: rgba(251, 184, 41, 0);
}

.nav-dark .btn-glass.btn-warning:hover {
  border-color: #d49104;
  background-color: #fbb829;
}

.nav-dark .btn-glass.btn-warning:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(251, 184, 41, 0.5);
}

.nav-dark .btn-glass.btn-danger {
  color: rgba(255, 255, 255, 0.7);
  background-color: rgba(240, 35, 17, 0);
}

.nav-dark .btn-glass.btn-danger:hover {
  border-color: #aa180b;
  background-color: #f02311;
}

.nav-dark .btn-glass.btn-danger:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(240, 35, 17, 0.5);
}

.nav-dark .btn-glass.btn-info {
  color: rgba(255, 255, 255, 0.7);
  background-color: rgba(108, 223, 234, 0);
}

.nav-dark .btn-glass.btn-info:hover {
  border-color: #29d0e0;
  background-color: #6cdfea;
}

.nav-dark .btn-glass.btn-info:active {
  position: relative;
  z-index: 1;
  box-shadow: 0 0 1em 0.5ex rgba(108, 223, 234, 0.5);
}

nav.btn-bar {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: end;
  -webkit-justify-content: flex-end;
  -ms-flex-pack: end;
  justify-content: flex-end;
  -webkit-flex-wrap: wrap;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
}

body {
  width: 75vw;
  margin: 4em auto;
  line-height: inherit;
}

section {
  margin-top: 3em;
  padding: 0;
  border: 2px solid transparent;
  border-radius: 2px;
  box-sizing: border-box;
  background-color: white;
  box-shadow: 0 1ex 1em rgba(0, 0, 0, 0.3);
}
    </style>

<body>

	<img src="<?php echo base_url()?>themes/ladmin/layouts/assets/error/images/bg.jpg" id="bg" alt="" /><!-- Background image -->
	<div class="bg_overlay"></div><!-- Pattern -->
	
		<div id="wrap">
			<div id="block">
				<div id="content">
					<div class="top_img">
						<div class="img_eror"></div>
					</div>
					
					<div class="text_eror">
						<h1>"Ooops! Page not found..."</h1>
<!--						<p>Enter a keyword(s) in the search field above, maybe you'll find the page you're looking for. <br />
						   Or, you can take a look at our <a href="#">SITEMAP</a>. You can also return <a href="#">HOME</a>.</p>-->
					</div>
                                  
                                    <div class="srch" style="margin-left: 300px;">
                                        <a href="<?php echo base_url()?>" class="btn btn-glass btn-primary">
                                                    <i class="fa fa-fw fa-lg fa-chevron-right"></i> Go Back
                                                    </a>
					</div>
                                     
                                  
					
					
				</div>
			</div>
		</div>

</body>
</html>