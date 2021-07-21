window.$ = window.jQuery = require('jquery');

/*$( "#urlButton" ).click(function(p1) {
    let shortUrl = document.getElementById("urlButton").textContent;
    alert(shortUrl);
    $('#staticBackdrop').modal('show');
    setTimeout(function(){
        $('#staticBackdrop').modal('hide')
      }, 10000);
});

$(document).on('click', '.link-button', function() {
        let shortUrl = document.getElementById("urlButton").textContent;
        alert(shortUrl);
    });

*/


let urlCards = document.getElementsByClassName('card card-top shadow-sm p-3 mb-5 bg-white rounded');
let urlButtons = document.getElementsByClassName('link-button');

for (let index = 0; index < urlButtons.length; index++) {
    
    $(urlButtons[index]).on('click',function(){
        let nfsw = urlCards[index].getElementsByClassName("btn btn-danger");
        let shortUrl = urlButtons[index].textContent;
        if( $(nfsw).length )
        {
            
            $('#staticBackdrop').modal('show');
            setTimeout(function(){
                $('#staticBackdrop').modal('hide')
                shortUrl = shortUrl.replace('https://smallUrl.com/','')
                window.location.href = "/smallUrl/"+shortUrl
            }, 10000);
        }else{
            shortUrl = shortUrl.replace('https://smallUrl.com/','')
            window.location.href = "/smallUrl/"+shortUrl
        }
    });

}