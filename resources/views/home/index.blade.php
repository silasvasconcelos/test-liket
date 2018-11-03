<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Game ranking</title>
    <style>
        body {
            background-color: #f8f8f8;
            margin: 30px 10%;
        }
        .container {
            background-color: #80808021;
            padding: 50px;
        }
        .thead tr th, 
        .thead tr td {
            background-color: #e1e119;
            font-size: 2em;
        }
        .skull {
            width: 40px;
        }
    </style>
  </head>
  <body>
    
    
    <div class="container">
        

            <div class="col-md-12">
                <h1>RANKING</h1>
            </div>
            <form action=".">
                <div class="form-group row">
                    <input type="search" name="q" value="{{ $q }}" class="form-control form-control-lg col-md-8 left">
                    <button type="submit" class="btn btn-secondary btn-lg col-md-4 left">Search</button>
                </div>
            </form>

            <div class="row">
                
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead">
                            <tr>
                                <th>NAME</th>
                                <th width="200">
                                    <img src="https://cdn3.iconfinder.com/data/icons/halloween-2/512/skull-crossbones-icon.png" class="skull">
                                    KILLS
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($players as $player)
                            <tr>
                                <td>{{ $player->name }}</td>
                                <td>{{ $player->my_kills }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
    

    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>