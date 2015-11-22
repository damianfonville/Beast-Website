<div class="container">
    <div class="row">
        <div class="col-md-3">
            <p class="lead">Beheer</p>
            <div class="list-group">
                <a href="/beheer/" class="list-group-item">Home</a>
                <a href="/beheer/gebruikers" class="list-group-item active">Gebruikers</a>
                <a href="/beheer/producten" class="list-group-item">Producten</a>
            </div>
        </div>
        <div class="col-sm-12 col-md-9">
            <!-- START BLOCK : users -->
            <table class="table table-striped">
                <thead>
                <th>#</th>
                <th>naam</th>
                <th>adres</th>
                <th>postcode</th>
                <th>stad</th>
                <th>email</th>
                <th>Beheerder</th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                <!-- START BLOCK : user -->
                <tr>
                    <td>{uid}</td>
                    <td>{name}</td>
                    <td>{adres}</td>
                    <td>{zip}</td>
                    <td>{city}</td>
                    <td>{email}</td>
                    <td>{admin}</td>
                    <td class="text-right"><a href="/beheer/gebruiker/bewerk/{uid}" class="btn btn-default">Bewerk</a></td>
                    <td class="text-right"><a href="/beheer/gebruiker/delete/{uid}" class="btn btn-danger">Verwijder</a></td>
                </tr>
                <!-- END BLOCK : user -->
                </tbody>

            </table>
            <!-- END BLOCK : users -->

            <!-- START BLOCK : edit -->
            <form action="" method="post" role="form" enctype="multipart/form-data" autocomplete="off">
                <div class="form-group">
                    <label>gebruikers nummer:</label>
                    <input type="text" class="form-control"  value="{uid}" disabled>
                    <input type="hidden" value="{uid}" name="uid">
                </div>
                <div class="form-group">
                    <label for="name">gebruiker naam:</label>
                    <input type="text" class="form-control" id="name" value="{name}" name="name">
                </div>
                <div class="form-group">
                    <label for="last">gebruiker achternaam:</label>
                    <input type="text" class="form-control" id="last" value="{last}" name="lastname">
                </div>
                <div class="form-group">
                    <label for="adres">gebruiker adres:</label>
                        <input type="text" class="form-control" id="adres" value="{adres}" name="adres">
                </div>
                <div class="form-group">
                    <label for="zip">gebruiker postcode:</label>
                    <input type="text" class="form-control" id="zip" value="{zip}" name="zip">
                </div>
                <div class="form-group">
                    <label for="city">gebruiker woonplaats:</label>
                    <input type="text" class="form-control" id="city" value="{city}" name="city">
                </div>
                <div class="form-group">
                    <label for="email">gebruiker E-mail:</label>
                    <input type="text" class="form-control" id="email" value="{email}" name="email" >
                </div>
                <div class="form-group">
                    <label for="pas">gebruiker wachtwoord:</label>
                    <input type="password" class="form-control" id="pas" name="pas" placeholder="bij leeg word het wachtwoord niet gewijzigd">
                </div>
                <div class="form-group">
                    <label for="password">gebruiker Beheerder:</label>
                    <select class="form-control" name="admin">
                        <option value="1" {ja}>Ja</option>
                        <option value="0" {nee}>Nee</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-default" value="Opslaan">
                </div>

            </form>

            <!-- END BLOCK : edit -->
        </div>
    </div>


