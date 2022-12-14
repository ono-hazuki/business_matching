function approval(demand, consenter){
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "post",
        url: "/consenters/" + demand.id + "/" + consenter.id + "/update",
        data: {
            status: 1,
            demand_id: demand.id,
            user_id: demand.userId
        },
        dataType: 'json'
    })
    .then((res) => {
        console.log(res);
        console.log("承認ボタンを押しました");
        $("#tr-status-0-" + consenter.id ).remove();
        $("#tr-status-2-" + consenter.id ).remove();
        $("#tbody-status-1").append(`
            <tr id="tr-status-1-` + consenter.id + `">
                <td class="text-center">` + consenter.userName + `</td>
                <td class="text-center">
                    承認中
                </td>
                <td class="d-flex justify-content-center px-3">
                    <button id="btn-status-2-`+ consenter.id +`" class="btn btn-primary px-3">却下する</button>
                </td>
            </tr>
        `);
    })
    .fail((error) => {
        console.log("正しく送れませんでした");
        
    });
};

function rejected(demand, consenter){
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({
        type: "post",
        url: "/consenters/" + demand.id + "/" + consenter.id + "/update",
        data: {
            status: 2,
            demand_id: demand.id,
            user_id: demand.userId
        },
        dataType: 'json'
    })
    .then((res) => {
        console.log(res);
        console.log("却下ボタンを押しました");
        $("#tr-status-0-" + consenter.id ).remove();
        $("#tr-status-1-" + consenter.id ).remove();
        $("#tbody-status-2").append(`
            <tr id="tr-status-2-` + consenter.id + `">
                <td class="text-center">` + consenter.userName + `</td>
                <td class="text-center">
                    却下
                </td>
                <td class="d-flex justify-content-center px-3">
                    <button id="btn-status-1-`+ consenter.id +`" class="btn btn-primary px-3">承認する</button>
                </td>
            </tr>
        `);
    })
    .fail((error) => {
        console.log("正しく送れませんでした");
    });
};