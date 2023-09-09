<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
} else {
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
	$registration_date = $_SESSION['registration_date'];
}
?>
<?php require_once('header.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <title>8 Week System | Consult CRM</title>
    <style>
        body {
            text-align: center;
        }

        .section-image {
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .section-image img {
            max-width: 90%;
            max-height: 300px;
            width: auto;
            height: auto;
        }

        .section-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
        }

        .section-content h2 {
            font-size: 24px;
            margin: 0;
        }

        .section-content p {
            font-size: 16px;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
 <?php include('week_difference.php'); ?>

<div class="main-content">
    <div class="section__content section__content--p30">
	     <?php
        // Print Week 0
        $section_link = "https://drive.google.com/file/d/1HES0GGb3OXsZsQrEBvqglEptPAAkJb4s/view?usp=sharing"; // Example link, replace with your actual link

        ?>
        <h1 style="text-align: center;"><u><?php echo "Getting Started"; ?></u></h1>
        <div class="section-image">
            <img src="<?php echo "images/week0.png"; ?>" alt="Background Image">
            <div class="section-content">
                <h2>Client Document</h2>
                <a href="<?php echo "https://drive.google.com/file/d/1HES0GGb3OXsZsQrEBvqglEptPAAkJb4s/view?usp=sharing"; ?>">Get Started</a>
            </div>
        </div>
        <br>

        
<?php
for ($week = 1; $week <= 8; $week++) {
    $section_title = "Week $week";
    $section_image = "images/week$week.png";
    $section_link = "https://drive.google.com/file/d/1HES0GGb3OXsZsQrEBvqglEptPAAkJb4s/view?usp=sharing"; // Example link, replace with your actual link

    if ($weeks_difference >= $week) {
        ?>
        <h1 style="text-align: center;"><u><?php echo $section_title; ?></u></h1>
        <div class="section-image">
            <img src="<?php echo $section_image; ?>" alt="Background Image">
            <div class="section-content">

                <?php
                if ($week == 5) {
                    // For Week 5, display two different titles with the same image
                    ?>
                    <h2>Equalization - Support <br>
                        and Pensions</h2>
                    <a href="https://www.divorcepath.com/">Learn more</a>
                    <br>
                     <h2>Healthy decisions</h2>
                    <a href="https://acrobat.adobe.com/link/track?uri=urn:aaid:scds:US:447131ac-4510-3551-9a4e-ee5bf09c0057">Learning from the relationship</a>
                    <?php 
				} else if ($week == 1) {
				?>
				<h2>Initial Session</h2>
                    <a href="https://drive.google.com/file/d/1HES0GGb3OXsZsQrEBvqglEptPAAkJb4s/view?usp=sharing">Get Started</a>
			<?php	
                } else if ($week == 2) {
                    ?>
                    <h2>Organise and Evaluate</h2>
                    <a href="https://drive.google.com/file/d/1HES0GGb3OXsZsQrEBvqglEptPAAkJb4s/view">Statement of intent and mediation</a><br>
                    <a href="https://www.moneyhelper.org.uk/en/family-and-care/divorce-and-separation/how-to-divide-your-possessions-on-separation">How to divide possessions in case <br> of separation</a><br>
                    <a href="https://drive.google.com/file/d/1GCvLaFsNpKdhee9Xz9Kq1ReDFVnG9a29/view">Identifying Needs and Goals</a>
                    <?php
                } else if ($week == 3) {
                    ?>
                    <h2>Money Matters</h2>
                    <a href="https://drive.google.com/file/d/1vjf4rKKVgcF_W3uOjN3sV0HPb2sdccEI/view">Documents to prepare for divorce</a><br>
                    <a href="https://docs.google.com/spreadsheets/d/17zaf53r_6qfQb5LnxJxwdw02W_jzBvbC/edit?usp=share_link&ouid=106198765001201418414&rtpof=true&sd=true">Budget</a><br>
                    <a href="https://docs.google.com/document/d/1y2ZPJCOmZqAW9Kbhbhmit3uNbhtvNzI0/edit?usp=share_link&ouid=106198765001201418414&rtpof=true&sd=true">List of Client Assets</a>
                    <?php 
                } else if ($week == 4) {
                    ?>
                    <h2>Living arrangements, <br>Matrimonial home,<br> temporary schedule <br>for kids </h2>
					<a href="https://www.moneyhelper.org.uk/en/family-and-care/divorce-and-separation/how-to-divide-your-possessions-on-separation">Click here to open link</a>
                    <?php 
                } else if ($week == 6) {
                    ?>
                    <h2>Parenting Plan Guide </h2>
					<a href="https://drive.google.com/file/d/1o16ib5r4-vIHIMztNy7AfsyttZmNNBYk/view">Click here to open link</a>
                    <?php 
                } 
				else if ($week == 7) {
                    ?>
                    <h2>Exploring solution <br> & trying them on</h2>
                    <?php 
                } else if ($week == 8) {
                    ?>
					<h2>Drafting Mediation <br> Summary Report</h2>
                    <?php 
                } 
                ?>

            </div>
        </div>
        <br>
        <?php
    }
}
?>



		<h2 style="text-align: center;" ><u>Other Resources</u></h2><br>
            <div class="section-image">
                <img src="images/extra1.png" alt="Background Image">
                <div class="section-content">
                    <h2>Emotional <br>Empowerment</h2>
                    <a href="https://drive.google.com/file/d/1E0b2hv6zkN32tYeKSQJX1SbjRf179k_B/view">Learn More</a>
                </div>
            </div>
            <br>
            <h2 style="text-align: center;" ></h2>
            <div class="section-image">
                <img src="images/pic03.jpg" alt="Background Image">
                <div class="section-content">
                    <h2>Identify Feelings</h2>
                    <a href="/week5 old files/emotionTest.html">Learn More</a>
                </div>
            </div>
            <br>
            <h2 style="text-align: center;" ></h2>
            <div class="section-image">
                <img src="images/pic02.jpg" alt="Background Image">
                <div class="section-content">
                    <h2>My letter to you</h2>
                    <a href="/week5 old files/myLetterToYou.html">Click here to open link</a>
                </div>
            </div>
    </div>
</div>
</body>

</html>

                      
