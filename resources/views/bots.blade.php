

@extends('layouts.main')
@section('content')
<section id="bots-page" class="sections blue-texts">
    <div class="container">
        <h3 class="text-center d-flex justify-content-center section-title">LEGAL BOTS</h3>
        <div class="row partner-row">
            <div class="col-sm-6 col-md-6 col-xl-4 d-flex flex-column align-items-center areas" data-aos="fade-right" data-aos-duration="250" data-aos-once="true"><a target="_blank" href="{{('appointment-bot')}}"><img class="img-fluid bot-icons" src="assets/img/bots/bot-01.png"></a>
                <h4 class="text-center area-title"><strong>APPOINTMENT BOT</strong><br><br></h4>
                <p class="text-center">Through this bot you can request for an appointment with us at your preferred date and time. </p>
            </div>
            <div class="col-sm-6 col-md-6 col-xl-4 d-flex flex-column align-items-center areas" data-aos="fade-right" data-aos-duration="250" data-aos-delay="250" data-aos-once="true"><a href="{{('registration-tax-bot')}}" target="_blank"><img class="img-fluid bot-icons" src="assets/img/bots/bot-02.png"></a>
                <h4 class="text-center area-title"><strong>REGISTRATION BOT - </strong><br><strong>TAX</strong><br></h4>
                <p class="text-center">Through this bot you can check whether you are required to register for tax at the Maldives Inland Revenue Authority. </p>
            </div>
            <div class="col-sm-6 col-md-6 col-xl-4 d-flex flex-column align-items-center areas" data-aos="fade-right" data-aos-duration="250" data-aos-delay="350" data-aos-once="true"><a href="{{('registration-business-bot')}}" target="_blank"><img class="img-fluid bot-icons" src="assets/img/bots/bot-03.png"></a>
                <h4 class="text-center area-title"><strong>REGISTRATION BOT - BUSINESS</strong><br></h4>
                <p class="text-center">This bot will guide you with your business registration at Ministry of Economic Development. </p>
            </div>
        </div>
    </div>
</section>
@stop
    
