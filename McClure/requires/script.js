function hideTables (id){
    //let url = new URL(document.URL);
    //let test = url.substring(url.length-1);

    //console.log('before');
    hide();
    show(id);
}

function show(id){
    //console.log('showing');
    let item = document.getElementById(id);
    item.style.display = '';
}

function hide(){
    //console.log('hiding');
    let list = ['#g', '#p', '#n', '#a', '#r', '#c'];
    for(let i = 0; i < 6; i++){
        let item = document.getElementById(list[i]);
        item.style.display = 'none';
        console.log(list[i]);
    }
}