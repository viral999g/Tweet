<?php
session_start();
require_once ('lib/twitteroauth/twitteroauth.php');
require_once ('config.php');

// tf access tokens are not available,clear session and redirect to login page.
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
  header('Location: clearsession.php');
}

// get user access tokens from the session.
$access_token = $_SESSION['access_token'];

// create a TwitterOauth object with tokens.
$twitteroauth = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

// get the current user's info
$user_info = $twitteroauth -> get('account/verify_credentials');

if (isset($user_info -> errors) && $user_info -> errors[0] -> message == 'Rate limit exceeded') {
  //echo "<script>alert('Twetter auth Error: Rate limit exceeded'); </script>Go to Login Page click <a href='clearsession.php'>here</a>";
  //exit ;
}

//get the followers list
$friend_list = $twitteroauth -> get("https://api.twitter.com/1.1/followers/list.json?cursor=-1&screen_name=" . $user_info -> screen_name . "&skip_status=true&include_user_entities=false&count=". $user_info->followers_count);
?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RtCamp Twitter Challenge</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
        <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="#" class="logo" id="home">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span id="home" class="logo-mini"><b><i class="fa fa-twitter"></i></b></span>
        <!-- logo for regular state and mobile devices -->
        <span id="home" class="logo-lg"><b>Twitter</b>Home</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
            
            <!-- Tasks Menu -->
            <li class="dropdown tasks-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-download"></i>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <!-- Inner menu: contains the tasks -->
                  <ul class="menu">
                    <li><!-- Task item -->
                      <a href="#" id="export-csv">
                        <!-- Task title and progress text -->
                        <h3>
                          <i class="fa fa-file-excel-o"></i>&nbsp&nbsp&nbspcsv format
                          
                        </h3>
                        <!-- The progress bar -->
                      </a>


                    </li>

                    <li><!-- Task item -->
                      <a href="#" id="export-xls">
                        <!-- Task title and progress text -->
                        <h3>
                          <i class="fa fa-file-excel-o"></i>&nbsp&nbsp&nbspxls format
                          
                        </h3>
                        <!-- The progress bar -->
                      </a>

                      
                    </li>

                    <li><!-- Task item -->
                      <a href="#" style="pointer-events: none;">
                        <!-- Task title and progress text -->
                        <h3>
                          <i class="fa fa-google"></i>&nbsp&nbsp&nbspGoogle spread-sheet <span class="text-light-blue">(Under construction)</span>
                          
                        </h3>
                        <!-- The progress bar -->
                      </a>

                      
                    </li>

                    <li><!-- Task item -->
                      <a href="#" style="pointer-events: none">
                        <!-- Task title and progress text -->
                        <h3>
                          <i class="fa fa-file-pdf-o"></i>&nbsp&nbsp&nbsppdf <span class="text-light-blue">(Under construction)</span>
                          
                        </h3>
                        <!-- The progress bar -->
                      </a>

                      
                    </li>

                    <li><!-- Task item -->
                      <a href="#" style="pointer-events: none">
                        <!-- Task title and progress text -->
                        <h3>
                          <i class="fa fa-file-code-o"></i>&nbsp&nbsp&nbsxml <span class="text-light-blue">(Under construction)</span>
                          
                        </h3>
                        <!-- The progress bar -->
                      </a>

                      
                    </li>

                    <li><!-- Task item -->
                      <a href="#" style="pointer-events: none">
                        <!-- Task title and progress text -->
                        <h3>
                          <i class="fa fa-file-pdf-o"></i>&nbsp&nbsp&nbsjson <span class="text-light-blue">(Under construction)</span>
                          
                        </h3>
                        <!-- The progress bar -->
                      </a>

                      
                    </li>
                                  <li class="footer">
                <a href="#">Tweeter...</a>
              </li>

                    <!-- end task item -->
                  </ul>
                </li>

              </ul>
            </li>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="<?php echo $user_info->profile_image_url?>" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?php echo $user_info->screen_name?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="<?php echo str_replace("_normal", "",$user_info->profile_image_url);?>" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $user_info->name?>
                    <small><?php echo $user_info->screen_name?></small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers <?php echo $user_info->followers_count;?></a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Following <?php echo $user_info->friends_count;?></a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Tweets <?php echo $user_info->statuses_count;?></a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a id="my-tweets" href="#" class="btn btn-default btn-flat">My Tweets</a>
                  </div>
                  <div class="pull-right">
                    <a href="clearsession.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php echo $user_info->profile_image_url;?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $user_info->name;?></p>
            <!-- Status -->
            <a href="#"><i class="fa fa-user text-success"></i> <?php echo $user_info->screen_name?></a>
          </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..." id="filter" autocomplete="off">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <ul class="sidebar-menu" data-widget="tree">

          <ul class="tweet-user-list sidebar-menu" style="height:900px;overflow: auto;overflow-x: hidden;">
            <!-- Optionally, you can add icons to the links -->
            <?php 
            if($friend_list->users)
            {
              foreach ($friend_list->users as $friends) { ?>
              <li>
                <a href="javascript:void(0)" id="<?php echo $friends->screen_name?>" class="followers" >
                  <div class="user-panel">
                    <div class="pull-left image">
                      <img src="<?php echo $friends->profile_image_url?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                      <p><?php echo $friends->name?></p>
                      <p>@<span><?php echo $friends->screen_name?></span></p>

                    </div>
                  </div>
                </a>
              </li>
              <?php }
            }
            ?>
          </ul>
        </ul>
        <!-- Sidebar Menu -->


        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->


      <!-- Main content -->
      <section class="content container-fluid">


        <div class="tweet-thread" style="height: 1050px; width:100%; overflow-y:scroll; margin-bottom: 10px;">
          <div id="loading-overlay">
           <img width="20%" src="images/loading.gif" alt='loading'>
         </div><!--//#loading-overlay-->
         <div class="large-12 columns" id="tweets">
          <script id="tweet-template" type="text/x-handlebars-template">
           {{#if this}}
           {{#data}}

           <div class="radius panel" style="margin-top: 10px;">
            <div class="tweet bubble-left" style="margin: 10px;" id="{{id_str}}">
              <img class = "img-circle" src="{{user.profile_image_url}}" alt="profile image">
              <label style="margin:10px" id="">{{user.name}}<span><a href="http://www.twitter.com/{{user.screen_name}}" target="_blank">@{{user.screen_name}}</a></span></label>
              <label class="tweet-timestamp" id="">{{getDateTime created_at}}</label>
              <p class="tweet-text lead" style="margin-top: 10px">{{twityfy text}}</p>
              <p class="links">
                {{#if_eq user.screen_name compare="<?php echo $user_info->screen_name?>"}}
                <a href="javascript:void(0)" class="delete-tweet" title="Delete this tweet">Delete</a>
                {{else}}
                {{#if retweeted}}
                <a  href="javascript:void(0)" class="retweeted" name="{{id_str}}" title="Undo retweet">Retweeted</a>
                {{else}}
                <a  href="javascript:void(0)" class="retweet" title="Retweet">Retweet</a>
                {{/if}}
                {{/if_eq}}

                {{#if favorited}}
                <a style="margin-left : 10px" href="javascript:void(0)" class="favorited" title="Undo favorite">Favorited</a>
                {{else}}
                <a style="margin-left : 10px" href="javascript:void(0)" class="favorite" title="Favorite">Favorite</a>
                {{/if}}
              </p>
            </div>
          </div>
          {{/data}}
          {{else}}
          <div> No Tweets yet</div>
          {{/if}}
        </script>
      </div>
    </div>





  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->




<div class="modal modal-info fade" id="retweet-modal" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Retweet?</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to retweet this?&hellip;</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Cancel</button>
          <button type="button" id="btn-retweet" class="btn btn-outline" style="margin-right: 20px">Retweet</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

  <!--modal for retweeting-->
  <div class="modal modal-info fade" id="delete-modal" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Delete</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete this tweet?&hellip;</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Cancel</button>
            <button type="button" id="btn-delete" class="btn btn-outline" style="margin-right: 20px">Delete</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div> 

    <!-- Control Sidebar -->
    
    <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.8.1.min.js"><\/script>')</script>
<script src="js/foundation.js"></script>
<script type="text/javascript" src="lib/handlebars.js"></script>
<script type="text/javascript" src="lib/moment.js"></script>
<script type="text/javascript" src="lib/bootstrap-modal.js"></script>
<script type="text/javascript" src="js/handlebar-helper.js"></script>
<script type="text/javascript" src="js/Tweet.js"></script>
<script type="text/javascript" src="js/TweetUI.js"></script>     
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/strings.js"></script>
<script type="text/javascript" src="js/foundation.dropdown.js"></script>

<script>
  $(document).foundation();
  var doc = document.documentElement;
  doc.setAttribute('data-useragent', navigator.userAgent);
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     <style>
       body::-webkit-scrollbar {
        width: 0.1em;
      }

      body::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
      }

      body::-webkit-scrollbar-thumb {
        background-color: darkgrey;
        outline: 1px solid slategrey;
      }

      ul::-webkit-scrollbar {
        width: 0.1em;
      }

      ul::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
      }

      ul::-webkit-scrollbar-thumb {
        background-color: darkgrey;
        outline: 1px solid slategrey;
      }

      .tweet-thread::-webkit-scrollbar {
        width: 0em;
      }

      .tweet-thread::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
      }

      .tweet-thread::-webkit-scrollbar-thumb {
        background-color: darkgrey;
        outline: 1px solid slategrey;
      }
    </style>
  </body>
  </html>
