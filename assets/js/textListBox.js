/*
function getListItem(ctrl, e) {
    //   console.log(e.relatedTarget.parentNode)
  let tid = (e.relatedTarget);
  let  pid = tid.parentNode;
    if (pid.id === ctrl.id + "_div") {
        ctrl.value = tid.innerText;
        $(ctrl.id + "_list").innerHTML = "";
        ctrl.focus();
    } else {
        for (i = 1; i <= 10; i++) {
            id = ctrl.id + (i);
            if ($(id)) {
                if ($(id).className === 'list-group-item list-group-item-action active') {
                    $(ctrl.id).value = $(id).innerText;
                    $(ctrl.id + "_list").innerHTML = "";
                    break;
                }
            }
        }
    }
}
function getList(ctrl, data) {
    //   console.log(data);
    //   let id = ctrl.id;
    let divid = ctrl.id + "_div";
    let st = "<div id='" + divid + "' class='list-group'>";
    let cnt = 1;
    data.forEach(element => {
        if (cnt == 1) {
            st = st + "<a href='#' class='list-group-item list-group-item-action active' aria-current='true' id='" + id + (cnt) + "'>" + element.moduleid + "-" + element.mname + "</a>";
        } else {
            st = st + "<a href='#' class='list-group-item list-group-item-action' id='" + id + (cnt) + "'>" + element.moduleid + "-" + element.mname + "</a>";
        }
        cnt++;

        //     })
        st = st + "</div>"
        console.log(ctrl.id);
        $(ctrl.id + "_list").innerHTML = st;
    })
}
*/