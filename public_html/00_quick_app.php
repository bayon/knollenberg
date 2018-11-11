<?php 

session_start(); 
if(isset($_GET) && isset($_GET['c']) && isset($_GET['m']) && $_GET['c'] == 'private' && $_GET['m'] == 'logout' ){
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
} 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<!-- <link rel='stylesheet' type='text/css' href='style.css'> -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"
                        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                        crossorigin="anonymous">
		</script>
        <link rel='stylesheet' type='text/css' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular.js"></script>
		<title>Dashboard</title>
		<style> 
		    .dev-fixed-footer{position:fixed;bottom:0px;left:0px;height:100px;overflow-y:scroll;border:solid 1px #ccc;
		</style>
	</head>
	<div class="dev-fixed-footer " style="width:100%;">
	    <?php
	        //Initial Properties
	        $is_logged_in = false;
	        $_SESSION['menu'] = array();
	        //Handle Requests
	        if(isset($_GET)){
	            if (isset($_GET['c'])) {
                	switch ($_GET['c']) {
                		case 'public' :
                			 if (isset($_GET['m'])) {
                            	switch ($_GET['m']) {
                            		case 'public1' :
                            		    print_r($_GET); 
                            			break;
                                            
                                    case 'public2' :
                                        print_r($_GET); 
                            			break;
                            			
                            		default :
                            		    echo('<br>Unexpected method request params');
                		                print_r($_GET);
                            			break;
                            	}
                            }
                			
	                        break;
                        case 'private' :
                             if (isset($_GET['m'])) {
                            	switch ($_GET['m']) {
                            		case 'private1' :
                            		    print_r($_GET); 
                            			break;
                            
                                    case 'private2' :
                                        print_r($_GET); 
                            			break;
                            		case 'login' :
                                        print_r($_GET); 
                                        if($_GET['pwd'] == "yes"){
                                            $_SESSION['is_logged_in'] = true;
                                        }
                            			break;
                            			
                            		case 'logout' :
                                        print_r($_GET); 
                                        //has to be handled before modified header info
                                        //session_start();
                                       
                            			break;
                            			
                            	
   
	
                            			
                            			
                            			
                            		 case 'makeMenuItem' :
                            		     if($_GET['section'] != "" && $_GET['display'] != "" && $_GET_['url'] != ""){
                            		        
                            		         
                            		     }
                                        print_r($_GET); 
                                      
                            			break;
                            		default :
                            		    echo('<br>Unexpected method request params');
                		                print_r($_GET);
                            			break;
                            	}
                            }
                			break;
                			
                		default :
                		    echo('<br>Unexpected controller request params');
                		    print_r($_GET); 
                			break;
                	}
                }
	            
	        }
	        
	        //Define Dynamic Properties
	          if($_SESSION['is_logged_in'] == true){
	            $is_logged_in = true;
	        }else{
	             $is_logged_in = false;
	        }
	        echo("<br>is_logged_in:".$is_logged_in);
	    ?>
	</div>

	<body>
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="container-fluid">
					<div class="navbar-header">

						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

					</div>
					<div class="collapse navbar-collapse" id="myNavbar" style="max-height:50px !important;">
						<div class="navbar visible-desktop">
							<div class="navbar-inner ">
								<div class="container-fluid" style="margin-left:50px !important;margin-right:50px !important;">
									<ul class="nav navbar-nav">
										<li>
											<a class="navbar-brand" href="dashboard.php?c=dashboard&m=home" style="color:#fff !important;">Dashboard</a>
										</li>
										<!-- menu section public -->
										 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Public Section <span class="caret"></span></a>
    										<ul class="dropdown-menu">
        										<li> <a id='public1' href='?c=public&m=public1'> public1 </a></li>
        										<li> <a id='public2' href='?c=public&m=public2'> public2 </a></li>
        										<li> <a id='public3' href='?c=public&m=public3'> public3 </a></li>
    										</ul>
										</li>
										<?php if($is_logged_in == true){ ?>
											<!-- menu section private -->
    										 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Private Section <span class="caret"></span></a>
        										<ul class="dropdown-menu">
            										<li> <a id='private1' href='?c=private&m=private1'> private1 </a></li>
            										<li> <a id='private2' href='?c=private&m=private2'> private2 </a></li>
            										<li> <a id='private3' href='?c=private&m=private3'> private3 </a></li>
        										</ul>
    										</li>
										
    										<?php if($_GET['section'] == '1'){ ?>
    											<!-- menu section custon -->
        										 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Custom Section <span class="caret"></span></a>
            										<ul class="dropdown-menu">
            										    <?php if($_GET['order'] == '0'){ ?>
                										    <li> <a class='xxx' href='http://<?php echo($_GET['url']); ?>'> <?php echo($_GET['display']); ?> </a></li>
                										<?php } ?>
                										 <?php if($_GET['order'] == '0'){ ?>
                										    <li> <a class='xxx' href='http://<?php echo($_GET['url']); ?>'> <?php echo($_GET['display']); ?> </a></li>
                										<?php } ?>
                										 <?php if($_GET['order'] == '0'){ ?>
                										    <li> <a class='xxx' href='http://<?php echo($_GET['url']); ?>'> <?php echo($_GET['display']); ?> </a></li>
                										<?php } ?>
                									 
                										
            										</ul>
        										</li>
    										
    										<?php } ?>
										
										<?php
										} //is_logged_in
										?>
										 

									</ul>
									<ul class="nav navbar-nav navbar-right">
									

									 
										<li>
											<a href=""><span class="glyphicon glyphicon-user"></span>Register</a>
										</li>
											<li>
											<a href="?c=private&m=login"><span class="glyphicon glyphicon-log-in"></span> Login</a>
										</li>
	                                    <li>
											<a href="?c=private&m=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
										</li>
									</ul>

								</div>
							</div>
						</div>

					</div>
				</div>
			</nav>
		 
		<!-- ==========================================================================  -->
	    
	    <div class="container">
	       <?php $heightOfNavigation = "65px"; ?>
	       <div class="row" style="margin-top:<?php echo($heightOfNavigation); ?>;">
	           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                 <h1>Dashboard</h1>
	           </div> 
	       </div>
	          
	    </div>
		<script>
		$(document).ready(function(){
			console.log('jquery is ready.');
		});
		(function(){
		    console.log('modular design pattern');
		}());
		</script>
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular-route.js"></script>
	</body>
</html>