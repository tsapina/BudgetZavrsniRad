<head>
	<title>Ovo je template</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<!-- CSS LINKOVI-->
	<link rel="stylesheet" href="css/main.css" type="text/css"/>
	<link rel="stylesheet" href="css/forms.css" type="text/css"/>
	<link rel="stylesheet" href="css/demo_table.css" type="text/css"/>
	<link rel="stylesheet" href="css/demo_table_jui.css" type="text/css"/>
	<link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css" type="text/css"/>
	<link rel="stylesheet" href="css/jquery.validate.css" type="text/css"/>



	<!-- DATEPICKER-->
  	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
 	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script type="text/javascript">
		  $(function() {
		    $( "#datepicker" ).datepicker();
		  });
 	</script>
 	
 	<!-- Jquery Validation-->
	<script src="js/validate/jquery.validate.js" type="text/javascript"></script>
    <script src="js/validate/jquery.validation.functions.js" type="text/javascript"></script>
    
    <!-- Highcharts-->
    <script src="js/highcharts.js" type="text/javascript"></script>
    
    <!-- Jquery Validation- external .js file sa fieldovima-->
    <script src="js/validation.js" type="text/javascript"></script>
    
	<!-- Ovo je jquery za kategoriju i vrstu rashoda!-->
	<script type="text/javascript">
        $(document).ready(function(){
            $("select#type").attr("disabled","disabled");
            $("select#category").change(function(){
            $("select#type").attr("disabled","disabled");
            $("select#type").html("<option>wait...</option>");
            var id = $("select#category option:selected").attr('value');
            $.post("select_type.php", {id:id}, function(data){
                $("select#type").removeAttr("disabled");
                $("select#type").html(data);
            });
        });
       
    });
    </script>
	
	<!-- Ovo je za tablice!!!!!!-->
	<script src="js/jquery.dataTables.js" type="text/javascript"></script>
	<script type="text/javascript" charset="utf-8">
	            $(document).ready(function(){
	                $('#datatables').dataTable({
	                    "sPaginationType":"full_numbers",
	                    "aaSorting":[[2, "desc"]],
	                    "bJQueryUI":true
	                });
	            })
	</script>
	
	    
    
</head>