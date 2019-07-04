@include('pdf/pdf_css')
<div class="edge mb-20"></div>
<img src="{!! base_path().'/public/assets/img/logo-text.png' !!}" height="80" />

<div class="card mt-20 mb-20">
    <div class="card-header">
        <span class="fa fa-id-card-o"></span>Package Details
    </div>
    <div class="card-body">
        <table width="100%">
            <tr>
                <td class="w-50">Name</td>
                <td class="w-50">{!! $package->name !!}</td>
            </tr>
        </table>
    </div>
</div>

<pagebreak></pagebreak>



<div class="edge mt-20"></div>