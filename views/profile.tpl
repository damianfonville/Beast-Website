

<!-- Page Content -->
<div class="container">

    <div class="row">
        <h1>Profiel bewerken</h1>
        <!-- START BLOCK : error -->
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                {msg}
            </div>
        <!-- END BLOCK : error -->
        <!-- START BLOCK : success -->
            <div class="alert alert-success" role="alert">
                <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                {msg}
            </div>
        <!-- END BLOCK : success -->

        <form action="" method="post" role="form" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <label>gebruikers nummer:</label>
                <input type="text" class="form-control"  value="{uid}" disabled>
            </div>
            <div class="form-group">
                <label for="name">Voornaam:</label>
                <input type="text" class="form-control" id="name" value="{name}" name="name">
            </div>
            <div class="form-group">
                <label for="last">Achternaam:</label>
                <input type="text" class="form-control" id="last" value="{last}" name="lastname">
            </div>
            <div class="form-group">
                <label for="adres">Adres:</label>
                <input type="text" class="form-control" id="adres" value="{adres}" name="adres">
            </div>
            <div class="form-group">
                <label for="zip">Postcode:</label>
                <input type="text" class="form-control" id="zip" value="{zip}" name="zip">
            </div>
            <div class="form-group">
                <label for="city">Woonplaats:</label>
                <input type="text" class="form-control" id="city" value="{city}" name="city">
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="text" class="form-control" id="email" value="{email}" name="email" >
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-default" value="Opslaan">
            </div>

        </form>
        <h2>Wachtwoord wijzigen</h2>
        <form action="" method="post" role="form">
            <div class="form-group">
                <label for="pass">Huidige wachtwoord:</label>
                <input type="password" class="form-control" id="pass" name="pass">
            </div>
            <div class="form-group">
                <label for="pass2">Nieuwe wachtwoord:</label>
                <input type="password" class="form-control" id="pass2"  name="pass2">
            </div>
            <div class="form-group">
                <label for="pass3">Nieuwe wachtwoord herhalen:</label>
                <input type="password" class="form-control" id="pass3" name="pass3" >
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-default" value="Opslaan">
            </div>
        </form>

    </div>