<div class="container-fluid"><br>
    <div class="form-group" id="isbnArea">
        <label for="isbnOhneP">ISBN ohne Pruefziffer: </label>
        <input type="text" id="isbnOhneP" name="isbnOhneP" placeholder="3-928475-32" required>

        <button class= "btn btn-warning" name="btnGetPruefz" onclick="getPruefz();"> Prüfziffer berechnen</button>
    </div>
</div>
<script>
    function getPruefz(){
        var isbn = document.getElementById('isbnOhneP').value;
        var originIsbn = isbn;
        isbn = isbn.replace(/[^0-9X]/gi, '');

        var sum, pruefz i=0;

        if (isbn.length != 9) {
            return 'ISBN muss 10 Stellen lang sein';
        }

        for(i; i<isbn.length; i++)
        {
            sum +=isbn[i]*i;
        }
        pruefz = sum % 11;

        if(pruefz == 10)
        {
            pruefz = 'X';
        }

        var tag = document.createElement("span");
        var text = document.createTextNode(originIsbn+ '-' + pruefz);
        tag.appendChild(text);
        var element = document.getElementById("isbnArea");
        element.appendChild(tag);
    }
</script>