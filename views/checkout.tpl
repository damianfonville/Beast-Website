<div class="container ">
    <div class="row panel ">
        <div class="col-md-6 col-md-offset-3 ">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <form class="form-horizontal" id="myForm" method="post" action="">
                        <div class="form-group">
                            <label class="control-label">  kaarthouders naam </label>
                            <div class="controls">
                                <input type="text" name="name" class="form-control" pattern="\w+ \w+.*" title="vul je voornaam en achternaam in" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-sm-8 col-xs-8 col-md-8">
                                        <label class="control-label"> kaartnummer </label>
                                        <input id="card_number" name="card_number" type="text" placeholder="Kaartnummer" class="form-control input-md">
                                    </div>
                                    <div class="col-sm-4 col-xs-4 col-md-4">
                                        <label class="control-label"> kaart CV </label>
                                        <input type="text" name="security_code" class="form-control" autocomplete="off" maxlength="3" title="de 3 cijfers op de kaart" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6 col-md-6">
                                        <label class="control-label"> Verval maand  </label>
                                        <select id="expirymonth" name="expirymonth" class="form-control">
                                            <option value="01"> Januari</option>
                                            <option value="02"> Februari </option>
                                            <option value="03"> Maart </option>
                                            <option value="04"> April </option>
                                            <option value="05"> Mei </option>
                                            <option value="06"> Juni </option>
                                            <option value="07"> Juli </option>
                                            <option value="08"> August </option>
                                            <option value="09"> September </option>
                                            <option value="10"> Oktober </option>
                                            <option value="11"> November </option>
                                            <option value="12"> December </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 col-xs-6 col-md-6">
                                        <label class="control-label"> Verval jaar</label>
                                        <input id="expiryyear" name="expiryyear" type="text" placeholder="2015" class="form-control input-md" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-6 col-md-6">
                                        <label class="control-label"> Addres </label>
                                        <input name="address1" type="text" class="form-control" required="">
                                        <input id="hidden_paymentid" name="account_number" type="hidden" value="" >
                                        <input name="cash_amount" id="hiddencashamount" type="hidden" value="">
                                    </div>
                                    <div class="col-sm-6 col-xs-6 col-md-6">
                                        <label class="control-label"> Postcode</label>
                                        <input type="text" name="zip" class="form-control" autocomplete="off" required="">
                                    </div>
                                    <div class="col-sm-6 col-xs-6 col-md-6">
                                        <label class="control-label"> Land </label>
                                        <input type="text" class="form-control" autocomplete="off" name="country" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                            <button name="submit" id="submitButton" class="btn btn-block btn-success"> Betalen </button>
                    </form>
                </div>
            </div>