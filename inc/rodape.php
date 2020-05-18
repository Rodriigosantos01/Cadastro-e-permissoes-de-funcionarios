			<br><br><br>
			</div>
			<div class="footer col-md-12 text-center" style="bottom: 0; position: absolute;">
				<p>Copyright &copy; <?= NAME_SISTEMA?> - <?= date('Y')?></p>
			</div>
		</div>
	</div>
</div>    
	<script src="../assets/framework/jquery-3.5.1.min.js"></script>
	<script src="../assets/framework/popper.js"></script>
	<script src="../assets/framework/bootstrap.min.js"></script>	
	<script src="../assets/framework/main.js"></script>		
	<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function(){
			$('[data-toggle="popover"]').popover();  			
		});
		
		$('#sidebarCollapse').on('click', function () {
			if($('#sidebar').hasClass('active')){
				$('#sidebar').addClass("col-md-2");
				$('#content').removeClass('col-md-12').addClass("col-md-10");
			}else{
				$('#sidebar').removeClass("col-md-2");
				$('#content').removeClass('col-md-10').addClass("col-md-12");
			}
			$('#sidebar').toggleClass('active');	  
  		});
	</script>			
</body>
</html>
