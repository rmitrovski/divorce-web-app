<?php //check if the lart variable is set and not empty 
if(isset($alert) && !empty($alert)):?>
    <!-- Display an alert box with the specified message -->

    <script>alert('<?php echo $alert;?>');</script>

<?php endif; ?>      
<?php
//check if the dump variable is set and not empty 
 if(isset($jump) && !empty($jump)):?>
     <!-- Redirect the browser to the specified URL -->

	<script>window.location.href = '<?php echo $jump;?>';</script>
<?php endif; ?>