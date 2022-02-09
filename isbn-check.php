<div class="container-fluid"><br>
    <div class="form-group" id="isbnArea">
        <label for="isbnOhneP">ISBN ohne Pruefziffer: </label>
        <input type="text" id="isbnOhneP" name="isbnOhneP" placeholder="3-928475-32" required>

        <button class= "btn btn-warning" id="btnGetPruefz" name="btnGetPruefz"> Prüfziffer berechnen</button>
    </div>
</div>
<script>
    $( document ).ready(function()
    {
        console.log("Ready");

        $("#btnGetPruefz").click(function(){
            var originISBN =  $('#isbnOhneP').val();
            alert('Origin: ' + originISBN.length);
            var isbn = originISBN.replace(/-/g, '');

            alert('ISBN: ' + isbn.length);

            var sum=0;
            var pruefz=0
            var i=1;

            if (isbn.length != 9) {
                alert("ISBN ohne Prüfziffer muss 9 Stellen lang sein");
                originISBN = 'ISBN ohne Prüfziffer muss 9 Stellen lang sein';
                pruefz ='';
            }
            else {

                var eachNum = isbn.toString().split('').map(iNum => parseInt(iNum, 10));

                for (i; i <=isbn.length; i++) {
                    sum += eachNum[i-1] * i;
                    //alert('sum: '+ sum + ' eachNum: '+ eachNum[i-1] + (i));
                }
                alert(sum);
                pruefz = sum % 11;

                if (pruefz === 10) {
                    pruefz = 'X';
                }
            }
            var $input = $("<input name='isbnMitPruef'>").text(originISBN+'-' +pruefz);
                $input.val(originISBN+'-' +pruefz);

            $('#isbnArea').append('<br><label for="isbnMitPruef">ISBN mit Pruefziffer: </label>');
            $('#isbnArea').append($input);
        });
    });
</script>