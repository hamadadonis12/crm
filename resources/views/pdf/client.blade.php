@include('pdf/pdf_css')
<div class="card__front" style="width: 300px; height:160px; border-radius:8px; background: #324958;"> 
<div style="background-image:url('{!! base_path().'/public/assets/img/map.png' !!}');background-repeat: no-repeat;
     background-position: center;
     background-size: cover; width: 299px;height: 160px; margin-top: 0px; margin-left: -15px;">
<div style="padding-top:10px;">
<img style="margin-top:0px !important; margin-left:25px; display:block;" width="50" src="{!! base_path().'/public/assets/img/iata-logo.png' !!}">
     <div>
		<p class="card_numer"><span style="font-size:12px;">LOYALTY CARD</span><br>{{ $client->loyalty_card_id }}</p>
	 </div>
      <div class="card__space-75">
         <span class="card__label" style="margin-left:15px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Card holder</span>
         <p class="card__info" style="margin-left:15px;">&nbsp;&nbsp;{{ $client->fullname }}</p>
      </div>
      <div class="card__space-25">
         <span class="card__label">Expires</span>
         <p class="card__info">10/25</p>
      </div>
	</div>
	</div>
</div>
	<div class="card__front" style="width: 300px; height:160px; border-radius:8px; background: #324958;"> 
      <div class="">
         <div style="margin-top:30px;margin-left:auto;text-align:center; margin-right:auto; display:block;">
           <img style="margin-left:auto;text-align:center; margin-right:auto; display:block;" width="150" src="{!! base_path().'/public/assets/img/logo.png' !!}">
			<div>
				<p class="card_numer_phone">Customer Service +961 70 275 475</p>
			</div>
         </div>
      </div>
    </div>
