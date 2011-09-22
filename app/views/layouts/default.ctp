
<?php echo $this->Html->docType('html5'); ?>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<?php
	    echo $this->Html->meta('keywords');
	    echo $this->Html->meta('description');
        
        echo $this->element('default_styles');
        echo $this->Html->css('app.less?'.time(), 'stylesheet/less');
		echo $this->element('default_scripts');
		
	?>
	<link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
    <style>
        .aaa{
            background-color:#aaa;
        }
        .bbb{
            background-color:#bbb;
        }
        .ccc{
            background-color:#ccc;
        }
        .ddd{
            background-color:#ddd;
        }
        .eee{
            background-color:#eee;
        }
        .fff{
            background-color:#fff;
        }
        .bold{
            font-weight:bold;
        }
        .bolder{
            font-weight:bolder;
        }
        .italic{
            font-decoration:italic;
        }
        .font20{
            font-size:20px;
        }
        .pt5{
            padding-top:5px;
        }
        .pt10{
            padding-top:10px;
        }
        .pb5{
            padding-bottom:5px;
        }
        .pb10{
            padding-bottom:10px;
        }
        .mt5{
            margin-top:5px;
        }
        .mt10{
            margin-top:10px;
        }
        .mb5{
            margin-bottom:5px;
        }
        .mb10{
            margin-bottom:10px;
        }
    </style>
</head>
<body>
    <div>
        <header class="jumbotron subhead" id="overview">
          <div class="inner">
            <div class="container">
            <?php if(isset($organization)):?>
              <h1><?php echo ucwords($organization['name']) . ' '.__('Organization', true);?></h1>
              <p class="lead">
                <?php echo $organization['description'];?>
              </p>
              <?php endif;?>
            </div>
          </div>
        </header>
    </div>
    <?php echo $this->element('topbar');?>
    <?php if($this->Session->check('Auth.User')):?>
        <div class="container">
    <?php else:?>
	    <div class="container">
	<?php endif;?>
	        
                <div class="flash">
		            <?php 
		                
		                
		                echo $this->Session->flash(); 
		                echo $this->Session->flash('auth'); 
                        echo $this->Session->flash('email');
		            ?>
		        </div>
            
		    <!--<div class="page-header">
                <h1><?php echo Inflector::humanize($this->params['controller']);?></h1>
            </div>-->
            <?php echo $this->element('user_tab');?>
		    <section>
		    <?php echo $content_for_layout; ?>
		    </section>
            <div class="footer">
			    Copyright &copy; <?php echo date('Y') . ' ' . __('Clock', true).'&sup2;';?>
		    </div>
        </div>
		
	</div>
</body>
</html>
