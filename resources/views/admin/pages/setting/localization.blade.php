<form method="POST" action="http://test.delivery.weemo.in/settings/update" accept-charset="UTF-8">
   
            <div class="row">
               
                <div class="col-6 col-xs-12" >

                    <!-- date_format Field -->
                    <div class="form-group row ">
                        <label for="date_format" class="col-4 control-label text-right">Date format</label>
                        <div class="col-8">
                            <input class="form-control" placeholder="Enter your date format" name="date_format" type="text" value="l jS F Y (H:i:s)" id="date_format">
                            <div class="form-text text-muted">
                                Use all date format on official website <a href="http://php.net/manual/fr/function.date.php">php.net</a>
                            </div>
                        </div>
                    </div>

                    <!-- Lang Field -->
                    <div class="form-group row ">
                        <label for="language" class="col-4 control-label text-right">Application language</label>
                        <div class="col-8">
                            <select class="select2 form-control select2-hidden-accessible" id="language" name="language" tabindex="-1" aria-hidden="true">
                                <option value="de">Deutsch</option>
                                <option value="en" selected="selected">English</option>
                                <option value="es">Espagnol</option>
                                <option value="fr">French</option>
                                <option value="pt">Portuguese</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-4 col-12 text-right">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Localisation
                    </button>
                    <a href="http://test.delivery.weemo.in/settings/users" class="btn btn-default"><i class="fa fa-undo"></i> Cancel</a>
                </div>

                </div>

                
            </div>
            </form>