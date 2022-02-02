function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function growFormUser(){
    let form_container = document.getElementById('user_register_form');
    form_container.style.display = 'flex';
    sleep(50).then(() => {
       form_container.style.maxHeight = '800px';
        form_container.style.maxWidth = '800px';
        form_container.style.borderRadius = '25px';
    });
}

function lowFormUser(){
    let form_container = document.getElementById('user_register_form');
    form_container.style.display = 'none';

        form_container.style.maxHeight = '5px';
        form_container.style.maxWidth = '5px';
        form_container.style.borderRadius = '25px';

}
