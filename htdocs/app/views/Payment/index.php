<!DOCTYPE html>
<html>
<head>
	<title></title>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <style>
        select option{
            text-align:center;
        }
    </style>
</head>
<body>
	<div class="container">
		<h2>Payment Options</h2>
        <?php
        if(count ($data) < 1){
            echo 'You currently have no payment options<br><br>';
        }
        ?>
        <div>
        <table class="table table-striped"  style="width:100%" cellpadding="10px" cellspacing="10px">
            <thead class="thead-dark">
            <tr>
                <th>Card Type</th>
                <th>Card Number</th>
                <th>Expires</th>
                <th></th>
            </tr>
            </thead>
            <?php
            // Create a table row for each
            foreach($data as $row) {
                ?>
                <tr>
                    <td><?php echo ucwords(strtolower(str_replace('_', ' ', $row['card_type'])));?></td>
                    <td><?php echo 'ending in ' . substr($row['card_number'], -4);?></td>
                    <td><?php echo $row['exp_date'];?></td>
                    <!--<td><?php echo $row['announcement_date'];?></td>-->
                    <td width="11%">
                        <a href="../PaymentInfo/removePayment?id=<?=$row['pay_option_id'];?>" onclick="return confirm('Are you sure you want to delete this payment option ending in? <?php echo substr($row['card_number'],-4); ?>')"  class="btn btn-danger fa fa-times"></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Add a Card</button>

            <a href="../Profile/Details" class="btn btn-dark" role="button">Back to My Profile</a>
    </div>

	</div>

    <br>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top: 150px">
                <div class="modal-header text-center">
                    <h3 class="modal-title w-100">Credit Card Details</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body" style="margin-left: 35px; margin-right: 35px;">
                    <form action='' method="post">

                        <div class="form-group">
                            <select class="form-control" name="card_type">
                                <option value="American Express">American Express</option>
                                <option value="visa">Visa</option>
                                <option value="mastercard">Mastercard</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <div>
                                <input type="text" placeholder="Card Name" name="card_name" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <input type="text" placeholder="Card Number" name="card_number" class="form-control"/>
                            </div>
                        </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <select name="month" class="form-control">
                                                <option value="" disabled selected hidden>Month</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <select name="year" class="form-control">
                                                <option value="" disabled selected hidden>Year</option>
                                                <option value="19">2019</option>
                                                <option value="20">2020</option>
                                                <option value="21">2021</option>
                                                <option value="22">2022</option>
                                                <option value="23">2023</option>
                                                <option value="24">2024</option>
                                                <option value="25">2025</option>
                                                <option value="26">2026</option>
                                                <option value="27">2027</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                </div>

                <div class="modal-footer" style="background-color:#212529; ">
                    <input id="addcard" type="submit" name="action" class="btn btn-basic mr-auto" value="Add Card" style="margin-left: 140px">
                    </form>
                    <div>

                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal" style="margin-right: 135px">Cancel</button>
                    </div>
                </div>
            </div>

        </div>
    </div>



<div>
    
</div>

</body>
</html>

