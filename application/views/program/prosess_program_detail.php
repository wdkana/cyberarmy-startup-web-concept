<div class="panel panel-flat border-left-lg border-left-indigo">
    <div class="panel-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                            <?php foreach ($get_data['rows'] as $key => $value) { ?>
                            <img class="bg-rounded" src="<?php echo base_url();?>assets/img/<?php echo $value->foto;?>" width="200" width="auto">
                                <br><br><br>
                                <?php echo form_open_multipart('program/submit_program')?>
								<div class="row">
								<input type="hidden" name="kd_program" value="<?php echo $value->kd_program;?>">
								<?php } ?>
									<div class="col-md-3">
										<label class="text-bold">Info</label>
									</div>
									<div class="col-md-8">
										<div class="form-group form-group-lg has-feedback">
											<p class="text-light">Bantu kami mendapatkan ide tentang apa kerentanan ini.</p>
											<input type="text" class="form-control info textbox" required="required"
												id="info" name="info">
											<i class="form-control-feedback"></i>
											<span class="text-warning"></span>
										</div>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-3">
										<label class="text-bold">Target</label>
										<!--
										<p class="text-light">Pilih target yang rentan</p>-->
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<select name="target"  class="form-control select" required="required">
												<?php foreach ($get_target['rows'] as $key => $ada) { ?>
												<option value="<?php echo $ada->informasi_target?>"><?php echo $ada->informasi_target?></option>
												<?php } ?>
											</select>
											<i class="form-control-feedback"></i>
											<span class="text-warning"></span>
										</div>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-3">
										<label class="text-bold">Keparahan teknis</label>
									</div>
									<div class="col-md-8">
											<div class="form-group form-group-lg has-feedback">
												<select name="keparahan" data-placeholder="Select a State..." class="select-size-sm">
													<optgroup label="Letak Terjadinya Keparahan">
														<option value="Server Security Misconfiguration">Server Security Misconfiguration</option>
														<option value="Server-Side Injection">Server-Side Injection</option>
														<option value="Remote Code Execution (RCE)">Remote Code Execution (RCE)</option>
														<option value="SQL Injection">SQL Injection</option>
														<option value="Broken Authentication and Session Management">Broken Authentication and Session Management</option>
														<option value="Sensitive Data Exposure">Sensitive Data Exposure</option>
														<option value="Insecure OS/Firmware">Insecure OS/Firmware</option>
														<option value="Misconfiguration Server Email">Misconfiguration Server Email</option>
														<option value="Broken Cryptography">Broken Cryptography</option>
														<option value="Cross-Site Scripting (XSS)">Cross-Site Scripting (XSS)</option>
														<option value="Broken Access Control (BAC)">Broken Access Control (BAC)</option>
														<option value="Cross-Site Request Forgery (CSRF)">Cross-Site Request Forgery (CSRF)</option>
														<option value="Application-Level Denial-of-Service (DoS)">Application-Level Denial-of-Service (DoS)</option>
														<option value="Using Components with Known Vulnerabilities">Using Components with Known Vulnerabilities</option>
														<option value="Insecure Data Storage">Insecure Data Storage</option>
														<option value="Unvalidated Redirects and Forwards">Unvalidated Redirects and Forwards</option>
														<option value="Insecure Direct Object References">Insecure Direct Object References</option>
													</optgroup>
											
												</select>
												<i class="form-control-feedback"></i>
												<span class="text-warning"></span>
											</div>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-3">
										<label class="text-bold">Rincian Kerentanan (URL)</label>	
									</div>
									<div class="col-md-8">
										<div class="form-group form-group-lg has-feedback">
											<input type="url" class="form-control url textbox"
												required="required" id="url" name="url" placeholder="https://secure.server.com/some/path/file.php">
											<i class="form-control-feedback"></i>
											<span class="text-warning"></span>
										</div>
									</div>
								</div>
                               <br>
							   <div class="row">
									<div class="col-md-3">
										<label class="text-bold">Deskripsi</label>
									</div>
									<div class="col-md-8">
										<div class="form-group form-group-lg has-feedback">
											<textarea class="form-control summernote" placeholder="deskripsi" rows="15" name="deskripsi"></textarea>
											<i class="form-control-feedback"></i>
											<span class="text-warning"></span>
										</div>
									</div>
							   </div>

                              <br>
							  <div class="row">
								<div class="col-md-3">
									<label class="text-bold">Attachment</label>
								</div>
								<div class="col-md-8">
									<div class="form-group form-group-lg has-feedback">
										<input type="file" name="attachment" id="attachment">
										<i class="form-control-feedback"></i>
										<span class="text-warning"></span>
									</div>
								</div>
							  </div>
                                <button type="submit" class="btn bg-indigo-600">Submit Report</button>
                                <?php echo form_close();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Seret dan lepaskan file di sini atau klik',
                replace: 'Seret dan lepaskan file atau klik untuk mengganti',
                remove: 'Hapus',
                error: 'Maaf, file terlalu besar'
            }
        });
    });
    $(".deskripsi_singkat").keyup(function () {
        var maxChars = 75;
        if ($(this).val().length > maxChars) {
            $(this).val($(this).val().substr(0, maxChars));
        }
    });
</script>