<?php 

session_start(); 
if(isset($_GET) && isset($_GET['c']) && isset($_GET['m']) && $_GET['c'] == 'private' && $_GET['m'] == 'logout' ){
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
} 
$_IN_DEV = false;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Knollenberg Foundation</title>
        <meta name="description" content="The Knollenberg foundation sees future environmental challenges and advocates sensitivity and perspective on the environment.">
        <meta name="keywords" content="">
        <meta charset="utf-8">
        <meta name="author" content="www.sprite-pilot.com">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0 , user-scalable=no" />
        
        <!-- Favicons -->
        <link rel="shortcut icon" href="<!-- images/favicon.png -->">

        <!-- CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style-responsive.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/vertical-rhythm.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/magnific-popup.css">  
        <!-- override -->
         <link rel="stylesheet" href="css/custom-override.css">
        	<style> 
		    .dev-fixed-footer{
		        position:fixed;
		        bottom:0px;
		        left:0px;
		        height:100px;
		        overflow-y:scroll;
		        border:solid 1px #ccc;
		        <?php if($_IN_DEV){echo("display:block;"); }else{echo("display:none;");} ?>
		    }
		</style>
		<style>
		    /* OVERRIDES */
		    .nav-logo-wrap .logo { max-width: 250px;}
		    .main-nav.dark .logo, .main-nav.dark a.logo:hover{
		        font-size:14px;
		    }
		    /*---RWD----------------------------------------*/
             @media (min-width: 0px) and (max-width: 768px) { 
                .hs-line-1{
                    font-size:20px;
                    letter-spacing:6px;
                }
             }
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
                		case 'lang' :
                			 if (isset($_GET['m'])) {
                            	switch ($_GET['m']) {
                            		case 'english' :
                            		    print_r($_GET); 
                            			break;
                                            
                                    case 'french' :
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
	     <?php if($_GET['m'] == "french"){  
            include_once('lang.french.php');
          }else{
            include_once('lang.english.php');  
          }
          ?>
	</div>
    <body class="appear-animate">
        
        <!-- Page Loader -->        
        <div class="page-loader">
            <div class="loader">Loading...</div>
        </div>
        <!-- End Page Loader -->
        
        <!-- Page Wrap -->
        <div class="page" id="top">
            
            <!-- Home Section  
            data-background="images/full-width-images/section-bg-1.jpg"
            -->
            <section class="home-section bg-dark-alfa-30 parallax-2"  id="home" style="background-color:#222;">
                <div class="js-height-full container">
                    
                    <!-- Hero Content -->
                    <div class="home-content">
                        <div class="home-text">
                            
                            <h1 class="hs-line-1 font-alt mb-80 mb-xs-30 mt-70 mt-sm-0">
                                <?php echo($lang['main_H1_title']); ?>
                            </h1>
                            
                            <div class="hs-line-6">
                                
                                <?php echo($lang['main_subtitle']); ?>
                            </div>
                            
                        </div>
                    </div>
                    <!-- End Hero Content -->
                    
                    <!-- Scroll Down -->
                    <div class="local-scroll">
                        <a href="#about" class="scroll-down"><i class="fa fa-angle-down scroll-down-icon"></i></a>
                    </div>
                    <!-- End Scroll Down -->
                    
                </div>
            </section>
            <!-- End Home Section -->
            
            <!-- Navigation panel -->
            <nav class="main-nav dark transparent stick-fixed">
                <div class="full-wrapper relative clearfix">
                    <!-- Logo ( * your text or image into link tag *) -->
                    <div class="nav-logo-wrap local-scroll">
                        <a href="#top" class="logo">
                            <!--  <img src="images/logo-white.png" alt="" />  -->
                             Knollenberg Foundation
                        </a>
                    </div>
                    <div class="mobile-nav">
                        <i class="fa fa-bars"></i>
                    </div>
                    <!-- Main Menu  The tabs at the top should be: Home  About  Projects   Contact   News-->
                    <div class="inner-nav desktop-nav">
                        <ul class="clearlist scroll-nav local-scroll">
                            <li class="active"><a href="#home"><?php echo($lang['menu_home']); ?></a></li>
                            <li><a href="#about"><?php echo($lang['menu_about']); ?></a></li>
                            <li><a href="#portfolio"><?php echo($lang['menu_projects']); ?></a></li><!-- portfolio -->
                            <li><a href="#contact"><?php echo($lang['menu_contacts']); ?></a></li>
                            <li><a href="#news"><?php echo($lang['menu_news']); ?></a></li>
							<li><a id='lang1' href='?c=lang&m=english'> <?php echo($lang['menu_english']); ?> </a></li>
        					<li><a id='lang2' href='?c=lang&m=french'> <?php echo($lang['menu_french']); ?> </a></li>
                            <!-- <li><a href="#services">Services</a></li> -->
                            <!--  <li><a href="intro.html">All Demos</a></li>                           -->
                            
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navigation panel -->
            
            
            <!-- About Section -->
            <section class="page-section" id="about">
                <div class="container relative">
                    
                    <h2 class="section-title font-alt align-left mb-70 mb-sm-40">
                       <?php echo($lang['about_title']); ?>
                       
                    </h2>
                    
                     
                    
                    <div class="section-text mb-50 mb-sm-20">
                        <div class="row">
                        
                            <div class="col-md-4">
                                <blockquote>
                                    <p>
                                   <?php echo($lang['about_quote']); ?>
                                    </p>
                                    <footer>
                                        anonymous
                                    </footer>
                                </blockquote>
                            </div>
                            
                            <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                                 <?php echo($lang['about_paragraph_1']); ?>
                            </div>
                            
                            <div class="col-md-4 col-sm-6 mb-sm-50 mb-xs-30">
                                 <?php echo($lang['about_paragraph_2']); ?>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="row">
                        
                        <!-- Team item -->
                        <div class="col-sm-4 mb-xs-30 wow fadeInUp">
                            <div class="team-item">
                                
                                <div class="team-item-image">
                                    
                                    <img src="images/team/team-1.jpg" alt="" />
                                    
                                    <div class="team-item-detail">
                                        
                                        <h4 class="font-alt normal">Hello & Welcome!</h4>
                                        
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit lacus, a&nbsp;iaculis diam. 
                                        </p>
                                        
                                        <div class="team-social-links">
                                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                            <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="team-item-descr font-alt">
                                    
                                    <div class="team-item-name">
                                        Thomas Rhythm 
                                    </div>
                                    
                                    <div class="team-item-role">
                                        <?php echo($lang['about_img_1_subtitle']); ?>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                        <!-- End Team item -->
                        
                        <!-- Team item -->
                        <div class="col-sm-4 mb-xs-30 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item">
                                
                                <div class="team-item-image">
                                    
                                    <img src="images/team/team-2.jpg" alt="" />
                                    
                                    <div class="team-item-detail">
                                        
                                        <h4 class="font-alt normal">Nice to meet!</h4>
                                        
                                        <p>
                                            Curabitur augue, nec finibus mauris pretium eu. Duis placerat ex gravida nibh tristique porta.
                                        </p>
                                        
                                        <div class="team-social-links">
                                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                            <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="team-item-descr font-alt">
                                    
                                    <div class="team-item-name">
                                        Marta Laning
                                    </div>
                                    
                                    <div class="team-item-role">
                                        <?php echo($lang['about_img_2_subtitle']); ?>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                        <!-- End Team item -->
                        
                        <!-- Team item -->
                        <div class="col-sm-4 mb-xs-30 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="team-item">
                                
                                <div class="team-item-image">
                                    
                                    <img src="images/team/team-3.jpg" alt="" />
                                    
                                    <div class="team-item-detail">
                                        
                                        <h4 class="font-alt normal">Whats Up!</h4>
                                        
                                        <p>
                                            Adipiscing elit curabitur eu&nbsp;adipiscing lacus eu&nbsp;adipiscing lacus, a&nbsp;iaculis diam. 
                                        </p>
                                        
                                        <div class="team-social-links">
                                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                            <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="team-item-descr font-alt">
                                    
                                    <div class="team-item-name">
                                        Steve ANDERS
                                    </div>
                                    
                                    <div class="team-item-role">
                                       <?php echo($lang['about_img_3_subtitle']); ?>
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                        <!-- End Team item -->
                        
                    </div>
                    
                    
                </div>
            </section>
            <!-- End About Section -->
            
            <!-- Divider -->
            <hr class="mt-0 mb-0 "/>
            <!-- End Divider -->
            
            <!-- Services Section -->
            <!-- removed -->
            <!-- End Services Section -->
            
            
            <!-- Call Action Section  
            data-background="images/full-width-images/section-bg-2.jpg">
            -->
            <!-- remove -->
           
            <section class="page-section pt-0 pb-0 banner-section bg-dark" style="background-color:#222;">
                <div class="container relative">
                    
                    <div class="row">
                        
                        <div class="col-sm-6">
                            
                            <div class="mt-140 mt-lg-80 mb-140 mb-lg-80">
                                <div class="banner-content">
                                    <h3 class="banner-heading font-alt"> <?php echo($lang['director_message_title']); ?></h3>
                                    <div class="banner-decription">
                                        <?php echo($lang['director_message_text']); ?>
                                        
                                    </div>
                                    <div class="local-scroll">
                                        <a href="#contact" class="btn btn-mod btn-w btn-medium btn-round"><?php echo($lang['director_message_button']); ?></a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="col-sm-6 banner-image wow fadeInUp">
                            <img src="images/earth-soil-creep-moon-lunar-surface-87009.jpeg" alt="" />
                        </div>
                        
                    </div>
                    
                </div>
            </section>
           
            <!-- End Call Action Section -->
            
            
            <!-- Portfolio 'Projects' Section -->
            <section class="page-section pb-0" id="portfolio">
                <div class="relative">
                    
                    <h2 class="section-title font-alt mb-70 mb-sm-40">
                          <?php echo($lang['projects_title']); ?>
                    </h2>
                    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                
                                <div class="section-text align-center mb-70 mb-xs-40">
                                    <h4><?php echo($lang['projects_subtitle_1']); ?></h4>
                                    <?php echo($lang['projects_paragraph_1']); ?>
                                    
                                   
                                </div>
                                <div class="section-text align-center mb-70 mb-xs-40">
                                    <h4><?php echo($lang['projects_subtitle_2']); ?></h4>
                                    <?php echo($lang['projects_paragraph_2']); ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <!-- Works Filter -->                    
                    <div class="works-filter font-alt align-center">
                        <a href="#" class="filter active" data-filter="*"> <?php echo($lang['projects_img_nav_1']); ?></a>
                        <a href="#branding" class="filter" data-filter=".branding"><?php echo($lang['projects_img_nav_2']); ?></a>
                        <a href="#design" class="filter" data-filter=".design"><?php echo($lang['projects_img_nav_3']); ?></a>
                        <!--<a href="#photography" class="filter" data-filter=".photography">Present</a> -->
                    </div>                    
                    <!-- End Works Filter -->
                    
                    <!-- Works Grid -->
                    <ul class="works-grid work-grid-3 work-grid-gut clearfix font-alt hover-white hide-titles" id="work-grid">
                        
                        <!-- Work Item (Lightbox) -->
                        <li class="work-item mix branding">
                            <a href="images/portfolio/img1.png" class="work-lightbox-link mfp-image">
                                <div class="work-img">
                                    <img src="images/portfolio/img1.png" alt="Work" />
                                </div>
                                <div class="work-intro">
                                    <h3 class="work-title"><?php echo($lang['projects_img1_title']); ?></h3>
                                    <div class="work-descr">
                                        <?php echo($lang['projects_img1_description']); ?>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- End Work Item -->
                        
                        <!-- Work Item (External Page) -->
                        <li class="work-item mix branding ">
                           <!-- <a href="portfolio-single-1.html" class="work-ext-link"> -->
                            <a href="images/portfolio/img2.PNG" class="work-lightbox-link mfp-image">
                                <div class="work-img">
                                    <img class="work-img" src="images/portfolio/img2.PNG" alt="Work" />
                                </div>
                                <div class="work-intro">
                                    <h3 class="work-title"><?php echo($lang['projects_img2_title']); ?></h3>
                                    <div class="work-descr">
                                        <?php echo($lang['projects_img2_description']); ?>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- End Work Item -->
                        
                        <!-- Work Item (External Page) -->
                        <li class="work-item mix branding">
                            <!-- <a href="portfolio-single-1.html" class="work-ext-link"> -->
                                  <a href="images/portfolio/img3.PNG" class="work-lightbox-link mfp-image">
                                <div class="work-img">
                                    <img class="work-img" src="images/portfolio/img3.PNG" alt="Work" />
                                </div>
                                <div class="work-intro">
                                    <h3 class="work-title"><?php echo($lang['projects_img3_title']); ?></h3>
                                    <div class="work-descr">
                                          <?php echo($lang['projects_img3_description']); ?>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- End Work Item -->
                        
                        <!-- Work Item (External Page) -->
                        <li class="work-item mix design design">
                            <a href="portfolio-single-1.html" class="work-ext-link">
                                <div class="work-img">
                                    <img class="work-img" src="images/portfolio/projects-4.jpg" alt="Work" />
                                </div>
                                <div class="work-intro">
                                    <h3 class="work-title">Space</h3>
                                    <div class="work-descr">
                                        External Page
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- End Work Item -->
                        
                        <!-- Work Item (External Page) -->
                        <li class="work-item mix design">
                            <a href="portfolio-single-1.html" class="work-ext-link">
                                <div class="work-img">
                                    <img class="work-img" src="images/portfolio/projects-5.jpg" alt="Work" />
                                </div>
                                <div class="work-intro">
                                    <h3 class="work-title">Model</h3>
                                    <div class="work-descr">
                                        External Page
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- End Work Item -->
                        
                        <!-- Work Item (Lightbox) -->
                        <li class="work-item mix design ">
                            <a href="images/portfolio/full-project-3.jpg" class="work-lightbox-link mfp-image">
                                <div class="work-img">
                                    <img src="images/portfolio/projects-6.jpg" alt="Work" />
                                </div>
                                <div class="work-intro">
                                    <h3 class="work-title">Young Man</h3>
                                    <div class="work-descr">
                                        Lightbox
                                    </div>
                                </div>
                            </a>
                        </li>
                        <!-- End Work Item -->
                        
                    </ul>
                    <!-- End Works Grid -->
                    
                </div>
            </section>
            <!-- End Portfolio Section -->
            
            
            <!-- Call Action Section  -->
                <!-- removed -->
            <!--  End Call Action Section -->
            
            
            <!-- Features Section -->
            <!-- removed -->
            <!-- End Features Section -->
            
            
            <!-- Testimonials Section  
            <!-- removed -->
            <!-- End Testimonials Section -->
            
            
            <!-- Blog Section -->
            <section class="page-section" id="news">
                <div class="container relative">
                    
                    <h2 class="section-title font-alt align-left mb-70 mb-sm-40">
                        <?php echo($lang['news_title']); ?> 
                        
                        <a href="blog-classic-sidebar-right.html" class="section-more right"> <?php echo($lang['news_blog_link']); ?><i class="fa fa-angle-right"></i></a>
                        
                    </h2>
                    <h4 class="font-alt">Three winners from Laval</h4>
                    
                    <div class="row multi-columns-row">
                        
                        <!-- Post Item -->
                        <div class="col-sm-6 col-md-4 col-lg-4 mb-md-50 wow fadeIn" data-wow-delay="0.1s" data-wow-duration="2s">
                            
                            <div class="post-prev-img">
                                <a href="blog-single-sidebar-right.html"><img src="images/alicia.jpg" alt="" /></a>
                                 
                            </div>
                            
                            <div class="post-prev-title font-alt">
                                <a href=""><?php echo($lang['news_img_1_title']); ?></a>
                            </div>
                            
                            <div class="post-prev-info font-alt">
                                <a href=""><?php echo($lang['news_img_1_subtitle']); ?></a>  
                            </div>
                            
                            <div class="post-prev-text">
                                <?php echo($lang['news_img_1_paragraph']); ?>
                            </div>
                            
                            <div class="post-prev-more">
                                <a href="" class="btn btn-mod btn-gray btn-round"><?php echo($lang['common_read_more']); ?><i class="fa fa-angle-right"></i></a>
                            </div>
                            
                        </div>
                        <!-- End Post Item -->
                        
                        <!-- Post Item -->
                        <div class="col-sm-6 col-md-4 col-lg-4 mb-md-50 wow fadeIn" data-wow-delay="0.2s" data-wow-duration="2s">
                            
                            <div class="post-prev-img">
                                <a href="blog-single-sidebar-right.html"><img src="images/blog/post-prev-2.jpg" alt="" /></a>
                            </div>
                            
                            <div class="post-prev-title font-alt">
                                <a href=""><?php echo($lang['news_img_2_title']); ?></a>
                            </div>
                            
                            <div class="post-prev-info font-alt">
                                <a href=""><?php echo($lang['news_img_2_subtitle']); ?></a>
                            </div>
                            
                            <div class="post-prev-text">
                               <?php echo($lang['news_img_2_paragraph']); ?> 
                            </div>
                            
                            <div class="post-prev-more">
                                <a href="" class="btn btn-mod btn-gray btn-round"><?php echo($lang['common_read_more']); ?><i class="fa fa-angle-right"></i></a>
                            </div>
                            
                        </div>
                        <!-- End Post Item -->
                        
                        <!-- Post Item -->
                        <div class="col-sm-6 col-md-4 col-lg-4 mb-md-50 wow fadeIn" data-wow-delay="0.3s" data-wow-duration="2s">
                            
                            <div class="post-prev-img">
                                <a href="blog-single-sidebar-right.html"><img src="images/blog/post-prev-3.jpg" alt="" /></a>
                            </div>
                            
                            <div class="post-prev-title font-alt">
                                <a href=""><?php echo($lang['news_img_3_title']); ?></a>
                            </div>
                            
                            <div class="post-prev-info font-alt">
                                <a href=""><?php echo($lang['news_img_3_subtitle']); ?></a>
                            </div>
                            
                            <div class="post-prev-text">
                               <?php echo($lang['news_img_3_paragraph']); ?> 
                            </div>
                            
                            <div class="post-prev-more">
                                <a href="" class="btn btn-mod btn-gray btn-round"><?php echo($lang['common_read_more']); ?><i class="fa fa-angle-right"></i></a>
                            </div>
                            
                        </div>
                        <!-- End Post Item -->
                        
                    </div>
                    
                </div>
            </section>
            <!-- End Blog Section -->
            
            
            <!-- Newsletter Section -->
            <section class="small-section bg-gray-lighter">
                <div class="container relative">
                    
                    <form class="form align-center" id="mailchimp">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                
                                <div class="newsletter-label font-alt">
                                    <?php echo($lang['newsletter_signup_title']); ?>
                                </div>
                                
                                <div class="mb-20">
                                    <input placeholder=" <?php echo($lang['newsletter_signup_placeholder']); ?>" class="newsletter-field form-control input-md round mb-xs-10" type="email" pattern=".{5,100}" required/>
                                    
                                    <button type="submit" class="btn btn-mod btn-medium btn-round mb-xs-10">
                                         <?php echo($lang['newsletter_signup_submit']); ?>
                                    </button>
                                </div>
                                
                                <div class="form-tip">
                                    <i class="fa fa-info-circle"></i><?php echo($lang['newsletter_signup_info']); ?>
                                </div>
                                
                                <div id="subscribe-result"></div>
                                
                            </div>
                        </div>
                    </form>
                    
                </div>
            </section>
            <!-- End Newsletter Section -->
            
            
            <!-- Contact Section -->
            <section class="page-section" id="contact">
                <div class="container relative">
                    
                    <h2 class="section-title font-alt mb-70 mb-sm-40">
                        <?php echo($lang['contact_section_title']); ?>
                    </h2>
                    
                    <div class="row mb-60 mb-xs-40">
                        
                        <div class="col-md-8 col-md-offset-2">
                            <div class="row">
                                
                                <!-- Phone -->
                                <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                                    <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                            <?php echo($lang['contact_label_phone']); ?>
                                        </div>
                                        <div class="ci-text">
                                            (502) 365-7823
                                        </div>
                                    </div>
                                </div>
                                <!-- End Phone -->
                                
                                <!-- Address -->
                                <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                                    <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                             <?php echo($lang['contact_label_address']); ?>
                                        </div>
                                        <div class="ci-text">
                                            601 Breckenridge Lane Louisville, Kentucky  40207
                                        </div>
                                    </div>
                                </div>
                                <!-- End Address -->
                                
                                <!-- Email -->
                                <div class="col-sm-6 col-lg-4 pt-20 pb-20 pb-xs-0">
                                    <div class="contact-item">
                                        <div class="ci-icon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="ci-title font-alt">
                                            <?php echo($lang['contact_label_email']); ?>
                                        </div>
                                        <div class="ci-text">
                                            <a href="mailto:support@bestlooker.pro">lraymond@louisville.edu</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Email -->
                                
                            </div>
                        </div>
                        
                    </div>
                    
                    <!-- Contact Form -->                            
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                           
                            
                            <form class="form contact-form" id="contact_form">
                                <div class="clearfix">
                                    
                                    <div class="cf-left-col">
                                        
                                        <!-- Name -->
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="input-md round form-control" placeholder=" <?php echo($lang['contact_placeholder_name']); ?>" pattern=".{3,100}" required>
                                        </div>
                                        
                                        <!-- Email -->
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="input-md round form-control" placeholder="<?php echo($lang['contact_placeholder_email']); ?>" pattern=".{5,100}" required>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="cf-right-col">
                                        
                                        <!-- Message -->
                                        <div class="form-group">                                            
                                            <textarea name="message" id="message" class="input-md round form-control" style="height: 84px;" placeholder="<?php echo($lang['contact_placeholder_message']); ?>"></textarea>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                                <div class="clearfix">
                                    
                                    <div class="cf-left-col">
                                        
                                        <!-- Inform Tip -->                                        
                                        <div class="form-tip pt-20">
                                            <i class="fa fa-info-circle"></i><?php echo($lang['common_required_fields']); ?>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="cf-right-col">
                                        
                                        <!-- Send Button -->
                                        <div class="align-right pt-10">
                                            <button class="submit_btn btn btn-mod btn-medium btn-round" id="submit_btn"><?php echo($lang['contact_button_submit']); ?></button>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                                
                                
                                <div id="result"></div>
                            </form>
                            <div>
                                 <?php
                                     if ($_POST['message']) {
                                       $message = $_POST['message'];
                                       $email = $_POST['email'];
                                       $name = $_POST['name'];
                                       $headers = "From: ".$name."<".$email.">";
            
                                       mail('forteworks@gmail.com', "Contact from Knollenberg Foundation Visitor", $message, $headers);
            
                                       echo "Thanks for contacting us!<br /><br />";
                                     }
                                   ?>
                            </div>
                            
                        </div>
                    </div>
                    <!-- End Contact Form -->
                    
                </div>
            </section>
            <!-- End Contact Section -->
            
            
            <!-- Google Map -->
            <div class="google-map">
                
                <div data-address="Belt Parkway, Queens, NY, United States" id="map-canvas"></div>
                
                <div class="map-section">
                    
                    <div class="map-toggle">
                        <div class="mt-icon">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="mt-text font-alt">
                            <div class="mt-open">Open the map <i class="fa fa-angle-down"></i></div>
                            <div class="mt-close">Close the map <i class="fa fa-angle-up"></i></div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <!-- End Google Map -->
            
            
            <!-- Foter -->
            <footer class="page-section bg-gray-lighter footer pb-60">
                <div class="container">
                    
                    <!-- Footer Logo -->
                    <div class="local-scroll mb-30 wow fadeInUp" data-wow-duration="1.5s">
                        <a href="#top"><img src="images/logo-footer.png" width="78" height="36" alt="" /></a>
                    </div>
                    <!-- End Footer Logo -->
                    
                    <!-- Social Links -->
                    <div class="footer-social-links mb-110 mb-xs-60">
                        <a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#" title="Behance" target="_blank"><i class="fa fa-behance"></i></a>
                        <a href="#" title="LinkedIn+" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a href="#" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
                    </div>
                    <!-- End Social Links -->  
                    
                    <!-- Footer Text -->
                    <div class="footer-text">
                        
                        <!-- Copyright -->
                        <div class="footer-copy font-alt">
                            <a href="http://themeforest.net/user/theme-guru/portfolio" target="_blank">&copy; Rhythm 2017</a>.
                        </div>
                        <!-- End Copyright -->
                        
                        <div class="footer-made">
                            Made with love for great people.
                        </div>
                        
                    </div>
                    <!-- End Footer Text --> 
                    
                 </div>
                 
                 
                 <!-- Top Link -->
                 <div class="local-scroll">
                     <a href="#top" class="link-to-top"><i class="fa fa-caret-up"></i></a>
                 </div>
                 <!-- End Top Link -->
                 
            </footer>
            <!-- End Foter -->
        
        
        </div>
        <!-- End Page Wrap -->
        
        
        <!-- JS -->
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>        
        <script type="text/javascript" src="js/SmoothScroll.js"></script>
        <script type="text/javascript" src="js/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="js/jquery.localScroll.min.js"></script>
        <script type="text/javascript" src="js/jquery.viewport.mini.js"></script>
        <script type="text/javascript" src="js/jquery.countTo.js"></script>
        <script type="text/javascript" src="js/jquery.appear.js"></script>
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
        <script type="text/javascript" src="js/jquery.fitvids.js"></script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="js/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>
        <!-- Replace test API Key "AIzaSyAZsDkJFLS0b59q7cmW0EprwfcfUA8d9dg" with your own one below 
        **** You can get API Key here - https://developers.google.com/maps/documentation/javascript/get-api-key -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZsDkJFLS0b59q7cmW0EprwfcfUA8d9dg"></script>
        <script type="text/javascript" src="js/gmap3.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="js/jquery.simple-text-rotator.min.js"></script>
        <script type="text/javascript" src="js/all.js"></script>
        <script type="text/javascript" src="js/contact-form.js"></script>
        <script type="text/javascript" src="js/jquery.ajaxchimp.min.js"></script>       
        <!--[if lt IE 10]><script type="text/javascript" src="js/placeholder.js"></script><![endif]-->
        
    </body>
</html>
