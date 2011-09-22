<html>
    <head>
    </head>
    <body>
        <p>Hello<?php echo $user['User']['username'];?>, we will have your organization(<?php echo $user['Organization']['name'];?>) up and running in no time, but first we just need you to confirm your user account by clicking the link below:</p>
        <br />
        <p><?php echo $activate_url;?></p>
    </body>
</html>
