@extends('layouts.not-logged-layout')
@section('content')
<!-- banner -->
<div class="banner about-banner">
   <div class="container">
      <h2>Contato</h2>
      <div class="agileits-line"></div>
   </div>
</div>
<!-- //banner -->
<!-- contact -->
<div class="contact-top">
   <div class="container">
      <div class="contact-grids">
         <div class="col-md-7 contact-form">
            <form action="" method="POST">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <p class="alert alert-danger">{{ $error }}</p>
                            </div>
                        </div>
                    @endforeach
               @endif
               @csrf
               <input type="text" name="nome" placeholder="name" required>
               <input type="email" class="email" name="email" placeholder="E-mail" required>
               <textarea placeholder="mensagem" name="message" required=""></textarea>
               @if(isset($message))
               <p style="font-size:70%; color:#ac2925">{{$message}}</p>
               @endif
               <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
         </div>
         <div class="col-md-4 contact-right">
            <div class="contact-text">
               <h4>HORÁRIO DE ATENDIMENTO : </h4>
               <p> Segunda – Segunda das 08:00 AM as 17:00 PM </p>
               <p><span class="glyphicon glyphicon-earphone"></span> TELEFONE : (42) 9 9954-3434</p>
            </div>
         </div>
         <div class="clearfix"></div>
      </div>
   </div>
</div>
<div class="map">
   <div class="services-heading">
      <h3>NOSSA SEDE</h3>
      <div class="agileits-line"></div>
   </div>
   </br>
   </br>
   <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4161.272873539378!2d-51.48939972687!3d-25.385057691609717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ef362a96428765%3A0x3508ff16b1db8aaa!2sCampus+Cedeteg+da+Universidade+Estadual+Centro-Oeste+-+UNICENTRO!5e1!3m2!1sen!2sbr!4v1557378983757!5m2!1sen!2sbr"
      width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<!-- //contact -->
@endsection