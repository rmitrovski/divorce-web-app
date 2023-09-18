<?php if(isset($alert) && !empty($alert)):?>
    <script>alert('<?php echo $alert;?>');</script>
<?php endif; ?>      
<?php if(isset($jump) && !empty($jump)):?>
	<script>window.location.href = '<?php echo $jump;?>';</script>
<?php endif; ?>