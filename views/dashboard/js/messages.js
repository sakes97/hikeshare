// var siteURL = 'http://localhost:80/myphp/hikeshare/';

// var chat = {}

// chat.fetchMessages = function (){
//     $.ajax({
//         url: siteURL + 'dashboard/testing?view=user-chat',
//         type: 'post',
//         data : {method:'fetch'},
//         success: function(data) {
//             $('.chat .messages').html(data); 
//         }
//     });
// }


// chat.interval= setInterval(chat.fetchMessages, 2000);

$(document).ready(function(){

    $(function (){

        var url = 'http://localhost:8080/myphp/hikeshare/dashboard/_xhrGetMessages';
        var conversationid = $("#conversationid").val();
        
        function init(){

            $.ajax({
                url: url,
                type: 'POST',
                data: 'id='+conversationid,
                dataType: 'json'
            }).done(function(data){
            }).fail(function(){
            });
        }

        init();
        

    });

});