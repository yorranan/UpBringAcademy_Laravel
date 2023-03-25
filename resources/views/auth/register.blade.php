@extends('layouts.not-logged-layout')
@section('scripts')
<script type="text/javascript">
   function fMasc(objeto, mascara) {
       obj = objeto
       masc = mascara
       setTimeout("fMascEx()", 1)
   }
   
   function fMascEx() {
       obj.value = masc(obj.value)
   }
   
   function mTel(tel) {
       tel = tel.replace(/\D/g, "")
       tel = tel.replace(/^(\d)/, "($1")
       tel = tel.replace(/(.{3})(\d)/, "$1)$2")
       if (tel.length == 9) {
           tel = tel.replace(/(.{1})$/, "-$1")
       } else if (tel.length == 10) {
           tel = tel.replace(/(.{2})$/, "-$1")
       } else if (tel.length == 11) {
           tel = tel.replace(/(.{3})$/, "-$1")
       } else if (tel.length == 12) {
           tel = tel.replace(/(.{4})$/, "-$1")
       } else if (tel.length > 12) {
           tel = tel.replace(/(.{4})$/, "-$1")
       }
       return tel;
   }
   
   function mCNPJ(cnpj) {
       cnpj = cnpj.replace(/\D/g, "")
       cnpj = cnpj.replace(/^(\d{2})(\d)/, "$1.$2")
       cnpj = cnpj.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3")
       cnpj = cnpj.replace(/\.(\d{3})(\d)/, ".$1/$2")
       cnpj = cnpj.replace(/(\d{4})(\d)/, "$1-$2")
       return cnpj
   }
   
   function mCPF(cpf) {
       cpf = cpf.replace(/\D/g, "")
       cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
       cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
       cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
       return cpf
   }
   
   function mCEP(cep) {
       cep = cep.replace(/\D/g, "")
       cep = cep.replace(/^(\d{2})(\d)/, "$1.$2")
       cep = cep.replace(/\.(\d{3})(\d)/, ".$1-$2")
       return cep
   }
   
   function mNum(num) {
       num = num.replace(/\D/g, "")
       return num
   }
</script>
<script language="javascript" src="js/jquery-1.11.1.min.js"></script>
@endsection
@section('content')
<!-- banner -->
<div class="banner about-banner">
   <div class="container">
      <h2>Cadastrar</h2>
      <div class="agileits-line"></div>
   </div>
</div>
<!-- //banner -->
<!-- Register form -->
<form method="POST" action="{{ route('register') }}" class="form-horizontal">
   @csrf
   <h3 class="text-center">Cadastro de Usuário</h3>
   <fieldset>
      @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="form-group">
                <div class="col-md-4 col-md-offset-4 my-4">
                    <p class="alert alert-danger">{{ $error }}</p>
                </div>
            </div>
        @endforeach
      @endif
      <!-- Name input-->
      <label class="col-md-4 control-label" for="textinput">Nome</label>
      <div class="form-group">
         <div class="col-md-5">
            <input id="textinput" name="name" type="text" placeholder="Digite nome do usuário " class="form-control input-md w-25" value="{{ old('name') }}" required>
         </div>
      </div>
      <!-- CPF input-->
      <label class="col-md-4 control-label" for="textinput">CPF</label>
      <div class="form-group">
         <div class="col-md-5">
            <input id="textinput" name="cpf" onkeydown="javascript: fMasc( this, mCPF );" type="text" placeholder="Digite o CPF do usuário" class="form-control input-md" value="{{ old('cpf') }}" required>
         </div>
      </div>
      <!-- Email input-->
      <label class="col-md-4 control-label" for="textinput">Email</label>
      <div class="form-group">
         <div class="col-md-5">
            <input id="textinput" name="email" type="text" placeholder="Digite o email do usuário" class="form-control input-md" value="{{ old('email') }}" required>
         </div>
      </div>
      <!-- Password input-->
      <label class="col-md-4 control-label" for="passwordinput">Senha</label>
      <div class="form-group">
         <div class="col-md-4">
            <input id="passwordinput" name="password" type="password" placeholder="Digite sua senha para cadastro" class="form-control input-md" required>
         </div>
      </div>
      <!-- Confirm password input-->
      <label class="col-md-4 control-label" for="passwordinput">Confirmar senha</label>
      <div class="form-group">
         <div class="col-md-4">
            <input id="passwordinput2" name="repeatpassaword" type="password" placeholder="Digite novamente sua senha" class="form-control input-md" required>
         </div>
      </div>

      <h3 class="text-center">Cadastro de Propriedade</h3>
      <!-- Property name input -->
      <label class="col-md-4 control-label" for="textinput">Nome da propriedade</label>
      <div class="form-group">
         <div class="col-md-5">
            <input id="textinput" name="propertyName" type="text" placeholder="Digite o nome da propriedade" class="form-control input-md w-25" value="{{ old('propertyName') }}" required>
         </div>
      </div>
      <!-- Latitude -->
      <label class="col-md-4 control-label" for="textinput">Latitude</label>
      <div class="form-group">
         <div class="col-md-5">
            <input id="textinput" name="latitude" type="text" placeholder="Digite a latitude da propriedade" class="form-control input-md w-25" required>
         </div>
      </div>
      <!-- Longitude -->
      <label class="col-md-4 control-label" for="textinput">Longitude</label>
      <div class="form-group">
         <div class="col-md-5">
            <input id="textinput" name="longitude" type="text" placeholder="Digite a longitude da propriedade" class="form-control input-md w-25" required>
         </div>
      </div>
      <!-- Select Cultivar input-->
      <label class="col-md-4 control-label" for="selectbasic">Videira</label>
      <div class="form-group">
         <div class="col-md-4">
            <select id="selectcultivar" name="tipoCultivar" class="form-control">
               <option value="0">Seleciona cultivar</option>
            </select>
         </div>
      </div>
      <label class="col-md-4 control-label" for="selectbasic">Estado</label>
      <div class="form-group">
         <div class="col-md-4">
            <select id="selectestado" name="selectestado" class="form-control">
               <option value="0">Seleciona Estado</option>
            </select>
         </div>
      </div>
      <!-- Select Cidade Basic -->
      <label class="col-md-4 control-label" for="selectbasic">Cidade</label>
      <div class="form-group">
         <div class="col-md-4">
            <select id="selectcidade" name="city" class="form-control">
               <option value="0">Seleciona Cidade</option>
            </select>
         </div>
      </div>
      <!-- Button -->
      <div class="form-group">
         <label class="col-md-4 control-label" for="singlebutton"></label>
         <div class="col-md-4">
            <button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Cadastrar</button>
         </div>
      </div>
   </fieldset>
</form>
<!-- //contact -->
@endsection