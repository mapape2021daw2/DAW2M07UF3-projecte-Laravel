<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  </head>
  <body>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <title>Afegir una nova ONG</title>
    <font face="Arial">
      @if(\Session::has('Exit'))
        <div class="alert alert-success">
          <p>{{\Session::get('Exit')}}</p>
        </div>
      @endif
      <div class="card card-outline-secondary">
            <div class="card-header">
                <h3 class="mb-0">Introdueix les dades de la nova ONG:</h3>
            </div>
            <div class="card-body">
                <form action="{{url('associacio')}}" method="POST">
                {{csrf_field()}}
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">CIF</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" placeholder="XXXXXXXXX" name="cif">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Adreça</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" placeholder="C/XXXXX 20" name="adreca">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Població</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" placeholder="Barcelona" name="poblacio">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Comarca</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" placeholder="Barcelona" name="comarca">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Tipus d'ONG</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" placeholder="Ecologista" name="tipus">
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label">Ha estat declarada d'utilitat pública?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="si">
                                <label class="form-check-label" for="si">Sí</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="no">
                                <label class="form-check-label" for="no">No</label>
                            </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Cancel·lar">
                                <input type="submit" class="btn btn-primary" value="Envia">
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </font>
  </body>
</html>