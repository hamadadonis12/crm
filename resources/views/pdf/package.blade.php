@include('pdf/pdf_css')
<div class="edge mb-20"></div>
<img class="center-logo" src="{!! base_path().'/public/assets/img/logo-text.png' !!}" width="150" />

<div class="card mt-20 mb-20">
    <div class="card-header">
        <span class="fa fa-id-card-o"></span>Package Details
    </div>
    <div class="card-body">
        <table width="100%" class="table table-bordered">
			<tbody>
				<tr>
					<td class="w-50"><b>Client Name</b></td>
					<td class="w-50">{{ $package->client->firstname }} {{ $package->client->lastname }}</td>
				</tr>
				<tr>
					<td class="w-50"><b>Client Email</b></td>
					<td class="w-50">{{ $package->client->email }}</td>
				</tr>
				<tr>			
					<td class="w-50"><b>Package Name</b></td>
					<td class="w-50">{!! $package->name !!}</td>
				</tr>
				<tr>
					<td class="w-50"><b>From</b></td>
					<td class="w-50">{{ $package->from }}</td>
				</tr>
				<tr>
					<td class="w-50"><b>To</b></td>
					<td class="w-50">{{ $package->to }}</td>
				</tr>
			</tbody>
        </table>
    </div>
</div>
<div class="edge mb-20"></div>
<!--<pagebreak></pagebreak>-->