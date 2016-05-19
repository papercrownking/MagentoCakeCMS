<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<title>The Folio Society | CMS</title>
		<link rel="stylesheet" type="text/css" href="/cmsv3/css/reset.css" media="all" />
		<link rel="stylesheet" type="text/css" href="/cmsv3/css/boxes.css" media="all" />
		<link rel="stylesheet" type="text/css" href="/cmsv3/css/custom.css" media="all" />
		<link rel="stylesheet" type="text/css" href="/cmsv3/css/boxes.css" media="all" />
		<link rel="stylesheet" type="text/css" href="/cmsv3/css/menu.css" media="screen, projection" />
		<link rel="stylesheet" type="text/css" href="/cmsv3/css/general_20121212_1.css" />
		<link rel="stylesheet" type="text/css" href="/cmsv3/css/custom-theme/jquery-ui-1.9.2.custom.min.css" />
		<link rel="stylesheet" type="text/css" href="/cmsv3/js/modal/jquery.fancybox.css" />
    <link rel="stylesheet" type="text/css" href="/cmsv3/uploadify/uploadify.css">
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
		<script type="text/javascript" src="/cmsv3/js/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="/cmsv3/js/jquery.tablesorter.js"></script>
		<script type="text/javascript" src="/cmsv3/js/jquery-ui-1.9.2.custom.js"></script>
		<script type="text/javascript" src="/cmsv3/js/modal/jquery.fancybox.pack.js"></script>
		<script type="text/javascript" src="/cmsv3/js/jquery.autocomplete.js"></script>
		<script type="text/javascript" src="/cmsv3/js/jquery.filedrop.js"></script>
    <script src="/cmsv3/uploadify/jquery.uploadify.js" type="text/javascript"></script>
		<script type="text/javascript" src="/cmsv3/js/cms.js"></script>
	</head>
	<body>
		<div class="wrapper">
      <p class="demo-notice">This is a test environment, any changes here will not be reflected on foliosociety.com</p>
			<div class="header">
				<div class="header-top">
					<img src="/cmsv3/images/fs-logo.png" alt="Folio CMS logo" class="logo" />
					<div class="header-right">						
						<p class="super"><a href="/cmsv3/users/logout" Class="link-logout">Log Out</a></p>
						<p class="welcome"><b>Welcome <?php echo $_SESSION['Auth']['User']['first_name']; ?></b> | </p>
					</div>
				</div>
				<div class="clear"></div>
				<div class="nav-bar">
					<ul id="nav">
						<li id="dashboard-level0" class="level0"><a href="/cmsv3/dashboard/index"><span>Dashboard</span></a></li>
						<li id="members-level0" class="parent level0">
							<a href=""><span>Customer Data</span></a>
							<ul>
								<li class="level1"><a href="/cmsv3/members/index"><span>Customers</span></a></li>
								<li class="level1"><a href="/cmsv3/baskets/index"><span>Baskets</span></a></li>
								<li class="level1"><a href="/cmsv3/reviews/index"><span>Reviews</span></a></li>
								<li class="level1"><a href="/cmsv3/feedbacks/index"><span>Unsubscribe Feedback</span></a></li>
							</ul>
						</li>
						<li id="sales-level0" class="level0"><a href="/cmsv3/orders/index"><span>Sales</span></a></li>
						<li id="catalog-level0" class="parent level0">
							<a href=""><span>Catalog</span></a>
							<ul>
								<li class="level1"><a href="/cmsv3/categories/index"><span>Categories</span></a></li>
								<li class="level1"><a href="/cmsv3/offertypecodes/index"><span>OfferTypeCodes</span></a></li>
								<li class="level1"><a href="/cmsv3/offers/index"><span>Offers</span></a></li>
								<li class="level1"><a href=""><span>Books</span></a></li>
								<li class="level1"><a href=""><span>Illustrations</span></a></li>
							</ul>
						</li>
						<li class="parent level0">
							<a href=""><span>Campaigns</span></a>
							<ul>
								<li class="level1"><a href=""><span>Member Statuses</span></a></li>
								<li class="level1"><a href=""><span>Email Campaigns</span></a></li>
								<li class="level1"><a href=""><span>eCRM</span></a></li>
								<li class="level1"><a href=""><span>URLs</span></a></li>
								<li class="level1"><a href=""><span>Discount Codes</span></a></li>
							</ul>						
						</li>
						<li class="parent level0">
							<a href=""><span>Site Templates</span></a>
							<ul>
								<li class="level1"><a href=""><span>Editorials</span></a></li>
								<li class="level1"><a href=""><span>Pages</span></a></li>
								<li class="level1"><a href=""><span>Authors</span></a></li>
								<li class="level1"><a href=""><span>Videos</span></a></li>
								<li class="level1"><a href=""><span>Quizzes</span></a></li>
							</ul>	
						</li>
						<li class="parent level0">
							<a href=""><span>News</span></a>
							<ul>
								<li class="level1"><a href=""><span>News</span></a></li>
								<li class="level1"><a href=""><span>Newsletter</span></a></li>
							</ul>
						</li>
						<li id="reports-level0" class="parent level0">
							<a href=""><span>Reports</span></a>
							<ul>
								<li class="level1"><a href="/cmsv3/reports/memberstatus"><span>MemberStatus Report</span></a></li>
								<li class="level1"><a href=""><span>Site Search Report</span></a></li>
								<li class="level1"><a href=""><span>URL Report</span></a></li>
							</ul>
						</li>	
						<li id="system-level0" class="parent level0">
							<a href=""><span>System</span></a>
							<ul>
								<li class="level1"><a href="/cmsv3/users/index"><span>CMS Users</span></a></li>
								<li class="level1"><a href="/cmsv3/memcached/index"><span>Site Cache</span></a></li>
								<li class="level1"><a href="/cmsv3/regions/index"><span>Site Regions</span></a></li>
							</ul>
						</li>						
					</ul>			
				</div>
			</div>
			<div id="product_composite_configure_messages" style="display: none;" >
                		<ul class="messages"><li class="error-msg"></li></ul>
            		</div>
			<div class="middle">
				<?php echo $content_for_layout; ?>
			</div>
			<div class="footer">
				<p class="legality">&copy; <?php echo date('Y'); ?> The Folio Society</p>
			</div>
		</div>
	</body>
  <script>
        $(document).ready(function(){
            // fade out the flash message
            setTimeout("$('.msg-success').appendTo(document.body).animate({opacity:0},800,function(){$('#messages').hide()});",4000);
            setTimeout("$('.msg-error').appendTo(document.body).animate({opacity:0},800,function(){$('#messages').hide()});",4000);
        })
  </script>
</html>
