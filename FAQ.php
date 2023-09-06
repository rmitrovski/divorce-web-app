<!DOCTYPE html>
<html>
  
<head>
  
  <title>FAQs</title>
<style>



body {
  font-family: Arial, sans-serif;
}

h1 {
  text-align: center;
  
}

.outer {
  background-color: rgb(255,255,255);
  color: rgb(0, 0, 0);
  padding: 30px;
  margin: auto;
  border-radius: 10px;
  box-shadow: 0 0 5px 1px lightgrey;
  width: 720px;
  height: 1300px;
  
  
}

.outer h1 {
  margin-top: 10px;
  margin-bottom: 40px;
  color: black;
 
  
}

.outer p {
  margin: 10px 0;
}

.outer a {
  margin-top: 20px;
  color: rgb(4, 4, 4);
  text-decoration: none;
  font-size: 18px;
  
}

.collapsible {
  background-color: white;
  color: black;
  cursor: pointer;
  text-align: left;
  font-size: 20px;
  padding: 18px;
  width: 100%;
  border: 1px solid #3C91E6;
  
  outline: none;
  font-size: 22px;
}

.active, .collapsible:hover {
  background-color: #bafcff;
}

.collapsible:after {
  content: '\002B';
  color: rgb(3, 5, 18);
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.content {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #eceaea;
  font-size: 18px;
}


input[type=email] {
        border: 2px solid blue;
        border-radius: 3px;
             }
        input[type=password] {
        border: 2px solid blue;
        border-radius: 3px;
             }

             .clean-form {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    font-size: 18px;
    display: block;
    margin-bottom: 5px;
}

.form-control {
    width: 70%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.btn-primary {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    font-size: 18px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.2s;
}

.btn-primary:hover {
    background-color: #0056b3;
}
  </style>
</head>
<body>



<div class="outer">
  <h1>Frequently Asked Questions</h1>

<p style="font-size: 23px;">Have any questions? We're here to help!</p>
<br>

<button class="collapsible">What am I able to do in this CRM?</button>
<div class="content">
  <p>This CRM allows you to get support in your relationship in many different ways such as participating in the 8 week program which will give you weekly insights, allows you to send emails for support and also book consultations.</p>
</div>
<button class="collapsible">Is the 8 week program free?</button>
<div class="content">
  <p>Yes the 8 week system is free of charge!</p>
</div>
<button class="collapsible">What is MailChimp</button>
<div class="content">
  <p>Mailchimp is a marketing, automation and email platform that will be used to establish communication with our clients as they progress through our 8 week program. At the end of each week, our clients can expect a series of helpful resources that they can use to reflect upon their journey so far.</p>
</div>
<button class="collapsible">Where can I talk to someone?</button>
<div class="content">
  <p>We have a chatbot feature that will be able to respond to your queries and provide relevant legal advice. If you wish to send a specific question, you may email us by filling out the form below the FAQs or booking a consultation.</p>
</div>
<button class="collapsible">How do I book a consultation?</button>
<div class="content">
  <p>On the left of the CRM, there is a navigation panel with the "Book Consultation" option. Please click here and follow the instructions to set up an appointment.</p>
</div>

<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
<br>
<br>
<br>
<div class="container">
  
    <div class="row">
        <div class="col-md-5 col-md-offset-3 well">
            <p style="font-size: 23px;">Send us an email!</p> <br>
            <form action="send_email_code.php" method="post" >
            <div class="form-group">
                    <label style="font-size: 22px;" for="">Full Name:</label> <br>
                    <input type="text" name="user" class="form-control" placeholder="Jane Doe"/>
                </div>
                <div class="form-group">
                    <label style="font-size: 22px;" for="">Email:</label> <br>
                    <input type="email" name="email_id" class="form-control" placeholder="jane@doe.com"/>
                </div>
                <br>
                <div class="form-group">
                    <label  style="font-size: 22px;" for="">Please enter your query:</label> <br>
                    <input id="question" name="question" class="form-control" placeholder="Type a few words in here..."/>
                </div>
                     <br>
                <div class="form-group">
                    <input   style="font-size: 22px;" type="submit" name="btnLogin" class="btn btn-primary" value="Send email" />
                </div>
            </form>
           
        </div>
    </div>
</div>

				




</body>
</html>
