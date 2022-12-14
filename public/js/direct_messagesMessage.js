function storeMessage(demand, userId, message){
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "post",
        url: "/direct_messages/" + demand.id,
        data: {
            text: message
        },
        dataType: 'json'
    })
    .then((res) => {
        console.log(res);
        console.log("送信ボタンが押されました");
    })
    .fail((error) => {
        console.log(error);
        
    });
};

function destroyMessage(demand, userId, directMessage){
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "post",
        url: "/direct_messages/" + demand.id + "/" + directMessage.id + "/destroy",
        data: {
            _method: "DELETE"
        },
        dataType: 'json'
    })
    .then((res) => {
        console.log(res);
        console.log("送信ボタンが押されました");
    })
    .fail((error) => {
        console.log(error);
        
    });
};