<html>
    <head>
        <title>Membership</title>
    </head>

    <body>
        <div class="container">
            <h2>Membership</h2>

                
            <?php

                if(isset($data['user_id']) && $data['user_id'] != '') {
                    echo '<label>Membership ID: </label>' . ' ' . $data["membership_id"];
                    echo '<br><label>Membership User ID: </label>' . ' ' . $data["user_id"];
                    if($data["mem_status"] == 1){
                        echo '<br><label>Membership Status: Subscribed</label>';
                    }
                    echo '<br><label>Membership Begin Date: </label>' . ' ' . $data["begin_date"];
                    echo '<br><label>Membership Expiry Date: </label>' . ' ' . $data["expire_date"];
                }
                else {
                    echo 'No membership';
                    echo '<br><a href="../member/signup" class="btn btn-dark" role="button">Become a Member Now!</a>';
                }
            ?>
        </div>
    </body>
</html>
