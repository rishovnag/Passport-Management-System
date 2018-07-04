	
<head>
<title>PAYMENT</title>
<link rel="icon" href="img/logo.png" type="image" sizes="16x16">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="1.css">
<link rel="stylesheet" href="2.txt">
<link rel="stylesheet" href="font-awesome.min.css">
<style>
/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
header, footer
{
padding: 1em;
color:white;
background-color:#2a1506;
clear:left;
text-align:center;
}

input[type=submit] {
    width: 100%;
    background-color: #4Db0E6;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45b67f;
}

/* Padding - just for asthetics on Bootsnipp.com */
body { margin-top:20px; }

/* CSS for Credit Card Payment form */
.credit-card-box .panel-title {
    display: inline;
    font-weight: bold;
}
.credit-card-box .form-control.error {
    border-color: red;
    outline: 0;
    box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(255,0,0,0.6);
}
.credit-card-box label.error {
  font-weight: bold;
  color: red;
  padding: 2px 8px;
  margin-top: 2px;
}
.credit-card-box .payment-errors {
  font-weight: bold;
  color: red;
  padding: 2px 8px;
  margin-top: 2px;
}
.credit-card-box label {
    display: block;
}
/* The old "center div vertically" hack */
.credit-card-box .display-table {
    display: table;
}
.credit-card-box .display-tr {
    display: table-row;
}
.credit-card-box .display-td {
    display: table-cell;
    vertical-align: middle;
    width: 50%;
}
/* Just looks nicer */
.credit-card-box .panel-heading img {
    min-width: 180px;
}
div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    width: 25%;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {
    width: 100%;
    height: auto;
}

</style>

<script language="javascript" type="text/javascript">

document.getElementById("card").onkeyup = function() {myFunction()};

function myFunction() {
    
	var x = document.getElementById("card");

	if(x.value.length/4==1)
	x.value= x.value += "-";
	if(x.value.length/9==1)
	x.value= x.value += "-";
if(x.value.length/14==1)
	x.value= x.value += "-";
if(x.value.charAt(0)=='4') 
{
	
	document.getElementById("p1").innerHTML = "VISA";

}
if((x.value.charAt(0)+x.value.charAt(1)=='51')||(x.value.charAt(0)+x.value.charAt(1)=='52')||(x.value.charAt(0)+x.value.charAt(1)=='53')||(x.value.charAt(0)+x.value.charAt(1)=='54')||(x.value.charAt(0)+x.value.charAt(1)=='55')) 
{
	
	document.getElementById("p1").innerHTML = "MasterCard";

}
if((x.value.charAt(0)=='6')||(x.value.charAt(0)+x.value.charAt(1)=='56')||(x.value.charAt(0)+x.value.charAt(1)=='57')||(x.value.charAt(0)+x.value.charAt(1)=='58')||(x.value.charAt(0)+x.value.charAt(1)=='50')) 
{
	
	document.getElementById("p1").innerHTML = "Maestro";

}
if((x.value.charAt(0)+x.value.charAt(1)=='60')||(x.value.charAt(0)+x.value.charAt(1)+x.value.charAt(2)+x.value.charAt(3)=='6521') )
{
	
	document.getElementById("p1").innerHTML = "RuPay";

}
}

function myFunction3() {
    
	var x = document.getElementById("ccard");

	if(x.value.length/4==1)
	x.value= x.value += "-";
	if(x.value.length/9==1)
	x.value= x.value += "-";
if(x.value.length/14==1)
	x.value= x.value += "-";
if(x.value.charAt(0)=='4') 
{
	
	document.getElementById("p2").innerHTML = "VISA";

}
if((x.value.charAt(0)+x.value.charAt(1)=='51')||(x.value.charAt(0)+x.value.charAt(1)=='52')||(x.value.charAt(0)+x.value.charAt(1)=='53')||(x.value.charAt(0)+x.value.charAt(1)=='54')||(x.value.charAt(0)+x.value.charAt(1)=='55')) 
{
	
	document.getElementById("p2").innerHTML = "MasterCard";

}
if((x.value.charAt(0)=='6')||(x.value.charAt(0)+x.value.charAt(1)=='56')||(x.value.charAt(0)+x.value.charAt(1)=='57')||(x.value.charAt(0)+x.value.charAt(1)=='58')||(x.value.charAt(0)+x.value.charAt(1)=='50')) 
{
	
	document.getElementById("p2").innerHTML = "Maestro";

}
if((x.value.charAt(0)+x.value.charAt(1)=='60')||(x.value.charAt(0)+x.value.charAt(1)+x.value.charAt(2)+x.value.charAt(3)=='6521') )
{
	
	document.getElementById("p2").innerHTML = "RuPay";

}
}

function myFunction2() {
    
	var x = document.getElementById("exp");
if(x.value.length/2==1)
	x.value= x.value += "/";
if(x.value.charAt(0)+x.value.charAt(1)>'12')
{
	alert("ERROR DATE")
	x.value="";
	return false
	
}

	}

	function myFunction4() {
    
	var x = document.getElementById("cexp");
if(x.value.length/2==1)
	x.value= x.value += "/";
if(x.value.charAt(0)+x.value.charAt(1)>'12')
{
	alert("ERROR DATE")
	x.value="";
	return false
	
}

	}
function myFunction5() {
    document.getElementById("f1").reset();
}
function myFunction6() {
 
var x = document.getElementById("upi1");
    	 
		if(!x.value.includes("@"))
		{
		x.value="";
		x.focus();
		alert("ERROR");
		return false;
		}
}
function openCity(evt, cityName) {
	document.getElementById("f1").reset();
	document.getElementById("f2").reset();
	document.getElementById("f3").reset();
	document.getElementById("f4").reset();
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
	document.getElementById("f1").reset();
}




</script>

</head>
<body onload="openCity(event, 'debit')">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sys_passport";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) 
    die("Connection failed: " . $conn->connect_error);
$price=300;	
?>
<div class="container">
<header><h1>Secure Payment Portal</h1>
<div class="w3-clear nextprev">

</div>
</header>


<nav>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'debit')">Debit Card</button>
  <button class="tablinks" onclick="openCity(event, 'credit')">Credit Card</button>
  <button class="tablinks" onclick="openCity(event, 'upi')">UPI</button>
  <button class="tablinks" onclick="openCity(event, 'paytm')">Paytm</button>
</div>

<div id="debit" class="tabcontent">
  <p>
<form id="f1" action="../Index.php" method="get">
<input type=hidden name=iid value='<?php echo $iid?>'>
 <input type=hidden name=dest value='<?php echo $dest?>'>
 <input type=hidden name=str value='<?php echo $str?>'>
 <input type=hidden name=type value='<?php echo $type?>'>
 <input type=hidden name=ctype value='<?php echo "Debit Card"?>'>
 <input type=hidden name=deltype value='<?php echo $deltype?>'>
 <input type=hidden name=price value="<?php echo $price?>">
 <input type=hidden name=weight value='<?php echo $weight?>'>
 <input type=hidden name=dim value='<?php echo $dim?>'>
 
 <link href="pay1.css" rel="stylesheet" id="bootstrap-css">
 <script src="pay2.js"></script>
 <script src="pay3.js"></script>


<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<script type="text/javascript" src="pay4.js"></script>
<script type="text/javascript" src="pay5.js"></script>

<!-- If you're using Stripe for payments -->
<script type="text/javascript" src="pay6.js"></script>

<div class="container">
    <div class="row">
        <!-- You can make it whatever width you want. I'm making it full width
             on <= small devices and 4/12 page width on >= medium devices -->
        <div class="col-xs-12 col-md-4">
        <input type="button" onclick="myFunction5()" value="Reset">
 
        
            <!-- CREDIT CARD FORM STARTS HERE -->
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="pay1.png">
                        </div>
                    </div>                    
                </div>
				<div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
					<h4 class="panel-title display-td" >TOTAL AMOUNT <?php echo $price?></h4>
					</p></div></div></div>
                <div class="panel-body">
                    <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">CARD NUMBER</label>
                                    <div class="input-group">
                                        <input 
										class="form-control"
										type="text" name="card" 
										id="card"
										maxlength=19
										onkeyup = "myFunction()"
										required
										>
										
                                        <span class="input-group-addon">
										<p id="p1"></p>
										</i></span>
										
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        name="exp"
                                        id="exp"
                                        placeholder="MM / YY"
                                        autocomplete="cc-exp"
                                        required 
										onkeyup = "myFunction2()"
										maxlength=5
                                    />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">CVV CODE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control"
                                        name="cvv"
                                        placeholder="CVV"
                                        autocomplete="cc-csc"
                                        required
										maxlength=3
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="couponCode">NAME OF CARD HOLDER</label>
                                    <input type="text" class="form-control" name="cardholder" />
                                </div>
                            </div>                        
                        </div>
                       
                        <div class="row" style="display:none;">
                            <div class="col-xs-12">
                                <p class="payment-errors"></p>
                            </div>
                        </div>
                    
                </div>
            </div>            
      </div>                        
    </div>
</div>
 
 <input type=submit value="CONFIRM">
 </form>
  </p>
</div>
<div id="credit" class="tabcontent">
  <h3>Credit Card Details</h3>
  <p>
  <form id="f2" action="../Index.php" method="get">

 <input type=hidden name=iid value='<?php echo $iid?>'>
 <input type=hidden name=dest value='<?php echo $dest?>'>
 <input type=hidden name=str value='<?php echo $str?>'>
 <input type=hidden name=type value='<?php echo $type?>'>
 <input type=hidden name=ctype value='<?php echo "Credit Card"?>'>
 <input type=hidden name=deltype value='<?php echo $deltype?>'>
 <input type=hidden name=price value="<?php echo $price?>">
 <input type=hidden name=weight value='<?php echo $weight?>'>
 <input type=hidden name=dim value='<?php echo $dim?>'>
 
 <link href="pay1.css" rel="stylesheet" id="bootstrap-css">
 <script src="pay2.js"></script>
 <script src="pay3.js"></script>


<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<script type="text/javascript" src="pay4.js"></script>
<script type="text/javascript" src="pay5.js"></script>

<!-- If you're using Stripe for payments -->
<script type="text/javascript" src="pay6.js"></script>

<div class="container">
    <div class="row">
        <!-- You can make it whatever width you want. I'm making it full width
             on <= small devices and 4/12 page width on >= medium devices -->
        <div class="col-xs-12 col-md-4">
        
        
            <!-- CREDIT CARD FORM STARTS HERE -->
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="pay1.png">
                        </div>
                    </div>                    
                </div>
				<div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
					<h4 class="panel-title display-td" >TOTAL AMOUNT <?php echo $price?></h4>
					</p></div></div></div>
                <div class="panel-body">
                    <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cardNumber">CARD NUMBER</label>
                                    <div class="input-group">
                                        <input 
										class="form-control"
										type="text" name="card" 
										id="ccard"
										maxlength=19
										onkeyup = "myFunction3()"
										required
										>
										
                                        <span class="input-group-addon">
										<p id="p2"></p>
										</i></span>
										
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        name="cexp"
                                        id="cexp"
                                        placeholder="MM / YY"
                                        autocomplete="cc-exp"
                                        required 
										onkeyup = "myFunction4()"
										maxlength=5
                                    />
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cardCVC">CVV CODE</label>
                                    <input 
                                        type="tel" 
                                        class="form-control"
                                        name="cvv"
                                        placeholder="CVV"
                                        autocomplete="cc-csc"
                                        required
										maxlength=3
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="couponCode">NAME OF CARD HOLDER</label>
                                    <input type="text" class="form-control" name="cardholder" />
                                </div>
                            </div>                        
                        </div>
                       
                        <div class="row" style="display:none;">
                            <div class="col-xs-12">
                                <p class="payment-errors"></p>
                            </div>
                        </div>
                    
                </div>
            </div>            
      </div>                        
    </div>
</div>

 
 <input type=submit value="CONFIRM">
 </form>

  </p>
</div>

<div id="upi" class="tabcontent">
  <h3>UPI </h3>
  <p>
  <form id="f3" action="../Index.php" method="get" onsubmit="return myFunction6()">

 <input type=hidden name=iid value='<?php echo $iid?>'>
 <input type=hidden name=dest value='<?php echo $dest?>'>
 <input type=hidden name=str value='<?php echo $str?>'>
 <input type=hidden name=type value='<?php echo $type?>'>
 <input type=hidden name=ctype value='<?php echo "upi"?>'>
 <input type=hidden name=deltype value='<?php echo $deltype?>'>
 <input type=hidden name=price value="<?php echo $price?>">
 <input type=hidden name=weight value='<?php echo $weight?>'>
 <input type=hidden name=dim value='<?php echo $dim?>'>
 
  <center>
  ENTER YOUR UPI ID
  <input type=text id="upi1" name=card required maxlength=10 placeholder="abc@okexample" >
  <input type=submit value="CONFIRM">
 </center>
 </form>
  </p>
</div>

<div id="paytm" class="tabcontent">
  <p>
  <form id="f4" action="../Index.php" method="get">

 <input type=hidden name=iid value='<?php echo $iid?>'>
 <input type=hidden name=dest value='<?php echo $dest?>'>
 <input type=hidden name=str value='<?php echo $str?>'>
 <input type=hidden name=type value='<?php echo $type?>'>
 <input type=hidden name=ctype value='<?php echo "paytm"?>'>
 <input type=hidden name=deltype value='<?php echo $deltype?>'>
 <input type=hidden name=price value="<?php echo $price?>">
 <input type=hidden name=weight value='<?php echo $weight?>'>
 <input type=hidden name=dim value='<?php echo $dim?>'>
 
  <center>
  <div class="gallery">
  <img src="paytm1.png" alt="" width="400" height="500">
  </div>
 
  <img src="paytm2.png" alt="" width="30" height="50">
 or, Enter Phone Number
  <input type=text name=card required maxlength=10>
  <input type=submit value="CONFIRM">
 </form>
 </center>
  </p>
</div>

</nav>
</body>
