<form id="form" method="post" action="php/mailform.php">
	<label>You are ordering:</label><br><input name="title" class="info" type="text"  value="<?php echo htmlspecialchars($f1); ?>" required="title" readonly/><br><br>
	<input name="title_id" class="hidden" type="hidden"  value="<?php echo htmlspecialchars($f4); ?>" readonly/>
	
	<label>Price in &euro; </label><br>
	<input name="price" id="price" class="info" type="text"  value="<?php echo htmlspecialchars($f2); ?>" required="title_id" readonly/><br><br>
            
            <label>Please fill out the form <i class="ob">(*obligated)<i></label>

	<label>Name<i class="ob">*</i></label><br>
	<input name="name" id="name" type="text"  placeholder="Name" required="Name"/><br>

	<label>Adress<i class="ob">*</i></label><br>
	<input name="street" id="street" type="text" placeholder="Street, No." required="Street, c"/><br>
	<input name="zipcode" id="zipcode" type="text"  placeholder="Zipcode" required="Zipcode"/><br>
	<input name="city" id="city" type="text"  placeholder="city"/><br>
	<input name="country" id="country" type="text"  placeholder="country" required="Country"/><br>

	<label>Ammount<i class="ob">*</i></label><br>
	<input name="ammount"  id="ammount" type="number" min="1" max="99" placeholder="Ammount" pattern="[1-99]" required="Ammount" value="1"/><br>

	<label>Email<i class="ob">*</i></label><br>
	<input placeholder="E-mail" id="email" pattern="[^ @]*@[^ @]*" name="email" id="email" required="Email" type="email"  />

	<input type="submit" value="Go" class="submit" name="submit" ><br>
</form>