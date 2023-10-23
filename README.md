<h1> Clean Divorce Project </h1>

<h3> Table of Contents </h3>
1. Setup website
2. Setup database
3. Unit testing
4. Sending email after booking
5. ChatBot
6. MailChimp - Subcribe to newsletter 

<h3> 1. Setup website </h3>

1.1 Download/Install Xampp
You need to download the latest version of Xampp from this link: https://www.apachefriends.org/download.html
After you have downloaded the file you will need to install it on the computer, 
this link: https://www.ionos.com/digitalguide/server/tools/xampp-tutorial-create-your-own-local-test-server/ 
has good step-by-step instructions that will guide you through the installation process.

1.2 Download the files from the GitHub repo:
<img src="/instructions/download.png" alt="Download files">

1.3 Once you download the file it will be in a .zip so the next thing is to unzip it:
<img src="/instructions/unzip.png" alt="Unzip files">

1.4 Once the file has been unzipped, it needs to be copied:
<img src="/instructions/copy_extracted.png" alt="Copy extracted files">

1.5 The copied files need to be pasted into a folder within the htdocs folder (in this example it is located in the app folder):
<img src="/instructions/pasting_extracted.png" alt="Paste extracted files">

1.6 When the xampp control panel is opened, the Apache and MySQL need to be started:
<img src="/instructions/xampp.png" alt="Xampp control panel">

When the services have been started, you will be able to access the website, in this example, it is in: http://localhost/app/login.php
<img src="/instructions/login.png" alt="Login page">

<h3> 2. Setup database </h3>
Although the website is set up, without the database there is not much you can do, so this guide will show you how to install the database.

2.1 In the database folder, there is a .sql file that has the code that will set up the database for you:
<img src="/instructions/db-code.png" alt="Database code">

2.2 Next, you need to go on the mySQL database which for this example is on this link: http://localhost/phpmyadmin/index.php and click on "New" on the side bar to create a new database:
Call the new database "project"
<img src="/instructions/db-creation.png" alt="Create new database">

2.3 After the database is created, go on the database click on the SQL tab enter the code from the .sql file there, and click the "Go" button:
<img src="/instructions/tables-creation.png" alt="Create tables">

2.4 Now the database is up and functioning, you are now able to log in and use the website:
<img src="/instructions/result.png" alt="Setup complete">

<h3> 3. Unit testing </h3>
Testing is done via GitHub workflow, for more information on how that works please have a look at the GitHub workflow documentation:
https://docs.github.com/en/actions/using-workflows

<h3> 4. Sending email after booking </h3>
The code is all set up to send an email after a booking has been placed, however, 2FA needs to be enabled with a valid phone number for it to be fully set up. If in the event the code needs to be modified there are only a few lines of code that will need modifying:

2.4 You simply need to fill in the three lines below with the login details that you want to use and everything will work as it should:
<img src="/instructions/send_email.png" alt="Sent email">

For more information on how it works can be found on their GitHub page:
https://github.com/PHPMailer/PHPMailer

<h3> 5. ChatBot </h3>
Although we decided with the client not to implement a chatbot AI, if in the future it was to be implemented
we have setup up bot.py to be the file where the AI would be run. 
Some links you may be interested are listed below:
https://openai.com/product
https://bard.google.com/

<h3> 6. MailChimp - Subcribe to newsletter </h3>
MailChimp is a useful way to get people to subscribe to any newsletters like what has been done in subscribe.php.
MailChimp has different payment plans, with the free version being quite limited. Although it is not fully implemented as 
we only have a basic test version, it can maybe one day be implemented depending on the clients needs.
MailChimp's website is https://mailchimp.com/?currency=CAD

