<?php
session_start();
require_once '../server php/db_connect.php';
include_once 'header.php';
include_once 'footer.php'
?>
<body>
		<div class="container">
			<h1>Cadastrar Data</h1>
			<form class="form-horizontal" method="POST">
				<div class="form-group">
					<div class="col-sm-10">
						<div class="input-group date data_formato" data-date-format="yyyy/mm/dd HH:ii:ss">
							<input type="text" class="form-control" name="data" placeholder="Data da visita" style="width: 90%">
							<span class="input-group-addon">
                                <span class="glyphicon glyphicon-th">
                                <svg class="bi bi-calendar" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                                </svg>
                                </span>
							</span>
						</div> 
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="submit" value="Registrar" class="btn btn-info ">
					</div>
				</div>
			</form>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<script src="../../js/bootstrap-datetimepicker.min.js"></script>
		<script src="../../js/locales/bootstrap-datetimepicker.pt-BR.js"></script>
		<script type="text/javascript">
			$('.data_formato').datetimepicker({
				weekStart: 1,
				todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1,
                language: "pt-BR",
                //startDate: '+0d'
			});
        </script>
        <?php 
        if(isset($_POST['submit'])){
            $data = $_POST['data'];
            $sql = "INSERT INTO horarios (info) VALUES ('$data')";
            mysqli_query($connect, $sql);
        }
        ?>
	</body>