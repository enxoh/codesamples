<html>
    <head>
    </head>
    <body>
        <div class="container">

            <form action=" " method="post">
                <h2>Create Subscription</h2>

                <div class="row">
                    <div class="form-group col-xs-1 col-lg-5 ">
                        <label for="code">Payment Option</label>
                        <select name="pay_option_id" class="form-control">
                            <?php
                                foreach($data as $value){
                                    echo ('<option value= "' . $value['pay_option_id'] .  '">' . ucwords(strtolower(str_replace('_', ' ', $value['card_type']))) . ' ending in ' . substr($value['card_number'], -4) . '<br></option>');
                                }
                           ?>
                        </select>
                        
                    </div>
                </div>


                <div>
                    <br>
                    <input type="submit" name="action" class="btn btn-primary" value="Register">
                </div>
            </form>
        </div>
    </body>
</html>
<?php
