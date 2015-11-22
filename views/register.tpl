<div class="container">

    <!-- START BLOCK : register -->
    <form class="form-horizontal" action="" method="post">
        <fieldset>

            <!-- Form Name -->
            <legend>Registreren</legend>
            <!-- START BLOCK : error -->
            <div class="alert alert-danger">
                <strong>Error!</strong> Please fill in the right creditals
            </div>
            <!-- END BLOCK : error -->
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Voornaam:</label>
                <div class="col-md-4">
                    <input id="name" name="name" placeholder="" class="form-control input-md" required="" type="text">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="lastname">Achternaam:</label>
                <div class="col-md-4">
                    <input id="lastname" name="lastname" placeholder="" class="form-control input-md" required="" type="text">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">E-mail:</label>
                <div class="col-md-4">
                    <input id="email" name="email" placeholder="" class="form-control input-md" required="" type="text">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="adres">Adres:</label>
                <div class="col-md-4">
                    <input id="adres" name="adres" placeholder="" class="form-control input-md" required="" type="text">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="zip">Postcode:</label>
                <div class="col-md-4">
                    <input id="zip" name="zip" placeholder="" class="form-control input-md" required="" type="text">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="city">Woonplaats:</label>
                <div class="col-md-4">
                    <input id="city" name="city" placeholder="" class="form-control input-md" required="" type="text">

                </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="password">Wachtwoord:</label>
                <div class="col-md-4">
                    <input id="password" name="password" placeholder="" class="form-control input-md" required="" type="password">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="password2">Wachtwoord herhalen:</label>
                <div class="col-md-4">
                    <input id="password2" name="password2" placeholder="" class="form-control input-md" required="" type="password">

                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="register"></label>
                <div class="col-md-4">
                    <button id="register" name="register" value="register" class="btn btn-primary">Registreer</button>
                </div>
            </div>

        </fieldset>
    </form>
    <!-- END BLOCK : register -->

    <!-- START BLOCK : success -->
    <div class="alert alert-success">
        Bedankt voor je registratie
    </div>
    <!-- END BLOCK : success -->
