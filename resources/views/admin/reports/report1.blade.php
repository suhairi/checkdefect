<html>
<style>
	body {
		padding: 20px;
	}
</style>
<body>

<table width="100%" border="2" height="100%">
	<tr>
		<td align="center">
			
			<table>
				<tr>
					<td align="center">.
						<h1>ADUAN KEROSAKAN / KECACATAN RUMAH</h1>
						<br /><br />
					</td>
				</tr>
				<tr>
					<td align="center">
						<br /><br /><br />
						<h2>
							@foreach($address as $add)
								@if(!$loop->last)
									{{ strtoupper($add) }},<br />
								@else
									{{ strtoupper($add) }}<br />
								@endif
							@endforeach
						</h2>
						<br /><br /><br /><br />
					</td>
				</tr>
				<tr>
					<td align="center">
						<h2>{{ strtoupper($user->name) }}</h2>
						<br />
					</td>
				</tr>
				<tr>
					<td align="center">
						<br /><br />
						<h2>{{ $user->phone }}</h2>
						<br /><br /><br /><br />
					</td>
				</tr>
				<tr>
					<td align="center">
						<br /><br />
						<h2>{{ Carbon\Carbon::today()->format('d M Y') }}</h2>

						<br />
					</td>
				</tr>
			</table>

		</td>
	</tr>
</table>