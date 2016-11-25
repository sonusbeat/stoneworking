<h1 align="center">Solicitud de Cotizacion de la Página de Stoneworking</h1>

<h2>Datos Personales</h2>

<table>
	<tr>
		<th align="left">Nombre:</th>
		<td align="left">{{ $data['name'] }}</td>
	</tr>
	
	<tr>
		<th align="left">Celular:</th>
		<td align="left">{{ $data['mobile'] }}</td>
	</tr>
	
	<tr>
		<th align="left">Email:</th>
		<td align="left">{{ $data['email'] }}</td>
	</tr>
</table>

<h2>Medidas</h2>

<table>
	<tr>
		<th align="left">Plano:</th>
		<td align="left">{{ $data['blueprint'] }}</td>
	</tr>

	<tr>
		<th align="left">Medida 1:</th>
		<td align="left">{{ $data['size1'] }}</td>
	</tr>

	@if($data['size2'] !== '')
	<tr>
		<th align="left">Medida 2:</th>
		<td align="left">{{ $data['size2'] }}</td>
	</tr>
	@endif

	@if($data['size3'] !== '')
	<tr>
		<th align="left">Medida 3:</th>
		<td align="left">{{ $data['size3'] }}</td>
	</tr>
	@endif
</table>

<h2>Información Adicional</h2>

@if($data['message'] == '')
	<p>El prospecto {{ $data['name'] }} no escribio información adicional</p>
@else
	<p>{{ $data['message'] }}</p>
@endif