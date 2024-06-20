<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DarwinSchool - Sign Up</title>
    <link rel="stylesheet" href="../Moodle/CSS/signup.css">
    <link rel="shortcut icon" href="../Moodle/Media/logo.png" type="image/x-icon">
</head>

<body>

<script src="../Moodle/Scripts/signup.js"></script>

<div class="container">
        <div class="logo-container">
            <img src="../Moodle/Media/logo.png" alt="DarwinSchool Logo">
        </div>
        <h2 onclick="window.location.reload()">Criar Conta Moodle</h2>
        <form method="post">
            <div class="form-group">
                <label for="name">Nome completo</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" minlength="5" placeholder="Mínimo 5 caracteres" required>
            </div>
            <div class="form-group">
                <label for="phone">Telemóvel</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Morada</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="postalcode">Código Postal</label>
                <input type="text" id="postalcode" name="postalcode" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Data de Nascimento</label>
                <input type="date" id="birthdate" name="birthdate" required pattern="\d{4}-\d{2}-\d{2}">
            </div>
            <div class="form-group">
                <label for="nationality">Nacionalidade</label>
                <select id="nacionalidades">
            <optgroup label="Europeias">
                <option value="pt">Português(a)</option>
                <option value="es">Espanhol(a)</option>
                <option value="fr">Francês(a)</option>
                <option value="it">Italiano(a)</option>
                <option value="de">Alemão(a)</option>
                <option value="gb">Inglês(a)</option>
                <option value="nl">Neerlandês(a)</option>
                <option value="gr">Grego(a)</option>
                <option value="se">Sueco(a)</option>
                <option value="pl">Polaco(a)</option>
                <option value="ru">Russo(a)</option>
                <option value="tr">Turco(a)</option>
                <option value="ro">Romeno(a)</option>
                <option value="hu">Húngaro(a)</option>
                <option value="dk">Dinamarquês(a)</option>
                <option value="fi">Finlandês(a)</option>
                <option value="cz">Checo(a)</option>
                <option value="ch">Suíço(a)</option>
                <option value="at">Austríaco(a)</option>
                <option value="be">Belga(o)</option>
                <option value="ie">Irlandês(a)</option>
                <option value="no">Norueguês(a)</option>
                <option value="is">Islandês(a)</option>
                <option value="hr">Croata(o)</option>
                <option value="bg">Búlgaro(a)</option>
                <option value="lt">Lituano(a)</option>
                <option value="lv">Letão(a)</option>
                <option value="ee">Estoniano(a)</option>
                <option value="sk">Eslovaco(a)</option>
                <option value="si">Esloveno(a)</option>
                <option value="mt">Maltês(a)</option>
            </optgroup>
            <optgroup label="Americanas">
                <option value="br">Brasileiro(a)</option>
                <option value="us">Americano(a)</option>
                <option value="ar">Argentino(a)</option>
                <option value="mx">Mexicano(a)</option>
                <option value="ca">Canadiano(a)</option>
                <option value="co">Colombiano(a)</option>
                <option value="cl">Chileno(a)</option>
                <option value="ve">Venezuelano(a)</option>
                <option value="pe">Peruano(a)</option>
                <option value="ec">Equatoriano(a)</option>
                <option value="cu">Cubano(a)</option>
                <option value="pa">Panamiano(a)</option>
                <option value="cr">Costarriquenho(a)</option>
                <option value="do">Dominicano(a)</option>
                <option value="gt">Guatemalteco(a)</option>
                <option value="bo">Boliviano(a)</option>
                <option value="hn">Hondurenho(a)</option>
                <option value="py">Paraguaio(a)</option>
                <option value="sv">Salvadorenho(a)</option>
                <option value="ni">Nicaraguense</option>
                <option value="uy">Uruguaio(a)</option>
                <option value="gy">Guianense(a)</option>
                <option value="sr">Surinamês(a)</option>
                <option value="bs">Bahamense</option>
                <option value="bb">Barbadense</option>
                <option value="jm">Jamaicano(a)</option>
                <option value="ht">Haitiano(a)</option>
                <option value="tt">Trinitário(a)</option>
                <option value="bz">Belizeano(a)</option>
                <option value="dm">Dominiquense</option>
                <option value="lc">Lucianês(a)</option>
                <option value="vc">São-vicentino(a)</option>
                <option value="kn">Nevisiano(a)</option>
                <option value="ag">Antiguano(a)</option>
                <option value="gd">Granadino(a)</option>
                <option value="tt">São-cristovense</option>
                <option value="ms">Montserrate</option>
                <option value="tc">Turquês(a)</option>
                <option value="vg">Britânico(a)</option>
                <option value="vi">Americano(a)</option>
                <option value="ai">Anguilano(a)</option>
                <option value="bm">Bermudiano(a)</option>
                <option value="ky">Caimanense</option>
                <option value="gs">Sul-georgiano</option>
                <option value="fk">Faulklandense</option>
                <option value="mp">Marianense</option>
                <option value="pn">Pitcairnense</option>
                <option value="sh">Santo-helenense</option>
                <option value="fk">Malvinense</option>
                <option value="wf">Wallisiano</option>
            </optgroup>
            <optgroup label="Asiáticas">
                <option value="cn">Chinês(a)</option>
                <option value="jp">Japonês(a)</option>
                <option value="kr">Coreano(a)</option>
                <option value="in">Indiano(a)</option>
                <option value="id">Indonésio(a)</option>
                <option value="sa">Árabe</option>
                <option value="vn">Vietnamita</option>
                <option value="th">Tailandês(a)</option>
                <option value="ph">Filipino(a)</option>
                <option value="mm">Mianmarense</option>
                <option value="la">Laosiano(a)</option>
                <option value="np">Nepalês(a)</option>
                <option value="lk">Ceilão</option>
                <option value="my">Malaio(a)</option>
                <option value="ae">Emiradense</option>
                <option value="kg">Quirguistanês(a)</option>
                <option value="tj">Tadjique(a)</option>
                <option value="kz">Cazaque</option>
                <option value="uz">Uzbeque</option>
                <option value="tm">Turcomeno(a)</option>
                <option value="kg">Afegão</option>
                <option value="mm">Birmanês</option>
                <option value="bt">Butanês(a)</option>
                <option value="bd">Bangladeshiano(a)</option>
                <option value="pk">Pakistani</option>
                <option value="kp">Norte-coreano</option>
                <option value="il">Israelita</option>
                <option value="iq">Iraquiano(a)</option>
                <option value="ps">Palestiniano(a)</option>
                <option value="kw">Coveite(a)</option>
                <option value="ye">Iemenita</option>
                <option value="jo">Jordaniano(a)</option>
                <option value="lb">Libanês(a)</option>
                <option value="om">Omanense</option>
                <option value="qa">Qatari</option>
                <option value="sy">Sírio(a)</option>
                <option value="ir">Iraniano(a)</option>
                <option value="ge">Georgiano(a)</option>
                <option value="am">Arménio(a)</option>
                <option value="az">Azeri</option>
                <option value="cy">Cipriota</option>
                <option value="lb">Libanês(a)</option>
                <option value="mm">Mianmarense</option>
                <option value="bt">Butanês(a)</option>
            </optgroup>
            <optgroup label="Africanas">
                <option value="ao">Angolano(a)</option>
                <option value="mz">Moçambicano(a)</option>
                <option value="cm">Camaronês(a)</option>
                <option value="sn">Senegalês(a)</option>
                <option value="ci">Marfinense</option>
                <option value="bf">Burquinense(a)</option>
                <option value="gm">Gambiano(a)</option>
                <option value="ao">Angolano(a)</option>
        <option value="mz">Moçambicano(a)</option>
        <option value="cm">Camaronês(a)</option>
        <option value="sn">Senegalês(a)</option>
        <option value="ci">Marfinense</option>
        <option value="bf">Burquinense(a)</option>
        <option value="gm">Gambiano(a)</option>
        <option value="gn">Guineense(a)</option>
        <option value="ke">Queniano(a)</option>
        <option value="za">Sul-africano(a)</option>
        <option value="et">Etíope</option>
        <option value="eg">Egípcio(a)</option>
        <option value="ng">Nigeriano(a)</option>
        <option value="sd">Sudanês(a)</option>
        <option value="tn">Tunisino(a)</option>
        <option value="dz">Argelino(a)</option>
        <option value="ma">Marroquino(a)</option>
        <option value="ly">Líbio(a)</option>
        <option value="ci">Costa-marfinense</option>
        <option value="cd">Congolês(a)</option>
        <option value="ug">Ugandês(a)</option>
        <option value="gh">Ganense</option>
        <option value="zm">Zambiano(a)</option>
        <option value="mw">Malauiense</option>
        <option value="zw">Zimbabuense</option>
        <option value="rw">Ruandês(a)</option>
        <option value="tz">Tanzaniano(a)</option>
        <option value="bj">Beninense</option>
        <option value="ne">Nigerino(a)</option>
        <option value="lr">Liberiano(a)</option>
        <option value="so">Somali</option>
        <option value="dj">Djibutiano(a)</option>
        <option value="mr">Mauritano(a)</option>
        <option value="gm">Guiné-bissauense</option>
        <option value="gn">Guiné equatorial</option>
        <option value="sl">Serra-leonês(a)</option>
        <option value="sz">Suazilandês(a)</option>
        <option value="ls">Lesotiano(a)</option>
        <option value="bw">Botsuano(a)</option>
        <option value="cv">Cabo-verdiano(a)</option>
        <option value="st">Santomense</option>
        <option value="gq">Equatoguineano(a)</option>
        <option value="gw">Guiné-bissauense</option>
        <option value="tg">Togolês(a)</option>
        <option value="fj">Fijiano(a)</option>
        <option value="sb">Salomônico(a)</option>
        <option value="vu">Vanuatense</option>
        <option value="ws">Samoano</option>
        <option value="mh">Marshalês(a)</option>
        <option value="fj">Fijiano(a)</option>
        <option value="ki">Kiribatiano(a)</option>
        <option value="pw">Palauense</option>
        <option value="nr">Nauruense</option>
        <option value="tv">Tuvaluano(a)</option>
        <option value="to">Tonganês(a)</option>
        <option value="ki">Quiribatiano(a)</option>
        <option value="mh">Ilhas marshall</option>
        <option value="fj">Ilhas Fiji</option>
        <option value="ws">Samoano(a)</option>
        <option value="to">Tongano(a)</option>
        <option value="pw">Palauano(a)</option>
        <option value="nr">Nauruano(a)</option>
        <option value="vu">Vanuatuense(a)</option>
        <option value="sb">Ilhas Salomão</option>
        <option value="tv">Tuvaluano(a)</option>
      </optgroup>
      <optgroup label="Oceânicas">
        <option value="au">Australiano(a)</option>
        <option value="nz">Neozelandês(a)</option>
        <option value="pg">Papuásio(a)</option>
        <option value="fj">Fijiano(a)</option>
        <option value="sb">Salomônico(a)</option>
        <option value="vu">Vanuatense(a)</option>
        <option value="ws">Samoano(a)</option>
        <option value="mh">Marshalês(a)</option>
        <option value="fj">Fijiano(a)</option>
        <option value="ki">Kiribatiano(a)</option>
        <option value="pw">Palauense</option>
        <option value="nr">Nauruense</option>
        <option value="tv">Tuvaluano(a)</option>
        <option value="to">Tonganês(a)</option>
        <option value="ki">Quiribatiano(a)</option>
        <option value="mh">Ilhas marshall</option>
        <option value="fj">Ilhas Fiji</option>
        <option value="ws">Samoano(a)</option>
        <option value="to">Tongano(a)</option>
        <option value="pw">Palauano(a)</option>
        <option value="nr">Nauruano(a)</option>
        <option value="vu">Vanuatuense(a)</option>
        <option value="sb">Ilhas Salomão</option>
        <option value="tv">Tuvaluano(a)</option>
     </optgroup>
     </select>
            </div>
            <div class="form-group">
                <label for="birthplace">Naturalidade</label>
                <input type="text" id="birthplace" name="birthplace" required>
            </div>
            <div class="form-group">
                <label for="gender">Género</label>
                <select id="gender" name="gender" required>
                    <option value="">-- Selecione opção --</option>
                    <option value="male">Masculino</option>
                    <option value="female">Feminino</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Transporte">Portador de:</label>
                <select name="transporte" id="transporte" onchange="Documentos()" required>
                    <option value="">-- Selecione uma opção --</option>
                    <option value="CC">Cartão Cidadão</option>
                    <option value="Passaporte">Passaporte</option>
                </select>
            </div>
            <div class="form-group">
                <label for="idnumber" id="idnumberLabel">Número Cartão de Cidadão/Passaporte</label>
                <input type="text" id="idnumber" name="idnumber" required>
            </div>
            <div class="form-group">
                <label for="idexpiry" id="idexpiryLabel">Data de Validade do Cartão de Cidadão/Passaporte</label>
                <input type="date" id="idexpiry" name="idexpiry" required>
            </div>
            <div class="form-group">
                <label for="taxnumber">Nº Contribuinte</label>
                <input type="number" id="taxnumber" name="taxnumber" required>
            </div>
            <div class="form-group">
                <label for="education">Habilitação</label>
                <select id="habilitacao" name="habilitacao" required>
                    <option value="">-- Selecione opção --</option>
                    <option value="9Ano">9º Ano</option>
                    <option value="12Ano">12º Ano</option>
                    <option value="License">Licenciatura</option>
                    <option value="Mestre">Mestrado</option>
                    <option value="Doutoramento">Doutoramento</option>
                </select>
            </div>
            <div class="form-group">
                <label for="employmentoption">Situação Profissional:</label>
                <select id="employee" name="employee" onchange="CriaElementos()" required>
                    <option value="">-- Selecione opção --</option>
                    <option value="yes">Empregado</option>
                    <option value="no">Desempregado</option>
                </select>
            </div>
            <button type="submit" id="Registrar">Registar</button>
        </form>
    </div>    

</body>
</html>

<?php
if (isset($_POST['Registrar'])) {
    RegistrarAluno();
}

function RegistrarAluno() {
    //Registar Aluno e colocar para a base de dados 
    require '../Moodle/Scripts/bd.php';
    
}
?>