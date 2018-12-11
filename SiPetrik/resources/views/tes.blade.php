<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Document</title>
</head>
<body>
   
        
        <h1>{{ $pelapor->nama }}</h1>

        <form action="/store" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          
            <div>
                <input type="hidden" name="idKejadian" id="idKejadian" value="{{$kejadian->id}}">
                <input type="hidden" id="loops" value="">
            </div>
            <div class="form-group" id="container">
                <label for=""></label>
                <input type="text" class="form-control" name="jumlahTim" id="jumlahTim" aria-describedby="helpId" placeholder="Jumlah Tim">
                <button type="submit" class="btn btn-primary mt-1 float-right" onclick="addFields();">Submit</button>
            </div>
            
        </form>

        <script>
            function addFields(){
                var number = document.getElementById("jumlahTim").value;
                document.getElementById("loops").value = number;
                var container = document.getElementById("container");
                var footer = document.getElementById("footer");
                while (container.hasChildNodes()) {
                    container.removeChild(container.lastChild);
                }
                for (i=0;i<number;i++){
                    // Append a node with a random text
                    container.appendChild(document.createTextNode("Jumlah Tim " + (i+1)+"   "));
                    // Create an <input> element, set its type and name attributes
                    var input = document.createElement("input");
                    input.type = "text";
                    input.id = "idTim"+i;
                    input.name = "idTim";
                    input.className = "form-control mb-1";
                    container.appendChild(input);
                }

                var button = document.createElement("input");
                button.type = "submit";
                button.value = "Kirim";
                button.className = "btn btn-primary";
                // button.onclick =  function()
                // {
                //     for (i=0;i<number;i++){
                //         var idPetugas = document.getElementById("idTim"+i).value;
                //         var idKejadian = document.getElementById("idKejadian").value;
                //         alert(idPetugas);
                //         $.ajax({
                //             type: "POST",
                //             url: '/store',
                //             data: {'idKejadian': idKejadian, 'idPetugas': idPetugas},
                //             success: function( msg ) {
                //                 console.log(data);
                //             }   
                //         });
                //     }
                // };
                container.appendChild(button);
                var input = document.createElement("input");
                input.type = "hidden";
                input.name = "jumlah";
                input.id = "jumlah";
                input.className = "form-control mb-1";
                container.appendChild(input);
                document.getElementById('jumlah').value = document.getElementById("loops").value;
            }
            

            function save(){
                var number = document.getElementById("jumlahTim").value;
                $.ajax({
                    type: "POST",
                    url: '/store',
                    data: {'idKejadian': 9, 'idPetugas': number},
                    success: function( msg ) {
                        console.log(data);
                    }   
                });
            }
        </script>
    
</body>
</html>