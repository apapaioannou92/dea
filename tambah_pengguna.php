<?php include 'layout.php'; ?>
				<div class="col-sm-9">
					<div class="panel panel-primary">
						<div class="panel-heading">
						<?php
					  		if ($level == 'a') {
						  		# Superadmin
						  		echo '<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Mengelola Admin Cabang</h3>';
						  	} elseif ($level == 'c') {
						  		# Admin Cabang
						  		echo '<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Mengelola Manajer Cabang</h3>';
						  	}
					  	?>
						</div>
						<div class="panel-body">			
							<form class="form-horizontal" method="post" action="process/t_pengguna.php">
								<fieldset>
								    <?php
								    	if ($level == 'a') {
								  			# Superadmin
								  			echo '<legend>Tambah Admin Cabang</legend>';
								  		} elseif ($level == 'c') {
								  			# Admin Cabang
								  			echo '<legend>Tambah Manajer Cabang</legend>';
								  			// Mendapatkan cabang klinik
								  			$q = mysqli_query($conn, 'SELECT * FROM pengguna WHERE id_pengguna="'.$id.'"');
								  			$d = mysqli_fetch_assoc($q);
								  		}

								    	# Notifikasi
								    	if (ISSET($_GET['balasan']) AND ($_GET['balasan']==1)) {
						  			  	echo '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button><span class="glyphicon glyphicon-remove"></span> <strong>Username</strong> sudah terdaftar. Silahkan gunakan <strong>username</strong> lain</div>';
						  			  	}
								    ?>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Nama</label>
								      	<div class="col-sm-6">
								        	<input class="form-control" name="nama_pengguna" placeholder="Panjang maksimal 50 karakter" type="text" maxlength="50" required>
								      	</div>
								    </div>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Username</label>
								      	<div class="col-sm-6">
								        	<input class="form-control" name="username" placeholder="Panjang username 5-20 karakter" type="text" minlength="5" maxlength="20" required>
								      	</div>
								    </div>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Password</label>
								      	<div class="col-sm-6">
								        	<input class="form-control" name="password" placeholder="Panjang password 5-12 karakter" type="password" minlength="5" maxlength="12" required>
								      	</div>
								    </div>
								    <div class="form-group">
								      	<label class="col-sm-3 control-label">Cabang Klinik</label>
								      	<div class="col-sm-6">
								        	<select name="cabang_klinik" class="form-control" <?php if ($level == 'c') { echo 'disabled'; } ?> required>
								        		<option value=""> -- Pilih Cabang -- </option>
								        		<?php
								        			$query = mysqli_query($conn, "SELECT * FROM klinik");
								        			if (mysqli_num_rows($query) > 0) {
													    // output data of each row
													    while($cabang = mysqli_fetch_assoc($query)) {
													    	$id_cabang = $cabang['id_klinik'];
													    	if ($d['id_klinik'] == $id_cabang) {
													    		echo '<option value="'.$id_cabang.'" selected>'.$cabang["cabang_klinik"].'</option>';
													    	} else {
													    		echo '<option value="'.$id_cabang.'">'.$cabang["cabang_klinik"].'</option>';
													    	}
													    }
													}
								        		?>
								        	</select>
								      	</div>
								    </div>
								    <div class="form-group">
								      	<div class="col-sm-6 col-sm-offset-3">
								        	<button type="submit" class="btn btn-default">Simpan</button>
								      	</div>
								    </div>
								</fieldset>
							</form>
						</div>
					</div>
				</div> <!-- End of Main Content (Second col-sm-9) -->
<?php include 'layout2.php' ?>