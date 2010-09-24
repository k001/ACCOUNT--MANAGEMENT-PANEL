<form action="/users/profile" method="post" class="form">
	<p>
		<span class="relative">
			<label for="nombre" class="required">Nombre(s)</label>
			<input type="text" name="name" value="" id="name"/>
		</span>
	</p>
	<p>
		<span class="relative">
			<label for="apellido_paterno" class="required">Apellido Paterno</label>
			<input type="text" name="first_name" value="" id="first_name"/>
		</span>
	</p>
	<p>
		<span class="relative">
			<label for="apellido_materno" class="required">Apellido Materno</label>
			<input type="text" name="last_name" value="" id="last_name"/>
		</span>
	</p>	
	<p>
		<span class="relative">
			<label for="company">Empresa</label>
			<input type="text" name="company" value="" id="company"/>
		</span>
	</p>
	<p>
		<span class="relative">
			<label for="address" class="required">Direcci&oacute;n</label>
			<textarea name="address" id="address"></textarea>
		</span>
	</p>
	<p>
		<span class="relative">
			<label for="country" class="required">Pa&iacute;s</label>
			<select name="first_name" id="first_name">
				<option>--- Seleccione ---</option>
				<option value="1">Mexico</option>
				<option value="2">EUA</option>
			</select>
		</span>
	</p>
	<p>
		<span class="relative">
			<label for="email" class="required">Email</label>
			<input type="text" name="email" value="" id="email"/>
		</span>
	</p>
	<p>
		<span class="relative">
			<label for="primary_phone" class="required">Telefono</label>
			<input type="text" name="primary_phone" value="" id="primary_phone"/>
		</span>
	</p>
	<p>
		<span class="relative">
			<label for="apellido_paterno">Telefono</label>
			<input type="text" name="second_phone" value="" id="second_phone"/>
		</span>
	</p>
	<p>
		<span class="relative">
			<label for="fax">Fax</label>
			<input type="text" name="fax" value="" id="fax"/>
		</span>
	</p>
	<p>
		<button type="button">Enviar</button>
		<button class="red" type="reset">Cancelar</button>
	</p>
</form>